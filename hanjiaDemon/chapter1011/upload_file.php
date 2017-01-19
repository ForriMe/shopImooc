<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upload a file</title>
</head>

<body>
<?php

	if ( move_uploaded_file ($_FILES['the_file']['tmp_name'], "uploads/{$_FILES['the_file']['name']}") ) {
		print '<p>your file has been upload.</p>';
		} else {
			print '<p style="color:red">your file could not be uploaded because the error:'
			 . $_FILES['the_file']['error'] . '</p>';
			}
	
?>
<form action="upload_file.php" enctype="multipart/form-data" method="post">
	<p>Upload a file using this form:</p>
    <input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
    <p><input type="file" name="the_file"/></p>
    <p><input type="submit" name="submit" value="Upload This File"/></p>

</form>
</body>
</html>