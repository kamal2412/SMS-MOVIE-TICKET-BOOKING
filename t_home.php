<?php session_start();
if(!isset($_SESSION['tid']))
{die("login please <a href='index.php'>go</a>");}
$tid=$_SESSION['tid'];

mysql_connect("localhost","root","");mysql_select_db("database");
$q=mysql_query("SELECT one FROM theater WHERE tid='$tid'");
while($z=mysql_fetch_assoc($q))
{
	$s=$z['one'];
	}
	
	if($s=="")
	echo "<br><br><center><h3> Please set the schedule";
?>
<html>
<title>home</title>
<head></head>
<body>
<div align="center"><br><br><br><br>

<br><br>
<a href="t_schedule.php" target="_blank" title="set the schedule">Set schedule</a><br><br>
<a href="t_todayreg.php" target="_blank" title="Check Regn">Search registration</a></div>
</body>
</html>