<?php
$email=$_GET['email'];
$verified=$_GET['readthis'];
$connect=mysql_connect("localhost","root","") or die(" couldnt connect");mysql_select_db("database") or die("cudnt connect xampp");
function cleanme($v)
{
$v = mysql_real_escape_string($v);
$v=strip_tags($v);
$v = trim($v);

return($v);
}

if(!empty($email)&&!empty($verified))
{
$email=cleanme($email);
$verified=cleanme($verified);
$query = mysql_query("SELECT verified FROM members WHERE email='$email'");

	while($check=mysql_fetch_assoc($query))
	{$data=$check['verified'];}
	if($data==1)
	{die("Hello .. Acoount with email id ".$email." is already activated");}
	else
	{
if(strcmp($data,$verified)==0)
{
	echo "User account with email id ".$email." suuccessfully activated<br> Login>><a href='login.php'>here</a>";
	mysql_query("UPDATE members SET verified='1' WHERE email='$email'");
	}
	
	else
	{die("Invalid email id");}
	}}
?>
