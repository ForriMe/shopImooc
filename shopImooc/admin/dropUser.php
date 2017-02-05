<?php
	require_once('../include.php');
	$id = $_REQUEST['id'];
	$sql = "select face from imooc_user where id = {$id}";
	$row = fetchOne($sql);
	$face = $row['face'];
	if(file_exists("../uploads".$face)){
		unlink("../uploads".$face);
		}
	if(delete("imooc_user","id = {$id}")&&delete("imooc_album","id = {$id}")){
		alertMes("删除成功","listUser.php?page=1");
		} else {
			alertMes("删除失败","listUser.php?page=1");
			}
?>