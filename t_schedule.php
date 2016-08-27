<?php
session_start();
mysql_connect("localhost","root","");mysql_select_db("database");
if(!isset($_SESSION['tid']))
{die("login please");}
$tid=$_SESSION['tid'];
$date=$_POST['date'];
$month=$_POST['month'];
$year=$_POST['year'];
$show1=$_POST['show1'];
$show2=$_POST['show2'];
$show3=$_POST['show3'];
$show4=$_POST['show4'];
$show5=$_POST['show5'];
$fdate=$_POST['fdate'];
$fmonth=$_POST['fmonth'];
$fyear=$_POST['fyear'];


$dmy=$date.'-'.$month.'-'.$year;

if($date=="DD"||$month=="MM"||$year==""||$fdate=="DD"||$fmonth=="MM"||$fyear=="")
{echo "sorry";}
else
{
	$tid2=$tid."_2";

$from=mktime(5,30,0,$fmonth,$fdate,$fyear);
$till=mktime(5,30,0,$month,$date,$year);
mysql_query("UPDATE theater SET uptodate='$till',fromdate='$from', one='$show1',two='$show2',three='$show3',four='$show4',five='$show5' where tid='$tid'");
$q=mysql_query("SELECT regseats FROM theater WHERE tid='$tid'");
$remaining="";
while($r=mysql_fetch_assoc($q))
{$remaining=$r['regseats'].$remaining;
	}
for($d=$from;$d<=$till;$d=$d+86400)
{
 
for($i=0;$i<5;++$i)
{$k=$i+1;
mysql_query("INSERT INTO $tid2 VALUES('$d','$k','$remaining')");
}

}	
	
	echo "<h3> Theater information updated <a href='t_home.php'>go</a></h3>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>t_main</title>
<style type="text/css">
#div1
{	z-index:1;
	margin-top:10%;
	margin-left:18%;

	height:70%;
	width:65%;
	border:#000;
	border:thick;
	border:groove;
	
}


</style>
</head>

<body>

<table border="1"  width="40%" align="center" vspace="14%">
<tr>
<td width="70%" align="center">
<h3>Set schedule</h3>
<form action="t_schedule.php" method="post" name="schedule">
<?php 
$q=mysql_query("SELECT uptodate FROM theater WHERE tid='$tid'");
while($r=mysql_fetch_assoc($q))
{
if($r['uptodate']==0)
{
$nowyear=date('Y');
echo <<<this
From Date:<input type="text" maxlength="2" size="1"   name="fdate" value="DD" />-<input type="text" size="1" name="fmonth" value="MM" maxlength="2" />-<input type="text" size="1" name="fyear" value=$nowyear   maxlength="4"/>
<br />
this;
}
else
{
$dd=date('d',$r['uptodate'])+1;$mm=date('n',$r['uptodate']);$yy=date('Y',$r['uptodate']);
echo <<<me
From Date:<input type="text" readonly="readonly"  maxlength="2" size="1"   name="fdate" value=$dd />-<input type="text" size="1"  name="fmonth" readonly="readonly" value=$mm maxlength="2" />-<input type="text" size="1" name="fyear" readonly="readonly" value=$yy   maxlength="4"/>
<br />
me;
}
}



?>

Upto Date:<input type="text"  maxlength="2" size="1"   name="date" value="DD" />-<input type="text" size="1" name="month" value="MM" maxlength="2" />-<input type="text" size="1" name="year" value=<?php echo date('Y');?>  maxlength="4"/>
<br />
<h4>Enter movie name</h4>
Show 1:<input type="text" name="show1" value="Nil" maxlength="70" /><br />
Show 2:<input type="text" name="show2" value="Nil" maxlength="70" /><br />
Show 3:<input type="text" name="show3" value="Nil" maxlength="70" /><br />
Show 4:<input type="text" name="show4" value="Nil" maxlength="70" /><br />
Show 5:<input type="text" name="show5" value="Nil" maxlength="70" /><br /><br />

<input type="submit" value="submit" /></form>
</td>
</tr>
</table> 

</body>
</html>