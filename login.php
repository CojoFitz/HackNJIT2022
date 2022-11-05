<?php
  session_start();
  if (isset($_POST['submit'])) 
  {
    ob_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $url = 'https://afsaccess4.njit.edu/~nm669/hackNJIT2022/backend.php';

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

    $decodedData = json_decode($result, true);
    if ($decodedData["username"] == $username) && ($decodedData["password"] == $password){
        //add redirect here to homepage
    }
    else{
        echo '<p class="sign" align="center">Invalid Username or Password</p>';
    }

    echo '<div class="main">';
    echo '<p class="sign" align="center">Sign in</p>';
    echo "<form class='form1' action=\"\" method=\"post\">";
    echo "<input class='un ' type='text' align='center' name=\"username\" type=\"text\" placeholder='Username'/>";
    echo "<input class='pass' type='password' align='center' name=\"password\" type=\"password\" placeholder='Password'/>";
    echo "</br> <a href='signup.php' align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not a member? Sign up here! </a> </br></br>";
    echo "<input class='submit' name=\"submit\" type=\"submit\" align='center'/>";
    echo "</form>";
    echo "</div>";
  }
  
  else {
    echo '<div class="main">';
    echo '<p class="sign" align="center">Sign in</p>';
    echo "<form class='form1' action=\"\" method=\"post\">";
    echo "<input class='un ' type='text' align='center' name=\"username\" type=\"text\" placeholder='Username'/>";
    echo "<input class='pass' type='password' align='center' name=\"password\" type=\"password\" placeholder='Password'/>";
    echo "</br> <a href='signup.php'align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not a member? Sign up here! </a></br></br> ";
    echo "<input class='submit' name=\"submit\" type=\"submit\" align='center'/>";
    echo "</form>";
    echo "</div>";

  }
?>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="logincss.css">
  <title>Login</title>
</head>