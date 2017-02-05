<?php
require_once('include.php');
$act=$_REQUEST['act'];
$id = $_REQUEST['id'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$sex = $_POST['sex'];
if($act == "reg"){
	addUser1();
	}
?>