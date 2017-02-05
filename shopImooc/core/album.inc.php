<?php
 
 function addAlbum($arr){
	 insert("imooc_album",$arr);
	 }
	 //根据商品ID得到商品图片一张
function getProImgById($id){
	$sql = "select albumPath from imooc_album where pid = {$id} limit 1";
	$row = fetchOne($sql);
	return $row;
	}
	//根据商品ID得到所有图片
function getProImgsById($id){
	$sql = "select albumPath from imooc_album where pid = {$id}";
	$rows = fetchAll($sql);
	return $rows;
	}
	
function doWaterText($id){
	$rows = getProImgsById($id);
	foreach($rows as $row){
		$filename = "../uploads/".$row['albumPath'];
		if(waterText($filename)){
			alertMes("添加成功","listProImages.php");
			} else {
				alertMes("添加失败","listProImages.php");
				}
		}
	}
	
function doWaterPic($id){
	$rows = getProImgsById($id);
	foreach($rows as $row){
		$filename = "../uploads/".$row['albumPath'];
		if(waterPic($filename)){
			alertMes("添加成功","listProImages.php");
			} else {
				alertMes("添加失败","listProImages.php");
				}
		}
	}
?>