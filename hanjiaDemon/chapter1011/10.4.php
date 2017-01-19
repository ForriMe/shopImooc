<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>cost calculator</title>
</head>

<body>
<?php
$tax = 8.75;
function calculator($quantity,$price){
	global $tax;
	$total = $quantity * $price;
	$taxrate = ($tax / 100)+1;
	$total = $total * $taxrate;
	$total = number_format ($total,2);
	return $total;
	}

if(isset($_POST['quantity'],$_POST['price'])){
	
	if( is_numeric($_POST['quantity']) AND is_numeric($_POST['price'])){
		
		$total = calculator($_POST['quantity'],$_POST['price']);
		print '<p>Your total comes to $' . $total .'.</p>';
		
		} else {
			"<p>Please enter a valid quantity and price!</p>";
			}
	
	} else {
		print "<p>Please enter the data!</p>";
		}
		
	function make_text_input($name,$label){
	print '<p><lable>' . $label .':';
	print '<input type="text" name="' . $name . '" size="20"';
	if(isset($_POST['name'])){
		print 'value="' . htmlspecialchars($_POST['name']) .'"';
		}
		print '/></label></p>';
	
	}
	print '<form action="" method="post">';
	
	make_text_input('quantity','Quantity');
	make_text_input('price','Price');
	
	print '<input type="submit" name="submit" value="Register!"/></form>';

?>


</body>
</html>