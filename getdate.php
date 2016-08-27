<?php session_start();
mysql_connect("localhost","root","");mysql_select_db("database");
function cleanme($v)
{
$v = mysql_real_escape_string($v);
$v=strip_tags($v);
$v = trim($v);

return($v);
}	

 
$theater=$_POST['theater'];
$district=$_POST['district'];
 
$theater=cleanme($theater);
$district=cleanme($district);
if(!empty($theater)&&!empty($district))
{
$query=mysql_query("SELECT id FROM theater WHERE district='$district' AND name='$theater'");
while($m=mysql_fetch_assoc($query))
{$id=$m['id'];}
}
$query=mysql_query("SELECT uptodate FROM theater WHERE id='$id'");
while($m=mysql_fetch_assoc($query))
{$upto=$m['uptodate'];}
$query=mysql_query("SELECT cost FROM theater WHERE id='$id'");
while($m=mysql_fetch_assoc($query))
{$cost=$m['cost'];}
echo $upto."@".$id."@".$cost;
?> 