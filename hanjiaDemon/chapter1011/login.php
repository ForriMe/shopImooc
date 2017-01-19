<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<h1>Login</h1>
<?php

$file = '../users/users.txt';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$loggedin = FALSE;
	ini_set('auto_detect_line_endings',1);
	$fp = fopen($file,'rb');
	while ( $line = fgetcsv($fp,200,"\t")){
		if( ($line[0] == $_POST['username']) AND ($line[1] == md5(trim($_POST['password']))) ){
			$loggedin = TRUE;
			break;
			}
		}
		
		fclose($fp);
		
		if($loggedin){
			print '<p>You are now logged in.</p>';
			} else {
				print '<p style="color:red;">The username and password you entered do not match those on file.</p>';
				}
	}
	//创建表单
	function make_text_input($name,$label,$p){
	if($p == 0){
	print '<p><lable>' . $label .':';
	print '<input type="text" name="' . $name . '" size="20"';
	if(isset($_POST['name'])){
		print 'value="' . htmlspecialchars($_POST['name']) .'"';
		}
		print '/></label></p>';
	}
	if($p == 1){
	print '<p><lable>' . $label .':';
	print '<input type="password" name="' . $name . '" size="20"';
	if(isset($_POST['name'])){
		print 'value="' . htmlspecialchars($_POST['name']) .'"';
		}
		print '/></label></p>';
	}
	}
	print '<form action="login.php" method="post">';
	make_text_input('username','Username',0);
	make_text_input('password','Password',1);
	
	print '<input type="submit" name="submit" value="Login!"/></form>';
?>
</body>
</html>