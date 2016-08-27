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

$showno=$_POST['show'];
$id=$_POST['id'];
$dos=$_POST['dos'];
$showno=cleanme($showno);
$id=cleanme($id);
$dos=cleanme($dos);
$gmt=mktime(date("H")+5,date("i")+30, date("s"), date("m") , date("d")+1, date("Y"));


$date=date("d-m-Y",$gmt);
 
if(!empty($showno)&&!empty($id))
{$query=mysql_query("SELECT $showno FROM theater WHERE id='$id'");


while($m=mysql_fetch_assoc($query))
{$movie=$m[$showno];}

$query=mysql_query("SELECT tid FROM theater WHERE  id='$id'");
while($m=mysql_fetch_assoc($query))
{$tid=$m['tid'];}
$tid2=$tid."_2";
$query=mysql_query("SELECT remaining FROM $tid2 WHERE showno='$showno' AND date='$dos'");
if($m=mysql_fetch_assoc($query))
{$total=$m['reg'];}
else{}


if($total=="")
{	$query=mysql_query("SELECT regseats FROM theater WHERE  tid='$tid'");
while($m=mysql_fetch_assoc($query))
{$total=$m['regseats'];}
	}
$query=mysql_query("SELECT cost,uptodate FROM theater WHERE tid='$tid'");
while($m=mysql_fetch_assoc($query))
{$cost=$m['cost'];$upto=$m['uptodate'];}

  
echo $movie.'@'.$total.'@'.$upto.'@'.$cost;}
 

?>