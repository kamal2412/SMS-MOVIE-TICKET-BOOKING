<?php
if(isset($_COOKIE['mid'])){echo "<script type='text/javascript'>window.location='home.php';</script>";}
mysql_connect("localhost","root","");mysql_select_db("database");
function cleanme($v)
{

$v = mysql_real_escape_string($v);
$v=strip_tags($v);
$v = trim($v);
return($v);
}
$email=$_POST['email'];
$password=$_POST['password'];
$email=cleanme($email);$password=cleanme($password);
if(!empty($email)&&!empty($password))
{



$query = mysql_query("SELECT * FROM members WHERE email='$email' AND password='$password' AND verified='1'");
if($id=mysql_fetch_assoc($query))
{	
	$age=time()+86400;
	setcookie("mid",$id['id'],$age);


	echo "<script type='text/javascript'>window.location='home.php';</script>";
}
else
{$query = mysql_query("SELECT * FROM members WHERE email='$email' AND password='$password'");
	if(mysql_fetch_assoc($query))
	{die(" Account not activated. Check ur maill box for activation information");}
	else
	{die("Incorrect login information");}}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
#enter
{
	left:1335px;
	top:15%;
	right:15%;
	bottom:15%;
	vertical-align:middle;
	height:70%;
	width:70%;
	
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
</head>

<body>
<div id="enter">
<table align="center" vspace="9%" width="50%"><TR><TD>
<form action="login.php" name="login" method="POST">
Email:<input type="text" name="email" /><br/>
Password:<input type="password" name="password" /><br />
<input type="submit" name="submit" />
</form></TD></TR></table>
</div>
</body>
</html>