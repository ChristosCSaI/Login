<?php
	// Three users: admin-admin / customer-customer
	session_start();
	$uname = $_POST["uname"];
	$pass = $_POST["pass"];
	$_SESSION['user'] = $uname;
	
	//echo "uname: " . $uname . ", pass: " . $pass;
 
	if (!$link = mysql_connect("localhost", "root", "")) {
		echo 'Could not connect to Database';
		exit;
	}

	if (!mysql_select_db('example', $link)) {
		echo 'Could not select database';
		exit;
	}
 
	$sql = "Select * FROM users WHERE uname = '" . $uname . "' and pass = '" .$pass . "'";	
	
	$result = mysql_query($sql, $link); 
 
	$found = false;
 	while ($row = mysql_fetch_assoc($result)) {	
		$found = true;
		$type = $row["type"];
	}
 
	if ($found) {
		header("location:home.php?type=" . $type);
	} else {
		// incorrect login
		header("location:index.php?message=Wrong Login Attempt");
	}
?>




