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
  /*Copyright 2016 Kamal Mahesh V

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.*/

?>
