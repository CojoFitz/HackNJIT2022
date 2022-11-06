<?php
    session_start();
    $firstName = $_SESSION['firstName'];

    if ($_POST) {
        $interestStr = "";
        foreach ($_POST as $key => $value){
          if (strstr($key, "interest") != NULL){
            if ($interestStr == ""){
              $interestStr = $key;
            }
            else{
              $interestStr.="_".$key;
            } 
          }
        }

        echo $interestStr;

        $userID = $_SESSION['userID'];
        echo $userID;
        
        $jsonBody = json_encode(array(
            "instance" => "instance5",
            "userID" => $userID,
            "interestStr" => $interestStr
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
        echo $results;
        /*
        echo "<script type=\"text/javascript\">
        window.location.href = 'login.php';
        </script>";
        */
    }
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
    echo '<div class="main">';
    echo '<p class="sign" align="center">Welcome ' . $firstName . '</p>';
    echo '<p class="sign" align="center">Select your interests!</p>';

    $decoded = json_decode($result, true);
    echo "<form method='POST' action='interest.php' onsubmit=\"alert('Account successfully created. Please try logging in.');\">";
    for ($i=0; $i<count($decoded); $i++){
    $id = $decoded[$i]["interestID"];
    $interest = $decoded[$i]["interest"];
    $interestName = $decoded[$i]["interest"] . "interest";

    echo "<input type='checkbox' id='$interest' name='$interestName'>
    <label for='$interest' class='interestName' align='center'>$interest</label>"; 

    echo "</br>";
    } 

    echo "<input type='submit' value='Submit' class='submit' align='center'>";
    echo "</form>";
    echo '</div>';
?>

<head>
    <!--
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="logincss.css">
-->
<title>Interests</title>
</head>