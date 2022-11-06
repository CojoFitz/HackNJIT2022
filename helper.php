<?php

  
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
  
  
  header('Content-Type: application/json');
  
  $myJson = file_get_contents('php://input');
  $messageRequest = json_decode($myJson, true);
  
  $id = $messageRequest['id'];
  $message = $messageRequest['message'];

  $query1 = "SELECT previousMessages FROM Rooms WHERE roomID='$id'";
  ($result1 = mysqli_query($db, $query1)) or die(mysqli_error($db));
  $message = mysqli_fetch_array($result1, MYSQLI_NUM)[0]; 
    
  echo json_encode($message);
?>