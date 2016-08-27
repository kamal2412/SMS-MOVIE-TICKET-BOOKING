<?php
session_start();
mysql_connect("localhost","root","");mysql_select_db("database");
function cleanme($v)
{

$v = mysql_real_escape_string($v);
$v=strip_tags($v);
$v = trim($v);
return($v);
}
$tid=$_POST['tid'];
$password=$_POST['password'];
$tid=cleanme($tid);$password=cleanme($password);
if(!empty($tid)&&!empty($password))
{



$query = mysql_query("SELECT * FROM theater WHERE tid='$tid' AND password='$password'");
if($id=mysql_fetch_assoc($query))
{	
	$_SESSION['tid']=$tid;
	header("location:t_home.php");
}
else
echo "Incorrect login information";
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
<title>t_login</title>
</head>

<body>
<div id="enter">
<table align="center" vspace="10%"><tr><td>
<form action="t_login.php" name="login" method="POST">
tid:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="tid" /><br/>
Password:<input type="password" name="password" /><br />
<input type="submit" name="submit" />
</form></td></tr></table>
</div>
</body>
</html>