<?php
	require_once('../include.php');
	$id = $_REQUEST['id'];
	$sql = "select id,username,password,email,sex,face from imooc_user where id='{$id}'";
	$rows=fetchOne($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<h3>编辑管理员</h3>
<form action="doAdminAction.php?act=editAdmin&id=<?php  echo $id; ?>" method="post">
	<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<td>管理员名称</td>
			<td><input type="text" name="username" value="<?php  echo $rows['username']  ?>"/></td>
		</tr>
		<tr>
			<td>管理员密码</td>
			<td><input type="password" name="password" placeholder="<?php  echo "请输入新密码";  ?>"/></td>
		</tr>
		<tr>
			<td>管理员邮箱</td>
			<td><input type="text" name="email" value="<?php  echo $rows['email']  ?>"/></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="编辑管理员" /></td>
		</tr>
	</table>
	
</form>
</body>
</html>