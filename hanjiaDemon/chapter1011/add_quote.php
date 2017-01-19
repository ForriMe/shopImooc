<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>add a quotation</title>
</head>

<body>

<?php

$file = 'quotes.txt';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (!empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.')) {
		if (is_writeable($file)) {
			file_put_contents($file , $_POST['quote'], FILE_APPEND | LOCK_EX);
			print '<p>Your quotation has been stored.</p>';
			} else {
				print '<p style="color:red;">Your quotation could not be stored due to a systen error.</p>';
				}
		} else {
			print '<p style="color:red;">Please enter a quotation!</p>';
			}
	
	}

?>
<form action="add_quote.php" method="post">
	<textarea name="quote" rows="5" cols="30" >Enter your quotation here.</textarea>
    <br/>
    <input type="submit" name="submit" value="Add this quote!"/>
</form>

</body>
</html>