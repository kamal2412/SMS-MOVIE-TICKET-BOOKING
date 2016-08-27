<?php session_start();
mysql_connect("localhost","root","");mysql_select_db("database");
$district=$_POST['district'];

$district = strip_tags($district);
$district = mysql_real_escape_string($district);
$district = trim($district);
if(!empty($district))
		  {
$query=mysql_query("SELECT name,uptodate FROM theater WHERE district='$district'");
$count=mysql_num_rows($query);
$theater='';
 
while($v=mysql_fetch_assoc($query))
{
$theater=$v['name'].'@'.$theater;
 
}
 
$theater=$count.'@'.$theater;
echo $theater;
		  }
		  
?>