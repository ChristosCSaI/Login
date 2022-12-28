<?php

	session_start();	
	if (isset($_SESSION['user']) == false) {
		header('location: index.php');
	}

	if (!$link = mysql_connect("localhost", "root", "")) {
		echo 'Could not connect to Database';
		exit;
	}

	if (!mysql_select_db('example', $link)) {
		echo 'Could not select database';
		exit;
	}
						
	$sql = "Delete from exT where id = " . $_GET['id'];	
	//echo $sql;
	$result = mysql_query($sql, $link); 
	
	header("location: home.php");
			
?>
		