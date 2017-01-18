<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<pre>
<?php
	$grades = array(
		'Richard' => 95,
		'Sherwood' => 82,
		'Toni' => 98,
		'Franz' => 87,
		'Melissa' => 75,
		'Robby' => 85
	);
	
	print '<p>Originally the array looks like this: <br/>';
	foreach ($grades as $student => $grade){
			print "$student: $grade<br/>\n";
		}
	print "</p>";
	
	krsort($grades);
	print '<p>arsort the array looks like this: <br/>';
	foreach ($grades as $student => $grade){
			print "$student: $grade<br/>\n";
		}
	print "</p>";
	
	
	?>
    </pre>
</body>
</html>