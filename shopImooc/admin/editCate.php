<?php
	require_once('../include.php');
	$id = $_REQUEST['id'];
	$sql = "select id,cName from imooc_cate where id='{$id}'";
	$rows=fetchOne($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<h3>编辑分类</h3>
<form action="doAdminAction.php?act=editCate&id=<?php  echo $id; ?>" method="post">
	<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<td>分类名称</td>
			<td><input type="text" name="cName" value="<?php  echo $rows['cName']  ?>"/></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="编辑分类" /></td>
		</tr>
	</table>
	
</form>
</body>
</html>