<?php
require_once("../lib/string.func.php");
require_once("upload.func.php");
header("content-type:text/html/charset=utf-8");
$fileInfo=$_FILES['myfile'];
$info = uploadFile($fileInfo);
echo $info;