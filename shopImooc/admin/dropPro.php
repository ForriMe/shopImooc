<?php
	require_once('../include.php');
	$id = $_REQUEST['id'];
	if(delete("imooc_pro","id = {$id}")&&delete("imooc_album","id = {$id}")){
		alertMes("删除成功","listPro.php?page=1");
		} else {
			alertMes("删除失败","listPro.php?page=1");
			}
?>