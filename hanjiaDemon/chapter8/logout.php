<?php
session_start();
unset($_SESSION);
$_SESSION = array();
define('TITLE','Logout');
include('header.html');
?>
<h2>Welcome to the J.D. Salinger an Club!</h2>
<p>You are now logged out.</p>
<p>Thank you for using this site. We hope that you liked it.<br/>
Blah, Blah, Blah, Blah, Blah, Blah, Blah, Blah, </p>

<?php include('footer.html');?>