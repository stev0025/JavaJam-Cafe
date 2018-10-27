<?php

//get prices

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

<?php

// order the drinks!!

$Java_Q = $_POST['Java_Q'];
$Cafe_Q = $_POST['Cafe_Q'];
$Iced_Q = $_POST['Iced_Q'];
$Cafe_au = $_POST['Cafe_au'];
$Iced = $_POST['Iced'];

if ($Java_Q != NULL) {
		if (!get_magic_quotes_gpc()){
		$Java_Q = addslashes($Java_Q);
		}	
	$query = "SELECT * FROM `JavaJam` WHERE coffee_type='just_java'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$old_Q = stripslashes($row['quantity']);
	$new_Q = $old_Q+$Java_Q;
	$query = "UPDATE JavaJam SET quantity = '".$new_Q."' WHERE coffee_type='just_java'";
	$result = $conn->query($query);	
}

if ($Cafe_Q != NULL) {
		if (!get_magic_quotes_gpc()){
		$Cafe_Q = addslashes($Cafe_Q);
		}
	$selected_radio = $Cafe_au;
	if ($selected_radio == $priceCafeSingle) {
		$query = "SELECT * FROM `JavaJam` WHERE coffee_type='cafe_single'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		$old_Q = stripslashes($row['quantity']);
		$new_Q = $old_Q+$Cafe_Q;
		$query = "UPDATE JavaJam SET quantity = '".$new_Q."' WHERE coffee_type='cafe_single'";
		$result = $conn->query($query);
	}
	else {
		$query = "SELECT * FROM `JavaJam` WHERE coffee_type='cafe_double'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		$old_Q = stripslashes($row['quantity']);
		$new_Q = $old_Q+$Cafe_Q;
		$query = "UPDATE JavaJam SET quantity = '".$new_Q."' WHERE coffee_type='cafe_double'";
		$result = $conn->query($query);
		
	}
}

if ($Iced_Q != NULL) {
		if (!get_magic_quotes_gpc()){
		$Iced_Q = addslashes($Iced_Q);
		}
	$selected_radio = $Iced;
	if ($selected_radio == $priceIcedSingle) {
		$query = "SELECT * FROM `JavaJam` WHERE coffee_type='iced_single'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		$old_Q = stripslashes($row['quantity']);
		$new_Q = $old_Q+$Iced_Q;
		$query = "UPDATE JavaJam SET quantity = '".$new_Q."' WHERE coffee_type='iced_single'";
		$result = $conn->query($query);
	}
	else {
		$query = "SELECT * FROM `JavaJam` WHERE coffee_type='iced_double'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		$old_Q = stripslashes($row['quantity']);
		$new_Q = $old_Q+$Iced_Q;
		$query = "UPDATE JavaJam SET quantity = '".$new_Q."' WHERE coffee_type='iced_double'";
		$result = $conn->query($query);
		
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> JavaJam - Menu </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="site.css">

	<style>
		tr:nth-of-type(odd) {background-color:#CDAB61;}
		#td_text {
					padding : 5px 5px 5px 5px;
					text-align: left;
		}
		td 	{
				padding : 0;
				text-align: center;
			}
		th {padding : 5px 5px 5px 5px;}
		.price {
				padding: 5px 5px 5px 5px;
				text-align: center;
				}

		.order_btn {
			float: right;
			margin-right: 16.5%;
	
		}
		
		</style>
	</style>
		<script type="text/javascript" src="menu_calculation.js"></script>
	<script>
function calculatePriceJava () {
	var Q = document.getElementById("Java_Q");
	
	var pos = Q.value.search(/^[\d\s]*$/);
	if (pos == -1) {
		document.getElementById("Java_subtotal").innerHTML = "Error";
		return;
	}
	//alert(Q.value);
	var unitprice = <?php echo number_format($priceJava,2);?>;
	priceJava = Number(Q.value) * Number(unitprice);
	priceJava = priceJava.toFixed(2);
	document.getElementById("Java_subtotal").innerHTML = "$"+priceJava;
	
	//alert("haha");
}
	</script>
	
</head>
<body>

<div id="wrapper">
	<header>

	</header>
	<div id="leftcolumn">
		<nav>
			<a href="index.html">Home</a>
			<a href="menu.html">Menu</a>
			<a href="music.html">Music</a>
			<a href="jobs.html">Jobs</a>
			<a href="price_update.php">Update Price</a>
			<a href="report.html">Report</a>
		</nav>
	</div>
	<div id="rightcolumn">
		<h1> Coffee at JavaJam </h1>
		
		<form action="menu_cont.php" method="post">
		
		
			<table width="600px" align="center" border="1">
				<tr>
					<th colspan="2"></th>
					<th>Q</th>
					<th width="70px">Price</th>
				</tr>
				<tr>
					<td id="td_text"> Just Java </td>
					<td id="td_text"> Regular house blend, decaffeinated coffee, or flavor of the day. <br>
							Endless Cup $<?php echo number_format($priceJava,2);?> </td>
					<td><input type="text" name="Java_Q" id="Java_Q" size="1" maxlength="2"></td>
					<td class="price" id="Java_subtotal"></td>
				</tr>
				<tr>
					<td id="td_text"> Cafe au Lait </td>
					<td id="td_text"> House blended coffee infused into a smooth steamed milk. <br>
							 
							   <input type="radio" name="Cafe_au" id="Cafe_single" value="<?php echo number_format($priceCafeSingle,2);?>" checked> Single $<?php echo number_format($priceCafeSingle,2);?>
							   <input type="radio" name="Cafe_au" id="Cafe_double" value="<?php echo number_format($priceCafeDouble,2);?>"> Double $<?php echo number_format($priceCafeDouble,2);?><br>
							
					</td>
					<td><input type="text" name="Cafe_Q" id="Cafe_Q" size="1" maxlength="2"></td>
					<td class="price" id="Cafe_subtotal"></td>
				</tr>
				<tr>
					<td id="td_text"> Iced Cappuccino </td>
					<td id="td_text"> Sweetened espresso blended with icy-cold milk and served in a chilled glass. <br>
							
							   <input type="radio" name="Iced" id="Iced_single" value="<?php echo number_format($priceIcedSingle,2);?>" checked> Single $<?php echo number_format($priceIcedSingle,2);?>
							   <input type="radio" name="Iced" id="Iced_double" value="<?php echo number_format($priceIcedDouble,2);?>"> Double $<?php echo number_format($priceIcedDouble,2);?><br>
							
					</td>
					<td><input type="text" name="Iced_Q" id="Iced_Q" size="1" maxlength="2"></td>
					<td class ="price" id="Iced_subtotal"></td>
				</tr>
				<tr>
					<th colspan="2"></th>
					<th><big>Total</big></th>
					<th class="price" id="maintotal"></th>
				</tr>
			</table>
			<br>
			
			<input class="order_btn"  type="submit" value="Order Now!">
		</form>
		<br>
	

	
	
	
	
	
	
	
	</div>
	<footer>
	<p> Copyright &copy; 2014 JavaJam Coffee House<br>
	<a href="mailto:stevenloekita@harsono.com">stevenloekita@harsono.com </a></p>
	</footer>
	
	
</div>	

</body>
</html>