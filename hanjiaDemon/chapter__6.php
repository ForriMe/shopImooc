<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<style type="text/css">
p{text-align:right;}
.m{margin-right:600px;}
</style>
</head>

<body>
<div class="m">
	<p>Please complete this form register:</p>
    <form action="chapter_6.php" method="post">
    <p>Email Address: <input type="text" name="email" size="30"/></p>
    <p>Password: <input type="password" name="password" size="30"/></p>
    <p>Confirm Password: <input type="password" name="confirm" size="30"/></p>
    
    
    <p>Date of Birth: 
    	<select name="month">
        	<option value ="">Month</option>
            <option value ="1">January</option>
            <option value ="2">February</option>
            <option value ="3">March</option>
            <option value ="4">April</option>
            <option value ="5">May</option>
            <option value ="6">June</option>
            <option value ="7">July</option>
            <option value ="8">August</option>
            <option value ="9">September</option>
            <option value ="10">October</option>
            <option value ="11">November</option>
            <option value ="12">December</option>
        </select>
        <select name="day">
        	<option value="">Day</option>
            <?php
            	for($i=1;$i<=31;$i++){
                	print "<option value=\"$i\">$i</option>\n";
                }
            ?>
        </select>
        <input type="text" name="bornyear" value="YYYY" size="4"/>
    </p>
    
    
    <p>Favorite color: <select name="favoritecolor">
    						<option value="">Pick one</option>
                            <option value="red">red</option>
                            <option value="green">green</option>
                            <option value="yellow">yellow</option>
                        </select></p>
     
    <p><input type="checkbox" name="terms" value="yes"/>i agree to the terms.</p>
    <p><input type="submit" name="submit" value="Reigster"/></p>
    </form>
</div>
</body>
</html>
