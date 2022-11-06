<?php
    session_start();
    if (isset($_POST['submit']))
    {
        ob_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstName = $_POST['fn'];
        $lastName = $_POST['ln'];

        $url = 'https://afsaccess4.njit.edu/~nm669/hackNJIT2022/backend.php';

        $jsonBody = json_encode(array(
            "instance" => "instance2",
            "username" => $username,
            "password" => $password,
            "firstname" => $firstName,
            "lastname" => $lastName,
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
        //echo $result;

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
        //echo $result;

        $decoded = json_decode($result, true);
        //var_dump($decoded);
        $_SESSION['userID'] = $decoded['userID'];
        $_SESSION['firstName'] = $decoded['firstName'];

        echo $_SESSION['userID'];
        echo $_SESSION['firstName'];

        echo "<script type=\"text/javascript\">
        window.location.href = 'interest.php';
        </script>";
    }

    echo '<div class="main">';
    echo '<p class="sign" align="center">Sign Up</p>';
    echo "<form class='form1' action=\"\" method=\"post\">";
    echo "<input class='un ' type='text' align='center' name=\"fn\" type=\"text\" placeholder='First Name'/>";
    echo "<input class='un ' type='text' align='center' name=\"ln\" type=\"text\" placeholder='Last Name'/>";
    echo "<input class='un ' type='text' align='center' name=\"username\" type=\"text\" placeholder='Username'/>";
    echo "<input class='pass' type='password' align='center' name=\"password\" type=\"password\" placeholder='Password'/>";
    echo "</br> <a href='login.php' align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Already a member? Sign in here! </a> </br></br>";
    echo "<input class='submit' id='submit' name=\"submit\" type=\"submit\" align='center'/>";
    echo "</form>";
    echo "</div>";
?>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="logincss2.css">
  <title>Sign Up</title>
</head>