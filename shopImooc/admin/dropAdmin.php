<?php
	require_once('../include.php');
	$id = $_REQUEST['id'];
	if(delete("imooc_admin","id = {$id}")){
		alertMes("删除成功","listAdmin.php");
		} else {
			alertMes("删除失败","listAdmin.php");
			}
?>