<?php
require_once('../include.php');
//分页管理
$page="";
$pageSize = 3;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getCateByPage($pageSize);
if(!$rows){
	alertMes("没有分类，请先添加","addCate.php");
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>.
<link rel="stylesheet" href="style/backstage.css">
</head>

<body>
            <!--右侧内容-->
            <div class="cont">
                <div class="title">分类管理</div>
                <div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" 
							onClick="javascript:window.location.href='addCate.php' ">
                        </div>
                       
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="30%">分类ID</th>
                                <th width="45%">分类名称</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						foreach($rows as $key => $values){
								print "
									<tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type=\"checkbox\" id=\"c".
								$values['id'].
								" class=\"check\"><label for=\"c".
								$values['id'].
								" class=\"label\">"."  ".
								$values['id'].
								"</label></td>
                                <td>".
								$values['cName'].
								"</td>
                                <td align=\"center\">
								<input type=\"button\" value=\"修改\" class=\"btn\" onClick=\"editAdmin(".$values['id'].")\">
								<input type=\"button\" value=\"删除\" class=\"btn\" onClick=\"dropAdmin(".$values['id'].")\">
								</td>
                            </tr>";	
							}
						?>
								<?php
								if($rows>$pageSize):
								?>
                           		<tr>
									<td colspan="4"><?php  echo showPage($page,$totalPage); ?></td>
								</tr>
								<?php endif;?>
                        </tbody>
                    </table> 

                </div>
            </div>
        </div>

</body>
<script type="text/javascript">
function editAdmin(id){
	window.location = "editCate.php?id="+id;
	}
function dropAdmin(id){
	if(window.confirm("确认要删除吗？")){
	window.location = "dropCate.php?id="+id;
	}
	}
	

</script>
</html>