<?php
	require_once('../include.php');
	$id = $_REQUEST['id'];
	$sql = "select id,username,email from imooc_user where id='{$id}'";
	$rows=fetchOne($sql);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>添加用户</h3>
<form action="doAdminAction.php?act=editUser&id=<?php  echo $id?>" method="post" enctype="multipart/form-data">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">用户名</td>
		<td><input type="text" name="username" value="<?php  echo $rows['username']; ?>"/></td>
	</tr>
	<tr>
		<td align="right">邮箱</td>
		<td><input type="text" name="email" value="<?php  echo $rows['email']; ?>" /></td>
	</tr>

	<tr>
		<td colspan="2"><input type="submit"  value="修改用户"/></td>
	</tr>

</table>
</form>
</body>
</html>