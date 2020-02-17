<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
extract($_POST);
if (!empty($_POST['Name'])){
$msg = "fname: $_POST[Name] ";
}else{
$fname = NULL;
echo "Please fill out your first name.
";
}
if (!empty($_POST['Subject'])){
$msg .= "lname: $_POST[Subject] ";
}else{
$lname = NULL;
echo "Please fill out your last name.
";
}
if (!empty($_POST['Email'])){
$msg .= "email: $_POST[Email] ";
}else{
$email = NULL;
echo "Please leave your email address.
";
}
if (!empty($_POST['Comments'])){
$msg .= "comments: $_POST[Comments] ";
}else{
$comments = NULL;
echo "You forgot to leave a comment.
";
}
$recipient = "harunpopson@yahoo.com";
$subject = "Highrachy Contact Form Feedback: $_POST[Subject]";
$mailheaders = "Reply-to: $_POST[email]"; 

//send the mail 

mail($recipient, $subject, $Comments, $mailheaders);
header("Location: index.php"); 
?>
</body>
</html>
