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

	$sql = "Select * FROM exT where id = " . $_GET['id'];	

	$result = mysql_query($sql, $link); 

	while ($row = mysql_fetch_assoc($result)) {	
		$id = $row["id"];
		$name = $row["name"];
		$quantity = $row["quantity"];
		$description = $row["description"];
	}
?>
<html>
	<head>
		<title> Example Create - Read - Update - Delete </title>
	</head>
	<body>
		<form action='updateItemInDB.php?old_id=<?php echo $_GET['id']; ?>' method='post'>
		<table>
			<tr>
				<th> ID </th>
				<th> Name </th>
				<th> Quantity </th>
				<th> Description </th>
			</tr>
			<tr>
				<td> <input type='text' name='id' id='id' value='<?php echo $id; ?>'/> </td> 
				<td> <input type='text' name='name' id='name' value='<?php echo $name; ?>'/> </td> 
				<td> <input type='text' name='quantity' id='quantity' value='<?php echo $quantity; ?>'/> </td>  
				<td> <input type='text' name='description' id='description' value='<?php echo $description; ?>'/> </td>  
			</tr>
			<tr>
				<td colspan='4'> <input type='submit' value='Update Item'> </td>
			</tr>
		</table>
		
	</body>
</html>