<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.cdnfonts.com/css/kiona-2" rel="stylesheet">
<style>
body {
  background: url(https://cdn.discordapp.com/attachments/1038445976702156880/1038537798191431700/unknown.jpg) no-repeat center center fixed;
  margin: 0;
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
  display: none;
  position: absolute;
  margin-top: 5.2%;
  margin-left: 1.2%;
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
  border-radius: 12px;
  padding: 5px 0px 5px 0px;
  border: 3px solid black;
  background: #f2f2f2;
  position: absolute;
  text-align: center;
  top: 50%;
  left: 50%;
  margin-right: -50%;
  width: 20%;
  height: 25%;
  transform: translate(-50%, -50%);
}
td{
  text-align: center;
  position: relative; 
  bottom: 0px;
  opacity:100%;
  padding: 10px;
}
input {
  font-family: 'Kiona', sans-serif;
  background-color: #fc6e2a;
  border-radius: 12px;
  border: none;
  color: #ffffff;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border: 2px solid #000000;
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a class="active" href="homepage.html"> <img src="https://cdn.discordapp.com/attachments/1038445976702156880/1038493812038844416/Campr.png" height="77px" alt="Campr Logo"> </a>
  <div class="dropdown">
    <button id="topbutton" class="dropbtn">My Profile</button>
    <div class="dropdown-content">
      <a href="#">Interests</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>
  <a id="topbutton" href="group.php">My Groups</a>
  <a id="topbutton" href="news.html">Forum</a>
  <a id="topbutton" href="about.html">About Us</a>
</div>

<div style="padding-left:50%; padding-top: 10%;">
  <table>
    <tr>
      <td>Welcome 

        <?php
          echo $_SESSION['firstName'];
        ?>
      </td>
    </tr>
    <tr>
      <td>
        <form action="group.php">
          <input type="submit" value="Check your Camps">
        </form>
      </td>
    </tr>
  </table>
</div>

</body>
</html>
