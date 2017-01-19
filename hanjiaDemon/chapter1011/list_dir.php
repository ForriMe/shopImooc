<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>directory contents</title>
</head>

<body>

<?php

date_default_timezone_set('Asia/Hong_Kong');

$search_dir = '.';
$contents = scandir($search_dir);
print '<h2>Directories</h2>
<ul>';
foreach ($contents as $item) {
	if(  (is_dir($search_dir . '/' . $item)) AND (  substr($item,0,1) != '.' ) ) {
		print "<li>$item</li>\n";
		}
	}
	print '</ul';
	
	print '<hr /><h2>Files</h2>
	<table cellpadding="2" cellspacing="2" align="left">
	<tr>
	<td>Name</td>
	<td>Size</td>
	<td>Last Modified</td>
	</tr>';
	
	foreach ($contents as $item) {
		if ( (is_file($search_dir . '/' . $item)) AND (substr($item,0,1) != '.')) {
			$fs = filesize($search_dir . '/' . $item);
			$lm = date('F j, Y', filemtime($search_dir . '/' . $item));
			print "<tr>
			<td>$item></td>
			<td>$fs bytes</td>
			<td>$lm</td>
			</tr>\n";
			}
		}
print '</table>';
?>

</body>
</html>