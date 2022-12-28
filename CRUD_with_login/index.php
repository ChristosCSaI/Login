<html>
	<head>
		<title> Simple Login </title>
	</head>
	<body>
		<form action='checklogin.php' method='post'>
			<?php
				if (isset($_GET["message"])) {
					echo "<p style='color: red'> " . $_GET["message"] . "</p>";
				}
			?>
			<table>
				<tr>
					<td> Username </td>
					<td> <input type='text' name='uname' id='uname'> </td>
				</tr>
				<tr>
					<td> Password </td>
					<td> <input type='password' name='pass' id='pass'> </td>
				</tr>
				<tr>
					<td colspan='2'> <input type='submit' value='login'> </td>
				</tr>
			</table>
		</form>
	</body>
</html>