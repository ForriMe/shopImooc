<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<?php
	function make_date_menus() {
		$months = array(1 => 'January','February','March','April','May','June','July','August','September','October',				                        'November','December');
		print '<select name="month">';
		foreach($months as $key =>$value){
			print "<option value=\"$key\">$value</option>";
			}	
		print "</select>";	
		
		print '<select name="day">';
		for($i=1;$i<=31;$i++){
			print "<option value=\"$i\">$i</option>";
			}
		print "</select>";
		
		print '<select name="year">';
		$year = date('Y');
		for($j = ($year - 10);$j<=($year + 10);$j++){
			print "<option value=\"$j\">$j</option>";
			}
		print "</select>";
		
		
		
	}
	
	make_date_menus();
	
?>
</body>
</html>