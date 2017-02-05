<?php
//require_once('../include.php');
function addCate(){
	$arr = $_POST;
	if(insert("imooc_cate",$arr)){
		alertMes("添加成功，继续添加","addCate.php");
		} else {
			alertMes("添加失败，重新添加","addCate.php");
			}
	
	}
//得到所有分类
function getAllCate(){
	$sql = "select id,cName from imooc_cate ORDER BY `id` ASC";
	$rows = fetchAll($sql);
	return $rows;
	}
//update($table,$array,$where = null)
//更新管理员
function editCate($id){
	$arr = $_POST;
	if (update("imooc_cate",$arr,"id = {$id}")){
		alertMes("修改成功","listCate.php?page=1");
		} else {
			alertMes("修改失败，请重新尝试","editCate.php");
			}
	}
//分页显示
function getCateByPage($pageSize=3){
	$sql="select * from imooc_cate";
	$totalRows = getResultNum($sql);
	//$pageSize = 3;
	global $totalPage;
	$totalPage = ceil($totalRows / $pageSize);
	$page ="";
	$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	if($page < 1 || $page == null ||!is_numeric($page)){
		$page = 1;
		} 
	if($page > $totalPage) 
		$page = $totalPage;	
	$offset = ($page - 1) * $pageSize;
	$sql="select * from imooc_cate  ORDER BY id ASC limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
	}
	
//检查分类下是否有产品
function checkProExist($cid){
	$sql = "select * from imooc_pro where cId = {$cid}";
	$rows = fetchAll($sql);
	return $rows; 
	}
?>