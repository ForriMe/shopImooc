<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<style type="text/css" media="screen">
	.error{color:red;}
</style>
</head>

<body>
<h1>Registration Results</h1>
<?php
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$bornyear = $_POST['bornyear'];
	$favoritecolor = $_POST['favoritecolor'];
	$terms = $_POST['terms'];
	
	$okey = TRUE;
	
	if(empty($email)){
		print "<p class=\"error\">please enter your email adress</p>";
		$okey = FALSE;
		}
	if(empty($password)){
		print "<p class=\"error\">please enter your password</p>";
		$okey = FALSE;
		}
	if($password != $confirm){
		print "<p class=\"error\">please ensure your password</p>";
		$okey = FALSE;
		}
	if(!$terms){
		print "<p class=\"error\">please agree</p>";
		$okey = FALSE;
		}
	if(is_numeric($bornyear) AND (strlen($bornyear) == 4)){
		if($bornyear < 2017){
		$age = 2017 - $bornyear;
		}else{
			print "you from future?";
			$okey = FALSE;
			}
	}else{
			print "<p class=\"error\">please enter the year you were born as four digits.</p>";
			$okey = FALSE;
			}
		
	switch($favoritecolor){
			case 'red': $color_type = 'primary';break;
			case 'green': $color_type = 'secondary';break;
			case 'yellow': $color_type = 'third';break;
			default:
			print '<p class="error">please select your favorite color</p>';
			break;
		}
	if($okey){
		print "<p>you have been successfully registered.</p>";
		print "<p>your age is $age .</p>";
		print "<p>your favorite color type is $color_type .</p>";
		print "<p>your birthday is $bornyear - $month - $day .";
		}
?>
</body>
</html>