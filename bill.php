
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bill</title>
<style type="text/css">
#lt{
	z-index:1;
};
#rt{
	z-index:1;
	width:150px;
	background-color:#CCC;
	border:double;
	border:medium;
	border:#000;
	text-align:right;
}
</style>
</head>

<body>
<?php 
$gmt=mktime(date("H")+5,date("i")+30, date("s"), date("m") , date("d")+1, date("Y"));


$date=date("d-m-Y",$gmt);
if(!isset($_COOKIE['mid']))
{die("please login <a href='index.php'>go</a>");}
mysql_connect("localhost","root","");mysql_select_db("database")	 ;
//mysql_connect("localhost","579716_bycinco","namaknamak");mysql_select_db("bycinco_99k_database");
function cleanme($v)
{
$v = mysql_real_escape_string($v);
$v=strip_tags($v);
$v = trim($v);
return($v);
}
$id=$_COOKIE["mid"];

echo $district=$_REQUEST['district'];
echo $theater=$_REQUEST['theater'];
echo $number=$_REQUEST['number'];
echo $ticket=$_REQUEST['ticket'];
echo $showno=$_REQUEST['showno'];
echo $_POST['id'];
$district=cleanme($district);$number=cleanme($number);$ticket=cleanme($ticket);

$theater=cleanme($theater);$showno=cleanme($showno);
if(!empty($district)&&!empty($theater)&&!empty($number)&&!empty($ticket)&&!empty($showno))
				 {
					 $gmt=mktime(date("H")+5,date("i")+30, date("s"), date("m") , date("d")+1, date("Y"));
					$date=date("d-m-Y",$gmt);
					$query=mysql_query("SELECT tid FROM theater WHERE district='$district' AND name='$theater'");
while($m=mysql_fetch_assoc($query))
{$tid=$m['tid'];}
$cd=$id.'#'.$number."#".$ticket;
$tid2=$tid."_2";
$query=mysql_query("SELECT remaining FROM $tid2 WHERE showno='$showno' AND date='$date'");
					
					
while($z=mysql_fetch_assoc($query))
{$fill=$z['reg'];}
if($fill!="")
{
$query=mysql_query("SELECT regseats FROM theater WHERE tid='$tid'");
while($s=mysql_fetch_assoc($query))
{$regseats=$s['regseats'];}
$filled=$fill-$number;
if($filled>=0)
{	mysql_query("UPDATE fseat SET reg='$filled' WHERE showno='$showno' AND date='$date' AND tid='$tid'");}
	
	$insert1=$regseats-$fill+1;
	$insert2=$insert1+$number-1;
	$insert=$insert1."-".$insert2;
	mysql_query("INSERT INTO $tid VALUES('','$date','$showno','$insert','$cd')");
}
else 
{

$que=mysql_query("SELECT regseats FROM theater WHERE tid='$tid'");
while($r=mysql_fetch_assoc($que))
{$regseats=$r['regseats'];}

$query=mysql_query("SELECT totalseats FROM theater WHERE tid='$tid'");
while($t=mysql_fetch_assoc($query))
{$totseats=$t['totalseats'];}
mysql_query("INSERT INTO fseat VALUES('','$tid','$date','$showno','$regseats','$totseats')");
$query=mysql_query("SELECT regseats FROM theater WHERE tid='$tid'");
while($s=mysql_fetch_assoc($query))
{$regseats=$s['regseats'];}
$filled=$regseats-$number;
mysql_query("UPDATE fseat SET reg='$filled' WHERE showno='$showno' AND date='$date' AND tid='$tid'");
$insert="1-".$number;
mysql_query("INSERT INTO $tid VALUES('0','$date','$showno','$insert','$cd')");
}


echo "<table align='center' border='3' vspace='100px' width='50%' height='50%'><tr><td width='100%'>";
echo "<div align='center'><font size='+3'><strong>".$theater."</strong></font><br><font size='+1'>(".$district." dist.)</font></div><hr>";
echo "<br><div align='center'><h2>Date:".$date."&nbsp;&nbsp;&nbsp;&nbsp;Showno:".$showno."&nbsp;&nbsp;&nbsp;&nbsp;Code:".$cd."</h2></div>";
echo "<div id='lt' align='center'><h4>Name:".$fullname."&nbsp;&nbsp;Userid:".(1000+$id['id'])."</h4></div>";
echo "<div align='right' id='rt'><font size='+1'>To be payed:<strong> Rs.".$ticket*$number."&nbsp;&nbsp;</font></div>";
echo "</td></tr></table>";
echo "<input type='button' value='print' name='print' onclick='window.print()'><br><br>";
echo "<a href=logout.php>logout</a> ";

die();
}
				 //else
				// {die("<br><br><h3>some fields are empty.. <a href='home.php'>go fill</a>");}
?>
</body>
</html>