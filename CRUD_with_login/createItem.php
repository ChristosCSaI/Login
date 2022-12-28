<?php
	session_start();	
	if (isset($_SESSION['user']) == false) {
		header('location: index.php');
	}
?>

<html>
	<head>
		<title> Example Create - Read - Update - Delete </title>
	</head>
	<body>
		<form action='addItemInDB.php' method='post'>
		<table>
			<tr>
				<th> ID </th>
				<th> Name </th>
				<th> Quantity </th>
				<th> Description </th>
			</tr>
			<tr>
				<td> <input type='text' name='id' id='id'/> </td> 
				<td> <input type='text' name='name' id='name'/> </td> 
				<td> <input type='text' name='quantity' id='quantity'/> </td> 
				<td> <input type='text' name='description' id='description'/> </td> 
			</tr>
			<tr>
				<td colspan='4'> <input type='submit' value='Add Item'> </td>
			</tr>
		</table>
		
	</body>
</html>