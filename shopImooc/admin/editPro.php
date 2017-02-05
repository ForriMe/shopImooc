<?php 
require_once '../include.php';
checkLogined();
$id = $_REQUEST['id'];
$sql = "select pName,pSn,pNum,mPrice,iPrice,pDesc from imooc_pro where id='{$id}'";
$values = fetchAll($sql);
$sql1 =  "select * from imooc_cate";
$rows = fetchAll($sql1);
if(!$values){
	alertMes("没有商品，请先添加","addPro.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<h3>修改商品</h3>
<form action="doAdminAction.php?act=editPro&id=<?php  echo $id; ?>" method="post" enctype="multipart/form-data">
<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">商品名称</td>
		<td><input type="text" name="pName" value="<?php  echo $values[0]['pName']  ?>" /></td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cId">
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['cName'];?></option>
			<?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">商品货号</td>
		<td><input type="text" name="pSn"value="<?php  echo $values[0]['pSn']  ?>" /></td>
	</tr>
	<tr>
		<td align="right">商品数量</td>
		<td><input type="text" name="pNum"value="<?php  echo $values[0]['pNum']  ?>"/></td>
	</tr>
	<tr>
		<td align="right">商品市场价</td>
		<td><input type="text" name="mPrice"value="<?php  echo $values[0]['mPrice']  ?>"/></td>
	</tr>
	<tr>
		<td align="right">商品慕课价</td>
		<td><input type="text" name="iPrice" value="<?php  echo $values[0]['iPrice']  ?>"/></td>
	</tr>
	<tr>
		<td align="right">商品描述</td>
		<td>
			<textarea name="pDesc" id="editor_id" style="width:100%;height:150px;">
			<?php echo $values[0]['pDesc'] ?>
			</textarea>
		</td>
	</tr>
	<tr>
		<td align="right">商品图像</td>
		<td>
			<input type="file" name="myfile[]"/>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="修改商品"/></td>
	</tr>
</table>
</form>

</body>
</html>