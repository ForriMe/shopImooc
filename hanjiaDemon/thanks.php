<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
	$name1=urldecode($_POST['name']);
	$email1=urldecode($_POST['email']);
	print "<div>thank you $name1 , your email is $email1</div>"
?>
</body>
</html>