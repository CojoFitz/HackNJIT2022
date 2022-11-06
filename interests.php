<!DOCTYPE html>

<html lang="en">
  <head>
    <title> CAMPR </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <link rel="stylesheet" type="text/css" href="layoutTest.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    
    <script type="text/javascript" src="script.js"> </script>
    <meta charset="utf-8" />
  </head>
  
  <?php 
    /*
    $username = "testUser";
    $password = "password1";
    
    $url = "https://afsaccess4.njit.edu/~nm669/hackNJIT2022/backend.php";
    
    $jsonBody = json_encode(array(
      "instance" => "instance1",
      "username" => $username,
      "password" => $password
    ));

    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $result = curl_exec($ch);
    curl_close($ch);
    */
    //return $result;
    /*
    $decoded = json_decode($result, true);
    echo $result . "<br>";*/
    //var_dump($result);

    /*    
    if ($_POST){
      $interestStr = "";
      foreach ($_POST as $key => $value){
        if (strstr($key, "interest") != NULL){
          if ($interestStr == ""){
            $interestStr = $key;
          }
          else{
            $interestStr+="_".$key;
          } 
        }
      }
      
      $query1 = "UPDATE Users SET interests='$interestStr' WHERE userID='$userID'"; //userID needs to be taken from a session
      //($result1 = mysqli_query($db, $query1)) or die(mysqli_error($db));
    }
    */
  ?>
  
  <body id="ForBody" >   
    
    <div id="topBanner">
      <div id="topBannerTextLeft">
        CS-100
      </div>
      <div id="optionsButtons">
	      <div id="themeButton"> <?php echo $fname . " " . $lname; ?> </div>
	      <div id="helpButton"> <?php echo $role; ?> </div>
        
        
      </div>
    </div>
    
    <div id='centerPage'>
      		<div id='leftCol'>
		
      		</div>
    
          <form id='middleCol' action='interests.php' method='post'>
				    <input type='hidden' id='groupID' name='Role' value='1'>
            <br>
            
            <label for="message">Message: </label>
				    <input type="text" id="message" name="message" onkeyup="getMessages()"> 
				    </br></br>
                                   
            <label for="message2">Message2: </label>
				    <input type="text" id="message2" name="message2" onkeyup="main()"> 
				    </br></br>
          
            <?php
              $url = "https://afsaccess4.njit.edu/~nm669/hackNJIT2022/backend.php";
    
              $jsonBody = json_encode(array(
                "instance" => "instance6",
                "userID" => 2
              ));
    
              
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
              $result = curl_exec($ch);
              curl_close($ch);
              
              
              $decoded = json_decode($result, true);
              echo "$result AHH <BR>";
              
              /*
              $url = "https://afsaccess4.njit.edu/~nm669/hackNJIT2022/backend.php";
    
              $jsonBody = json_encode(array(
                "instance" => "instance3",
              ));
    
              
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
              $result = curl_exec($ch);
              curl_close($ch);
              
              //return $result;
              
              $decoded = json_decode($result, true);
              
              
                for ($i=0; $i<count($decoded); $i++){
                  $id = $decoded[$i]["interestID"];
                  $interest = $decoded[$i]["interest"];
                  $interestName = $decoded[$i]["interest"] . "interest";
                  
                  echo "<input type='checkbox' id='$interest' name='$interestName'>
                        <label for='$interest'>$interest</label>"; 
                }  
                
                echo "<input type='submit' value='Submit'>";
              */
              
              /*
              $url = "https://afsaccess4.njit.edu/~nm669/hackNJIT2022/backend.php";
              $userID = "1";
      
              $jsonBody = json_encode(array(
                "instance" => "instance4",
                "id" => $userID
              ));
    
              
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
              $result = curl_exec($ch);
              curl_close($ch);
              
              //return $result;
              
              $decoded = json_decode($result, true);
              
              //echo $result . "<br>";
              var_dump($result);
              */
              
              
              /*
              $url = "https://afsaccess4.njit.edu/~nm669/hackNJIT2022/backend.php";
    
              $jsonBody = json_encode(array(
                "instance" => "instance5",
              ));
    
              
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
              $result = curl_exec($ch);
              curl_close($ch);
              
              //return $result;
              
              $decoded = json_decode($result, true);
              */
            ?>
            
            
      		</form>
    	
      		<div id='rightCol'>
         
      		</div>
    
    	  </div>
    
  </body>
  
  
</html>
