<?php
	session_start();
	unset($_SESSION['firstName']);
  	unset($_SESSION['userID']);

  	die(header('Location: login.php'));
?>