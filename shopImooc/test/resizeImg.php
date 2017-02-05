<?php
//$filename="des_big.jpg";
//$src_image = imagecreatefromjpeg($filename);//创建画布资源
//list($src_w,$src_h) = getimagesize($filename);//得到宽和高
//$scale=0.5;//缩放比例
//$dst_w=ceil($src_w*$scale);//得到新的宽高，并取整
//$dst_h=ceil($src_h*$scale);
//$dst_image = imagecreatetruecolor($dst_w,$dst_h);//创建一个新的画布
//imagecopyresampled($dst_image,$src_image,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);//重采样，拷贝原图到新画布
//ob_clean();
//header("Content-type: image/jpeg");
//imagejpeg($dst_image,"uploads/".$filename);//保存到磁盘文件（不可显示） 
//
//imagedestroy($src_image);//销毁资源
//imagedestroy($dst_image);


//$filename="des_big.jpg";
//list($src_w,$src_h,$imagetype) = getimagesize($filename);
//$mime = image_type_to_mime_type($imagetype);//mime = image/jpg
//$createFun = str_replace("/","createfrom",$mime);//createFun = imagecreatefromjpeg //获得图像资源函数
//$outFun = str_replace("/",null,$mime); //outFun = imagejpeg //输入图像函数
//$src_image = $createFun($filename);//解决了不同后缀图片的显示问题
//$dst_50_image=imagecreatetruecolor(50,50);
//$dst_220_image=imagecreatetruecolor(220,220);
//$dst_350_image=imagecreatetruecolor(350,350);
//$dst_800_image=imagecreatetruecolor(800,800);
//imagecopyresampled($dst_50_image,$src_image,0,0,0,0,50,50,$src_w,$src_h);
//imagecopyresampled($dst_220_image,$src_image,0,0,0,0,220,220,$src_w,$src_h);
//imagecopyresampled($dst_350_image,$src_image,0,0,0,0,350,350,$src_w,$src_h);
//imagecopyresampled($dst_800_image,$src_image,0,0,0,0,800,800,$src_w,$src_h);
//$outFun($dst_50_image,"uploads/image_50/".$filename);
//$outFun($dst_220_image,"uploads/image_220/".$filename);
//$outFun($dst_350_image,"uploads/image_350/".$filename);
//$outFun($dst_800_image,"uploads/image_800/".$filename);
//imagedestroy($src_image);
//imagedestroy($dst_50_image);
//imagedestroy($dst_220_image);
//imagedestroy($dst_350_image);
//imagedestroy($dst_800_image);
require_once("../lib/string.func.php");
$filename="des_big.jpg";
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=false,$scale=0.5){
	list($src_w,$src_h,$imagetype) = getimagesize($filename);//得到原图像的宽高，类型
//	$scale = 0.5;
	if(is_null($dst_w)||is_null($dst_h)){ //判断是否指定了宽高，若没指定，则用默认的缩放比例
		$dst_w=ceil($src_w*$scale);
		$dst_h=ceil($src_h*$scale);
		}
	$mime=image_type_to_mime_type($imagetype);//mime = image/jpg
	$createFun=str_replace("/","createfrom",$mime); //获得图像资源函数
	$outFun = str_replace("/",null,$mime); //输入图像函数
	$src_image=$createFun($filename);//解决了不同后缀图片的显示问
	$dst_image=imagecreatetruecolor($dst_w,$dst_h);//创建一个新的画布
	imagecopyresampled($dst_image,$src_image,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);//重采样，拷贝原图到新画
	//image_50/fadsfafaefd.jpg
	if($destination&&!file_exists(dirname($destination))){//destination有值但是不存在这个目录
		mkdir(dirname($destination),0777,true);
		}
	$dstFilename= $destination ==null?getUniName().".".getExt($filename):$destination;//
	$outFun($dst_image,$dstFilename);
	imagedestroy($src_image);
	imagedestroy($dst_image);
//	$isReservedSource=false;
	if(!$isReservedSource){
		unlink($filename);
		}
		return $dstFilename;
	}

thumb($filename,"image_50/".$filename,50,50,true);
thumb($filename,"image_220/".$filename,220,220,true);
thumb($filename,"image_350/".$filename,350,350,true);
thumb($filename,"image_800/".$filename,800,800,true);


//
//function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=false,$scale=0.5){
//	list($src_w,$src_h,$imagetype)=getimagesize($filename);
//	if(is_null($dst_w)||is_null($dst_h)){
//		$dst_w=ceil($src_w*$scale);
//		$dst_h=ceil($src_h*$scale);
//	}
//	$mime=image_type_to_mime_type($imagetype);
//	$createFun=str_replace("/", "createfrom", $mime);
//	$outFun=str_replace("/", null, $mime);
//	$src_image=$createFun($filename);
//	$dst_image=imagecreatetruecolor($dst_w, $dst_h);
//	imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
//	//image_50/sdfsdkfjkelwkerjle.jpg
//	if($destination&&!file_exists(dirname($destination))){
//		mkdir(dirname($destination),0777,true);
//	}
//	$dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
//	$outFun($dst_image,$dstFilename);
//	imagedestroy($src_image);
//	imagedestroy($dst_image);
//	if(!$isReservedSource){
//		unlink($filename);
//	}
//	return $dstFilename;
//}









?>




