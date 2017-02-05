<?php
require_once('../include.php');
$act=$_REQUEST['act'];
$id = $_REQUEST['id'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$cName = $_POST['cName'];
$pName = $_POST['pName'];
$pSn = $_POST['pSn'];
$pNum = $_POST['pNum'];
$mPrice = $_POST['mPrice'];
$iPrice = $_POST['iPrice'];
$pDesc = $_POST['pDesc'];
$sex = $_POST['sex'];

if($act == "logout"){
	logout();
	} elseif($act == "addAdmin"){
		addAdmin();
	} elseif($act == "editAdmin"){
		editAdmin($id);
		} elseif($act == "addCate"){
			addCate();
			} elseif($act == "addPro"){
				addPro();//pro.inc.php
				}elseif($act == "editCate"){
					editCate($id);
					}elseif($act == "editPro"){
						editPro($id);
						} elseif($act == "addUser"){
							addUser();
							} elseif($act == "editUser"){
								editUser($id);
								}elseif($act == "waterText"){
									doWaterText($id);
									}elseif($act == "waterPic"){
										doWaterPic($id);
										}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
</body>
</html>