<?php
//require_once('../include.php');
function addPro(){
	$arr = $_POST;
	$arr['pubTime'] = time();
	$path="../uploads";
	$uploadFiles = uploadFiles();//在imooc目录下创建了uploads并将图片存了进去
	
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50,true);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220,true);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350,true);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800,true);
			}
		}
	$res = insert("imooc_pro",$arr);
	$pid = getInsertId();
	if($res&&$pid){
		foreach($uploadFiles as $uploadFile){
			$arr1['pid'] = $pid;
			$arr1['albumPath'] = $uploadFile['name'];
			addAlbum($arr1);
			}
			alertMes("添加成功，继续添加","addPro.php");
		} else {
			
			foreach($uploadFiles as $uploadFile){
				if(file_exists("../image_800/".$uploadFile['name'])){
					unlink("../image_800".$uploadFile['name']);
					}
				if(file_exists("../image_50/".$uploadFile['name'])){
					unlink("../image_50".$uploadFile['name']);
					}
				if(file_exists("../image_220/".$uploadFile['name'])){
					unlink("../image_220".$uploadFile['name']);
					}
				if(file_exists("../image_350/".$uploadFile['name'])){
					unlink("../image_350".$uploadFile['name']);
					}
				}
			alertMes("添加失败，重新添加","addPro.php");
			}
		return;
		
	}
	
function getAllProByAdmin(){
	$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p 
	join imooc_cate c on p.cId = c.id";
	$rows=fetchAll($sql);
	return $rows;
	
	}
function editPro($id){
	$arr = $_POST;
	if (update("imooc_pro",$arr,"id = {$id}")){
		alertMes("修改成功","listPro.php?page=1");
		} else {
			alertMes("修改失败，请重新尝试","editPro.php");
			}
	}
function getProById($id){
	$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p 
	join imooc_cate c on p.cId = c.id where p.id = {$id}";
	$row = fetchOne($sql);
	return $row;
	}
//得到所有商品
function getAllPro(){
	$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p 
	join imooc_cate c on p.cId = c.id";
	$rows = fetchAll($sql);
	return $rows;
	}
//根据CID得到产品（根据产品分类得到产品））
function getProByCid($cid){
	$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p 
	join imooc_cate c on p.cId = c.id where p.cId = {$cid} limit 4";
	$rows = fetchAll($sql);
	return $rows;
	}
//得到下四条产品
function getSmallProByCid($cid){
	$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p 
	join imooc_cate c on p.cId = c.id where p.cId = {$cid} limit 4,4";
	$rows = fetchAll($sql);
	return $rows;
	}
	
function getProInfo(){
	$sql = "select id,pName from imooc_pro order by id asc";
	$rows = fetchAll($sql);
	return $rows;
	}
	
function getAllImgByProId($id){
	$sql = "select * from imooc_album where id = {$id}";
	$rows = fetchAll($sql);
	return $rows;
	}