<?php
	define('TITLE','Login');
	include('header.html');
	print '<style type="text/css" media="screen">
      .error{color:red;}</style>';
	print '<h2>Login Form</h2>
		<p>Users who are logged in can take advantage of certain features like this,that, and the other thing.</p>';
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if((!empty($_POST['email'])) && (!empty($_POST['password']))){
						if((strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass')){
								
								session_start();
								$_SESSION['email'] = $_POST['email'];
								$_SESSION['loggedin'] = time();
								
								ob_end_clean();
								header('Location: welcome.php');//登录成功后，重新定向到一个页面，使用header函数，需要ob_start()缓					                                                                //冲函数调用在页面最前端
								exit();
								
							} else {   //邮箱密码错误
									print '<p class="error">The submitted email address and password do not match those on file!<br/>
									Go back and try again</p>';
								}
					} else {//表单没填写完整
							print '<p class="error">Please make sure you enter both an email address and a password!<br/>
							Go back and try again</p>';
						}
			} else { //还未提交表单，显示表单
					print '<form action="login.php" method="post">
							<p>Email Address: <input type="text" name="email" size="20"/></p>
							<p>Password: <input type="password" name="password"
							size="20"/></p>
							<p><input type="submit" name="submit" value="Log In!"/></p>
							</form>';
				}
				
				include('footer.html');
?>