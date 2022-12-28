<?php
	session_start();
	$uname = $_SESSION['user'];
	
	if (isset($_SESSION['user']) == false) {
		header('location: index.php');
	}
	
?>

<html>
	<head>
		<title> Example Create - Read - Update - Delete </title>
	</head>
	<body>
		<h1> Hello, <?php echo $uname; ?>, <a href='logout.php'> Logout </a> </h1>
		<table>
			<tr>
				<th> ID </th>
				<th> Name </th>
				<th> Quantity </th>
				<th> Description </th>
			</tr>
			<?php
				if (!$link = mysql_connect("localhost", "root", "")) {
					echo 'Could not connect to Database';
					exit;
				}

				if (!mysql_select_db('example', $link)) {
					echo 'Could not select database';
					exit;
				}
			
			
				$sql = "Select * FROM exT";	
				$result = mysql_query($sql, $link); 
			
				while ($row = mysql_fetch_assoc($result)) {	
					$id = $row["id"];
					$name = $row["name"];
					$quantity = $row["quantity"];
					$description = $row["description"];
					
					echo "<tr>";
					echo "<td>" . $id . "</td>";
					echo "<td>" . $name . "</td>";
					echo "<td>" . $quantity . "</td>";
					echo "<td>" . $description . "</td>";
					if ((strpos($_GET['type'], "both")===0) || (strpos($_GET['type'], "supplier")===0)) {
						echo "<td> <a href='deleteItemInDB.php?id=" . $id . "'> Delete this Item </a>"; 
						echo "<td> <a href='updateItem.php?id=" . $id . "'> Update this Item </a>"; 
					}
					echo "</tr>";
				}
			?>
		</table>
		<?php
			if ((strpos($_GET['type'], "both")===0) || (strpos($_GET['type'], "supplier")===0)) {
				echo "<a href='createItem.php'> Create New Item </a>";
			}
		?>
		
	</body>
</html>