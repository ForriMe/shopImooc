<?php
	require_once("string.func.php");
		//通过gd库做验证码
		//创建画布
function verifyImage($type = 1,$length = 4,$sess_name = "verify"){
	$width = 80;
	$height = 30;
	
	$image = @imagecreatetruecolor($width,$height)or die('Cannot Initialize new GD image stream');
	
	$white = imagecolorallocate($image,255,255,255);
	$black = imagecolorallocate($image,0,0,0);
	//用填充矩阵填充画布
	imagefilledrectangle($image,1,1,$width-2,$height-2,$white);
	//随机产生4个数字
	//$type = 1;
	//$length = 4;
	$chars = buildRandomString($type,$length);
	$sess_name="verify";
	$_SESSION['verify']=$chars;
	$fontfile="SIMYOU.TTF";
	for($i=0;$i<$length;$i++){
		$size=mt_rand(14,18);
		$angle=mt_rand(-15,15);
		$x=5+$i*$size;
		$y=mt_rand(20,26);
		$color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
		$fontfile="../fonts/".$fontfile;
		$text=substr($chars,$i,1);//取随机产生的第一，第二，第三，第四个数字
		imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);
	}
	
	for($i=0;$i<50;$i++){
		imagesetpixel($image,mt_rand(0,$width-1),mt_rand(0,$height-1),$black);
		}
	
	for($i=0;$i<5;$i++){
		imageline($image,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$black);
		}
		
	ob_clean();
	header ('Content-Type: image/gif');
	imagegif($image);
	imagedestroy($image);
}
		
//生成缩略图
//thumb($filename,"image_50/".$filename,50,50,true);
//thumb($filename,"image_220/".$filename,220,220,true);
//thumb($filename,"image_350/".$filename,350,350,true);
//thumb($filename,"image_800/".$filename,800,800,true);
//文件名，保存路径，缩略图的宽，缩略图的高，是否保留原文件，默认缩放比例
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
//创建文字水印
function waterText($filename,$fontfile="SIMYOU.TTF",$text="imooc.com"){
	$fileInfo = getimagesize($filename);
	$mime = $fileInfo['mime'];
	$createFun = str_replace("/","createfrom",$mime);
	$outFun = str_replace("/","",$mime);
	$image = $createFun($filename);
	$color = imagecolorallocatealpha($image,255,0,0,50);
	$fontfile="../fonts/SIMYOU.TTF";
	$text = "imooc.com";
	imagettftext($image,14,0,0,14,$color,$fontfile,$text);
	//header("content-type:".$mime);
	$outFun($image,$filename);
	imagedestroy($image);
	return true;
}

//创建图片水印
function waterPic($dstFile,$srcFile="../images/logo.jpg",$pct=30){
	$srcFileInfo=getimagesize($srcFile);
	$src_w=$srcFileInfo[0];
	$src_h=$srcFileInfo[1];
	$dstFileInfo=getimagesize($dstFile);
	$srcMime=$srcFileInfo['mime'];
	$dstMime=$dstFileInfo['mime'];
	$createSrcFun=str_replace("/", "createfrom", $srcMime);
	$createDstFun=str_replace("/", "createfrom", $dstMime);
	$outDstFun=str_replace("/", null, $dstMime);
	$dst_im=$createDstFun($dstFile);
	$src_im=$createSrcFun($srcFile);
	imagecopymerge($dst_im, $src_im, 0,0,0,0, $src_w, $src_h,$pct);
	//header("content-type:".$dstMime);
	$outDstFun($dst_im,$dstFile);
	imagedestroy($src_im);
	imagedestroy($dst_im);
	return true;
}
?>


