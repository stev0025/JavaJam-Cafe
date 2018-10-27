<?php

// get profit = price * quantity

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

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='just_java'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity = stripslashes($row['quantity']);
$profit_just_java = $price * $quantity;


$query = "SELECT * FROM `JavaJam` WHERE coffee_type='cafe_single'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity = stripslashes($row['quantity']);
$profit_cafe_single = $price * $quantity;

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='cafe_double'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity = stripslashes($row['quantity']);
$profit_cafe_double = $price * $quantity;

$profit_cafe = $profit_cafe_double + $profit_cafe_single;

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='iced_single'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity = stripslashes($row['quantity']);
$profit_iced_single = $price * $quantity;

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='iced_double'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity = stripslashes($row['quantity']);
$profit_iced_double = $price * $quantity;

$profit_iced = $profit_iced_double + $profit_iced_single;

$total_profit = $profit_iced + $profit_cafe + $profit_just_java;

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
			<td>$<?php echo number_format($profit_just_java,2);?></td>

		</tr>
		<tr>
			<td>Cafe au Lait</td>
			<td>$<?php echo number_format($profit_cafe,2);?></td>
		</tr>
		<tr>
			<td>Iced Cappuccino</td>
			<td>$<?php echo number_format($profit_iced,2);?></td>
		</tr>
		<tr>
			<th>Total</th>
			<td>$<?php echo number_format($total_profit,2);?></td>
		</tr>

	</table>
	<br><br><br>
	<a href="report_salesQ.php"> Go to Report: Total dollar sales by product </a><br><br>
	<a href="report.html"> Go to Report main page </a>
</body>
</html>