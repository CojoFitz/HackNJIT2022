<?php
  session_start();
?>

<html>
<head>
  <title>
    group
  </title>
<link href="https://fonts.cdnfonts.com/css/kiona-2" rel="stylesheet">
<link href="chatroom.css" rel="stylesheet">
<script type="text/javascript" src="script.js"> </script>
<style>
body {
  background-color: #ddd;
  margin: 0;
  font-family: 'Montserrat', sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #fc6e2a;
}

.topnav #topbutton {
  font-family: 'Kiona', sans-serif;
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 31px 40px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  padding: 0px 0px 1px 0px;
  float: left;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  color: white;
  padding: 31px 40px;
  background-color: inherit;
  font-family: inherit;
}

.dropdown-content {
  right: 0;
  display: none;
  position: absolute;
  margin-top: 5.35%;
  background-color: #f9f9f9;
  min-width: 160px;
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: right;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}
table{
  padding: 5px 0px 5px 0px;
  border: 3px solid black;
  background: #f2f2f2;
  position: absolute;
  text-align: center;
  top: 50%;
  left: 50%;
  margin-right: -50%;
  width: 15%;
  height: 15%;
  transform: translate(-50%, -50%);
  animation: fadeInAnimation ease 3s;
  animation-iteration-count: 1;
  animation-fill-mode: forwards;
}

@keyframes fadeInAnimation {
  0%   {opacity: 0;}
  100% {opacity: 1;}
}

td{
  text-align: center;
  position: relative; 
  bottom: 0px;
  opacity:100%;
  padding: 10px;
}

textarea{
  height: 300px;
  width: 530px;
}
</style>
</head>
<body>

    <div class="topnav">
        <a class="active" href="homepage.php"> <img src="https://cdn.discordapp.com/attachments/1038445976702156880/1038493812038844416/Campr.png" height="77px" alt="Campr Logo"> </a>
        <div class="dropdown">
          <button id="topbutton" class="dropbtn">My Profile</button>
          <div class="dropdown-content">
            <a href="#">Settings</a>
            <a href="logout.php">Logout</a>
          </div>
        </div>
        <a id="topbutton" href="group.php">My Groups</a>
        <a id="topbutton" href="news.html">Forum</a>
        <a id="topbutton" href="about.html">About Us</a>
      </div>

<?php

  $url = 'https://afsaccess4.njit.edu/~nm669/hackNJIT2022/backend.php';

    $jsonBody = json_encode(array(
        "instance" => "instance6",
        "userID" => $_SESSION['userID']
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
    $roomID = $decodedData["roomID"];
    echo "<input type='hidden' id='groupID' value='$roomID'></input>";

  echo '<div id="wrapper">
  <div id="menu">
  <p class="welcome">Welcome, <b></b></p>
  <p class="logout"><a id="exit" href="homepage.php">Exit Chat</a></p>
  </div>';
  echo '<div id="chatbox"><textarea id="message2" name="message2"> </textarea></div>
      <input name="message" type="text" id="message" />
      <input name="button1" type="button" id="button1" value="Send" onclick="main()"/>
  </div>';


?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  // jQuery Document
  $(document).ready(function () {});
</script>

</body>
</html>
