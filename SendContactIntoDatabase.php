<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
extract($_POST);
$connection=mysql_connect("localhost","root","") or die ("Can't connect with the Server");
$db= mysql_select_db("Highrachy") or die ("Can't connect to database");
$query="INSERT INTO Comments (Name, Email, Subject, Comments) 
	    VALUES ('$Name','$Email','$Subject','$Comments')";
mysql_query($query) OR die ("can't query".mysql_error());
header("Location: index.php"); 
?>
</body>
</html>
