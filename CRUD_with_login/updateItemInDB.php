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
						
	$sql = "Update exT set id = " . $_POST['id'] . ", name='" . $_POST['name'] . "', quantity=" . $_POST['quantity'] . ", description='" . $_POST['description'] .  "' where id = " . $_GET['old_id'];	
	//echo $sql;
	$result = mysql_query($sql, $link); 
	
	header("location: home.php");
			
?>
		