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
$quantity_java = stripslashes($row['quantity']);
$profit_just_java = $price * $quantity_java;


$query = "SELECT * FROM `JavaJam` WHERE coffee_type='cafe_single'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity_cafe_single = stripslashes($row['quantity']);
$profit_cafe_single = $price * $quantity_cafe_single;

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='cafe_double'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity_cafe_double = stripslashes($row['quantity']);
$profit_cafe_double = $price * $quantity_cafe_double;

$profit_cafe = $profit_cafe_double + $profit_cafe_single;

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='iced_single'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity_iced_single = stripslashes($row['quantity']);
$profit_iced_single = $price * $quantity_iced_single;

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='iced_double'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$price = stripslashes($row['prices']);
$quantity_iced_double = stripslashes($row['quantity']);
$profit_iced_double = $price * $quantity_iced_double;

$profit_iced = $profit_iced_double + $profit_iced_single;

$total_profit = $profit_iced + $profit_cafe + $profit_just_java;


$profit_array = array($profit_just_java,
						$profit_cafe_single, 
						$profit_cafe_double, 
						$profit_iced_single, 
						$profit_iced_double);

$mpp = 0;
$mpdis = "no customers";
if ($mpp < $profit_just_java) {
	$mpp = $profit_just_java;
	$mpdis = "Just Java";
}
if ($mpp < $profit_cafe_single) {
	$mpp = $profit_cafe_single;
	$mpdis = "Cafe au Lait single";
}
if ($mpp < $profit_iced_single) {
	$mpp = $profit_iced_single;
	$mpdis = "Iced Cappuccino single";
}
if ($mpp < $profit_cafe_double) {
	$mpp = $profit_cafe_double;
	$mpdis = "Cafe au Lait Double";
}
if ($mpp < $profit_iced_double) {
	$mpp = $profit_iced_double;
	$mpdis = "Iced Cappuccino double";
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
			<td><?php echo $quantity_java;?></td>

		</tr>
		<tr>
			<td>Cafe au Lait single</td>
			<td><?php echo $quantity_cafe_single;?></td>
		</tr>
		<tr>
			<td>Cafe au Lait double</td>
			<td><?php echo $quantity_cafe_double;?></td>
		</tr>
		<tr>
			<td>Iced Cappuccino single</td>
			<td><?php echo $quantity_iced_single;?></td>
		</tr>
		<tr>
			<td>Iced Cappuccino double</td>
			<td><?php echo $quantity_iced_double;?></td>
		</tr>
		<tr>
			<th>Most Profit Product</th>
			<td><?php echo $mpdis;?></td>
		</tr>

	</table>
	<br><br><br>
	<a href="report_totalsales.php"> Go to Report: Sales quantities by product categories </a><br><br>
	<a href="report.html"> Go to Report main page </a>
</body>
</html>
