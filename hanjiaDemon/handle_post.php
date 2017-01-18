<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
	$firstname=trim($_POST['firstname']);
	$lastname=trim($_POST['lastname']);
	$email=$_POST['email'];
	$posting=trim($_POST['post']);
	$name=$firstname .' '. $lastname;
	
	$words = str_word_count($posting);
	
	$posting = str_ireplace('badword','xxxxx',$posting);
	
	
	print "<div>
			Thank you , $name, for your posting:
			<p>$posting...</p>
			<p>($words words)</p>
		   </div>"

?>
</body>
</html>