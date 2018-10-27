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

$javaNew=$_POST['JavaNew'];
$CafeSingleNew=$_POST['CafeSingleNew'];
$CafeDoubleNew=$_POST['CafeDoubleNew'];
$IcedSingleNew=$_POST['IcedSingleNew'];
$IcedDoubleNew=$_POST['IcedDoubleNew'];

if ($javaNew != NULL) {
		if (!get_magic_quotes_gpc()){
		$javaNew = addslashes($javaNew);
		}	
	$query = "UPDATE JavaJam SET prices = '".$javaNew."' WHERE coffee_type='just_java'";
	$result = $conn->query($query);		
}

if ($CafeSingleNew != NULL) {
		if (!get_magic_quotes_gpc()){
		$CafeSingleNew = addslashes($CafeSingleNew);
		}	
	$query = "UPDATE JavaJam SET prices = '".$CafeSingleNew."' WHERE coffee_type='cafe_single'";
	$result = $conn->query($query);		
}

if ($CafeDoubleNew != NULL) {
		if (!get_magic_quotes_gpc()){
		$CafeDoubleNew = addslashes($CafeDoubleNew);
		}	
	$query = "UPDATE JavaJam SET prices = '".$CafeDoubleNew."' WHERE coffee_type='cafe_double'";
	$result = $conn->query($query);		
}

if ($IcedSingleNew != NULL) {
		if (!get_magic_quotes_gpc()){
		$IcedSingleNew = addslashes($IcedSingleNew);
		}	
	$query = "UPDATE JavaJam SET prices = '".$IcedSingleNew."' WHERE coffee_type='iced_single'";
	$result = $conn->query($query);		
}

if ($IcedDoubleNew != NULL) {
		if (!get_magic_quotes_gpc()){
		$IcedDoubleNew = addslashes($IcedDoubleNew);
		}	
	$query = "UPDATE JavaJam SET prices = '".$IcedDoubleNew."' WHERE coffee_type='iced_double'";
	$result = $conn->query($query);		
}

?>

<?php

// show prices

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
$priceJava = stripslashes($row['prices']);

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='cafe_single'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$priceCafeSingle = stripslashes($row['prices']);

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='cafe_double'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$priceCafeDouble = stripslashes($row['prices']);

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='iced_single'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$priceIcedSingle = stripslashes($row['prices']);

$query = "SELECT * FROM `JavaJam` WHERE coffee_type='iced_double'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$priceIcedDouble = stripslashes($row['prices']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> JavaJam - Update Price </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="site.css">

	<style>
		tr:nth-of-type(odd) {background-color:#CDAB61;}
		td {padding : 5px 5px 5px 5px;}
		
		.first_column {
			background-color: #F1E8AF;
			padding-right: 20px;
			padding-left: 20px;
			text-align: right;
		}
		
	</style>
	

</head>
<body>

<div id="wrapper">
	<header>
	</header>
	<div id="leftcolumn">
		<nav>
			<a href="index.html">Home</a>
			<a href="menu.php">Menu</a>
			<a href="music.html">Music</a>
			<a href="jobs.html">Jobs</a>
			<a href="price_update.php">Update Price</a>
			<a href="report.html">Report</a>
		</nav>
	</div>
	<div id="rightcolumn">
		<h1> Fill to update product prices: </h1>
		<p>*a single and double of the same products cannot have same price</p>
		<form action="price_update_cont.php" method="post">
		<table width="80%">
			<tr>
				<td class="first_column"> new value: <input type="text" name="JavaNew"></td>
				<td> Just Java </td>
				<td> Endless Cup $<?php echo number_format($priceJava,2);?> </td>
			</tr>
			<tr>
				<td class="first_column"> new Single: <input type="text" name="CafeSingleNew"><br>
					new Double: <input type="text" name="CafeDoubleNew"> 
				</td>
				<td> Cafe au Lait </td>
				<td>	Single $<?php echo number_format($priceCafeSingle,2);?>
						Double $<?php echo number_format($priceCafeDouble,2);?> </td>
			</tr>
			<tr>
				<td class="first_column"> new Single: <input type="text" name="IcedSingleNew"><br>
					new Double: <input type="text" name="IcedDoubleNew"> 
				</td>
				<td> Iced Cappuccino </td>
				<td> 	Single $<?php echo number_format($priceIcedSingle,2);?>
						Double $<?php echo number_format($priceIcedDouble,2);?> </td>
			</tr>
		</table><br>
		<input style="float:right; margin-right: 200px" type="submit" value="Update"><br>
		</form>
	
	
	
	
	
	
	
	</div>
	<footer>
	<p> Copyright &copy; 2014 JavaJam Coffee House<br>
	<a href="mailto:stevenloekita@harsono.com">stevenloekita@harsono.com </a></p>
	</footer>
	
	
</div>	

</body>
</html>