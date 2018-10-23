

function calculatePriceCafe () {
	var Q = document.getElementById("Cafe_Q");
	var pos = Q.value.search(/^[\d\s]*$/);
	
	if (pos == -1) {
		document.getElementById("Cafe_subtotal").innerHTML = "Error";
		return;
	}
	var radios = document.getElementsByName("Cafe_au");
	for (var i = 0, length = radios.length; i < length; i++)
	{
	 if (radios[i].checked)
	 {
	  unitprice = radios[i].value;
	  break;
	 }
	}
	priceCafe = Number(Q.value)*Number(unitprice);
	priceCafe = priceCafe.toFixed(2);
	document.getElementById("Cafe_subtotal").innerHTML = "$"+priceCafe;

	
}

function calculatePriceIced () {
	var Q = document.getElementById("Iced_Q");
	var pos = Q.value.search(/^[\d\s]*$/);
	
	if (pos == -1) {
		document.getElementById("Iced_subtotal").innerHTML = "Error";
		return;
	}
	//alert(Q.value);
	var radios = document.getElementsByName("Iced");
	//alert(radios.value);
	for (var i = 0, length = radios.length; i < length; i++)
	{
	 if (radios[i].checked)
	 {
	  unitprice = radios[i].value;
	  break;
	 }
	}
	priceIced = Number(Q.value)*Number(unitprice);
	priceIced = priceIced.toFixed(2);
	document.getElementById("Iced_subtotal").innerHTML = "$"+priceIced;	
}

function calculateTotal() {
	var total = Number(priceCafe) + Number(priceIced) + Number(priceJava);
	total = total.toFixed(2)
	document.getElementById("maintotal").innerHTML = "$"+total;
	//alert("success sir!");
}

function calculatePrice() {

	calculatePriceJava();
	calculatePriceCafe();
	calculatePriceIced();
	calculateTotal();
	//alert("well done!");
}

function init() {

}

var myVar;
var error = 0;
var priceJava;
var priceCafe;
var priceIced;
setInterval(calculatePrice, 50);
