<?php
/*
$hostname = "free-tier11.gcp-us-east1.cockroachlabs.cloud"; 	  
$username = "neeesh";
$project  = "campr-db";
$password = "bM_8l1IoD9ETudsmti3H4w";
$port = "26257";

$conn_string = "host=free-tier11.gcp-us-east1.cockroachlabs.cloud port=26257 dbname=campr-db user=neeesh password=bM_8l1IoD9ETudsmti3H4w options='--cluster=campr-db-2610'";
*/

$servername = "sql1.njit.edu";
$username2 ="nm669";
$password2 = "phpPassword1#";
$dbname = "nm669";

$db = mysqli_connect($servername, $username2, $password2, $dbname);
//$db = pg_pconnect($conn_string);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
$db -> set_charset("utf8");

$mydata = file_get_contents("php://input"); 
$info=json_decode($mydata,true);
$instance=$info["instance"];

switch ($instance){
  case "instance1"://logging in
    $username = $info["username"];
    $password = hash("sha256", $info["password"]);
    $password2 = $info["password"];
    
    $query2 = "SELECT * FROM Users WHERE username = '$username'";
    ($result2 = mysqli_query($db, $query2)) or die(mysqli_error($db));
    $storageArray = mysqli_fetch_array($result2, MYSQLI_ASSOC); 
  
    $userID = $storageArray["userID"];
    $fname = $storageArray["firstName"];
    
    
    echo json_encode(array(
      "username" => $username,
      "password" => $password2,
      "firstName" => $fname,
      "userID" => $userID
    ));
    
  break;
  
  case "instance2": //Creating a new account
    $fname = $info["firstname"];
    $lname = $info["lastname"];
    $username = $info["username"];
    $password =  hash("sha256", $info["password"]);
    
    $query1 = "INSERT INTO Users (firstName,lastName,username,password,role,interests,location,likeList) VALUES('$fname', '$lname', '$username', '$password', 'genericUser', NULL, NULL, NULL)";
    ($result1 = mysqli_query($db, $query1)) or die(mysqli_error($db));
     
    
  break;
  
  case "instance3":
    $query1 = "SELECT * FROM Interests";
    ($result1 = mysqli_query($db, $query1)) or die(mysqli_error($db));
    
    $returnArr = [];
    
    while ($interestsArr = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
      $returnArr[] = $interestsArr;
    }
    echo json_encode($returnArr); 
    
  break;
  
  case "instance4":
    $id = $info['id'];
    $query1 = "SELECT waiting FROM Waiting";
    ($result1 = mysqli_query($db, $query1)) or die(mysqli_error($db));
    
    $queue = [];
    $temp = mysqli_fetch_array($result1, MYSQLI_NUM)[0];
    $queue = explode("_",$temp);
    
    $hashMap = [];
    $queue[] = $id;
    
    
    echo json_encode($queue) . "<br>";
    
    
    
    for ($i=0; $i<count($queue); $i++){
      $currID = $queue[$i];
      
      
      $query2 = "SELECT interests FROM Users WHERE userID='$currID'";
      ($result2 = mysqli_query($db, $query2)) or die(mysqli_error($db));
      
      echo $currID . "<br>";
      $interest = mysqli_fetch_array($result2, MYSQLI_NUM);
      $interestArr = explode('_', $interest[0]);
      //echo json_encode($interestArr) . "<br>";
      
      
      for ($j=0; $j<count($interestArr); $j++){
        $interest = $interestArr[$j];
        if (!array_key_exists($interest, $hashMap)){
          $hashMap[$interest] = [];
          $hashMap[$interest][] = $currID;
        }
        else{
          $hashMap[$interest][] = $currID;
        }
        
        //echo json_encode($hashMap);
        if (count($hashMap[$interest]) == 2){
          echo json_encode("WORKED <br>");
          $personStr = "";
          for ($a=0; $a<count($hashMap[$interest]); $a++){
            $currID2 = $hashMap[$interest][$a];
            for ($k=0; $k<count($queue); $k++){
              if ($queue[$k] == $currID2){
                unset($queue[$k]);
                
              }
            }
          
          
            if ($personStr == ""){
              $personStr = $hashMap[$interest][$a];
            }
            else{
              $personStr .= "_".$hashMap[$interest][$a];
            }
          }
          //echo $personStr . "<br>";
          $query4 = "INSERT INTO Rooms (idsPresent) VALUES ('$personStr')";
          ($result4 = mysqli_query($db, $query4)) or die(mysqli_error($db));
          
          unset($hashMap[$interest]);
        }
        
        $queueStr = "";
        echo json_encode($queue);
        
        for ($b=0; $b<count($queue); $b++){
          if ($queueStr == ""){
            $queueStr = $queue[$b];
          } 
          else{
            $queueStr .= "_" . $queueStr;
          }
        }
        $query3 = "UPDATE Waiting SET waiting = '$queueStr'";
        ($result3 = mysqli_query($db, $query3)) or die(mysqli_error($db));
          
      }
      //echo json_encode($interestArr) . "<br>";
      
      
    }
    
    //echo "<br>";
    
  break;
  
  case "instance5":
    $id = $info['userID'];
    $interestStr = $info['interestStr'];
    
    $query1 = "UPDATE Users SET interests='$interestStr' WHERE userID='$id'";
    ($result1 = mysqli_query($db, $query1)) or die(mysqli_error($db));
    
    echo json_encode($query1);
  
  break;
  
  case "instance6":
    $id = $info['userID'];
    $roomID = NULL;
    $previousMessages = NULL;
    
    $query1 = "SELECT * FROM Rooms";
    ($result1 = mysqli_query($db, $query1)) or die(mysqli_error($db));
    while ($temp = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
      $idsPresent = $temp['idsPresent'];
      $idsArr = explode("_", $idsPresent);
      for ($i=0; $i<count($idsArr); $i++){
        if ($id == $idsArr[$i]){
          $roomID = $temp["roomID"];
          $previousMessages = $temp["previousMessages"];
        }
      }  
    }
    
    if ($roomID != NULL){
      echo json_encode(array(
        "roomID" => $roomID,
        "previousMessages" => $previousMessages
      ));
    }
    else{
      echo NULL;
    }
    
  break;
}

?>

