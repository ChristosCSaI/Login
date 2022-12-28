<?php
	session_start();
	unset($_SESSION['user']);
	
	//echo $_SESSION['user'];
	
	header('location: index.php');
?>