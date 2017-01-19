<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<style type="text/css">
.error{color:red;}
</style>
</head>

<body>
<h1>Register</h1>
<?php

$dir = './users/';
$file = $dir . 'users.txt';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//判断输入的内容是否有错误
	$problem = FALSE;
	if (empty($_POST['password1'])){
		$problem = TRUE;
		print "<p class=\"error\">Please enter a password!</p> ";
		}
	if ($_POST['password1'] != $_POST['password2']){
		$problem = TRUE;
		print "<p class=\"error\">Your password did not match your confirmed password</p> ";
		}
	//输入内容无措，将内容写入文件
	if(!$problem){
		if (is_writable($file)){//文件可写
			//检测用户名是否存在,若存在，isexist=false
			$isExist = FALSE;
			ini_set('auto_detect_line_endings',1);
			$fp = fopen($file,'rb');
			while ( $line = fgetcsv($fp,200,"\t")){
				if( ($line[0] == $_POST['username']) AND ($line[1] == md5(trim($_POST['password1']))) ){
					$isExist = TRUE;
					break;
			}
		}
			fclose($fp);
			
			if(!$isExist){//用户名没有重复，写入新数据
			$subdir = time() . rand(0,4596);
			$data = $_POST['username'] . "\t" . md5(trim($_POST['password1'])) . "\t" . $subdir . PHP_EOL;
			file_put_contents($file, $data, FILE_APPEND |LOCK_EX);
			mkdir ($dir . $subdir);
			print '<p>You are now registered';
			} else {
				print "<p class=\"error\">the username already exist!</p>";
				}
			
			} else {
				print '<p class="error">You could not be registered due to a system error.</p>';
				}
		} else {
			print '<p class="error">Please go back and try again!';
			}
	}
	
	
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
	print '<form action="register.php" method="post">';
	make_text_input('username','Username',0);
	make_text_input('password1','Password',1);
	make_text_input('password2','Confirm',1);
	
	print '<input type="submit" name="submit" value="Register!"/></form>';
?>


</body>
</html>