<?php
//后台添加管理员
function addUser(){
	$arr = $_POST;
	$arr['regTime'] = time();
	$arr['password']=md5($_POST['password']);
	$path="../uploads";
	$uploadFile = uploadFiles();
	$arr['face'] = $uploadFile[0]['name'];
	thumb($path."/".$uploadFile[0]['name'],"../image_user/".$uploadFile[0]['name'],50,50,true);
	if(insert("imooc_user",$arr)){
		alertMes("添加成功，继续添加","adduser.php");
		
		} else {
			if(file_exists("../image_user/".$uploadFile[0]['name'])){
					unlink("../image_user".$uploadFile[0]['name']);
					}
			alertMes("添加失败，重新添加","adduser.php");
			}
	
	}

//前台注册管理员
function addUser1(){
	$arr = $_POST;
	print_r($arr);
	$arr['regTime'] = time();
	$arr['password']=md5($_POST['password']);
	print_r($arr);
	echo insert("imooc_user",$arr);

	
	}
function getUserByPage($pageSize=3){
	$sql="select * from imooc_user";
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
	$sql="select * from imooc_user limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
	}
	
function editUser($id){
	$arr = $_POST;
	print_r($arr);
	if (update("imooc_user",$arr,"id = {$id}")){
		alertMes("修改成功","listUser.php?page=1");
		} else {
			alertMes("修改失败，请重新尝试","editUser.php");
			}
	}
?>