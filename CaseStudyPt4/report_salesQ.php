<?php
$servername = "localhost";
$username = "f34ee";
$password = "f34ee";
$dbname = "f34ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> JavaJam - Sales by products </title>
	<meta charset="utf-8">

</head>
<body>
	<table border="1">
		<tr>
			<th>Product</th>
			<th>Profit</th>
		</tr>
		<tr>
			<td>Just Java</td>
			<td>Just Java</td>
		</tr>
		<tr>
			<td>Cafe au Lait</td>
			<td>Just Java</td>
		</tr>
		<tr>
			<td>Iced Cappuccino</td>
			<td>Just Java</td>
		</tr>

	</table>
	<br><br><br>
	<a href="report_totalsales.php"> Go to Report: Sales quantities by product categories </a><br><br>
	<a href="report.html"> Go to Report main page </a>
</body>
</html>