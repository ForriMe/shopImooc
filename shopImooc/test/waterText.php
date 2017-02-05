<?php

//$filename = "des_big.jpg";
//waterText($filename);
//function waterText($filename,$fontfile="SIMYOU.TTF",$text="imooc.com"){
//$fileInfo = getimagesize($filename);
//$mime = $fileInfo['mime'];
//$createFun = str_replace("/","createfrom",$mime);
//$outFun = str_replace("/","",$mime);
//$image = $createFun($filename);
//$color = imagecolorallocatealpha($image,255,0,0,50);
//$fontfile="../fonts/SIMYOU.TTF";
//$text = "imooc.com";
//imagettftext($image,14,0,0,14,$color,$fontfile,$text);
//header("content-type:".$mime);
//$outFun($image,$filename);
//imagedestroy($image);
//}



waterPic($dstFile);
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
header("content-type:".$dstMime);
$outDstFun($dst_im,$dstFile);
imagedestroy($src_im);
imagedestroy($dst_im);
}
