
<?php
require_once('common.func.php');
//检查是否为管理员
function checkAdmin($sql){
	return fetchOne($sql);
	}
//检查是否登录
function checkLogined(){
	if($_SESSION['id'] == "" && $_COOKIE['adminId'] == ""){
		alertMes("请先登录","login.php");
		}
	}
//注销管理员
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE['session_name()'])){
		setcookie(session_name(),"",time()-1);
		}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
		}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
		}
	session_destroy();
	alertMes("退出成功","login.php");
	}
	
//添加管理员
function addAdmin(){
	$arr = $_POST;
	$arr['password']=md5($_POST['password']);
	if(insert("imooc_admin",$arr)){
		alertMes("添加成功，继续添加","addAdmin.php");
		} else {
			alertMes("添加失败，重新添加","addAdmin.php");
			}
	
	}
	
//得到所有管理员
function getAllAdmin(){
	$sql = "select id,username,email from imooc_admin";
	$rows = fetchAll($sql);
	return $rows;
	}
//update($table,$array,$where = null)
//更新管理员
function editAdmin($id){
	$arr = $_POST;
	$arr['password'] = md5($_POST['password']);
	if (update("imooc_admin",$arr,"id = {$id}")){
		alertMes("修改成功","listAdmin.php");
		} else {
			alertMes("修改失败，请重新尝试","editAdmin.php");
			}
	}
//分页显示
function getAdminByPage($pageSize=3){
	$sql="select * from imooc_admin";
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
	$sql="select * from imooc_admin limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
	}
?>