<?php
	require_once('../include.php');
	$id = $_REQUEST['id'];
	$sql = "select cId from imooc_pro where id = {$id}";
	$cid =  fetchOne($sql);
	$cid = array_values($cid);
	$cid = $cid[0];
	$res = checkProExist($cid);
	if(!$res){
	if(delete("imooc_cate","id = {$id}")){
		alertMes("删除成功","listCate.php?page=1");
		} else {
			alertMes("删除失败","listCate.php");
			}
	} else {
		alertMes("不能删除分类，请先删除分类下的产品","listPro.php?page=1");
		}
?>