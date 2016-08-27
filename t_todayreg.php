<?php session_start(); 

mysql_connect("localhost","root","");mysql_select_db("database");
$showno=$_REQUEST['showno'];
$one=$_POST['one'];
$two=$_POST['two'];
$three=$_POST['three'];
$tid=$_SESSION['tid'];

$al=$one."#".$two."#".$three;
if($one=="msg")
{$al=$one."z".$two."z".$three;}
$gmt=mktime(date("H")+5,date("i")+30, date("s"), date("m") , date("d"), date("Y"));
$date=date("d-m-Y",$gmt);
if(empty($showno)&&!empty($one)&&!empty($two)&&!empty($three))
{$showno=$_SESSION['now']; }
else if(!empty($showno)&&empty($one)&&empty($two)&&empty($three))
{$_SESSION['now']=$showno; }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validate</title>
</head>

<body>

<?php 

if(!isset($_SESSION['now']))
{
	echo "
<table align='center' vspace='10%' border='1'>
<tr><td>
<form action='t_todayreg.php' method='post' name='search'>Select show:<br><select name='showno'>
<option value=''>Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
<option value='one'>1</option>
<option value='two'>2</option>
<option value='three'>3</option>
<option value='four'>4</option>
<option value='five'>5</option>
</select>";
echo "<br><br><input type='submit' value='submit' />";
echo "</form>";
echo "</td></tr><tr><td>";
}
else
{echo "
<table align='center' width='50%' vspace='10%' border='1'>
<tr><td align='center'>
<form action='t_todayreg.php' method='post' name='search'>";
echo "<br />Enter code: &nbsp;<input type='text' name='one'  size='2'/>#<input type='text' size='2' name='two' />#<input type='text' size='2' name='three' /><br /><input  type='submit' value='search' /></form>"; 


echo "</td></tr><tr><td align='center'>";
}
if(!empty($showno)&&!empty($date)&&!empty($tid)&&(!empty($al)))
{
	$q=mysql_query("SELECT * FROM $tid WHERE showno='$showno' AND date='$date' AND code='$al'");
	if(mysql_fetch_assoc($q))
	echo "<br><h4>Ticket valid";
	else
	{
		if($al!="##")
	echo "<br><h4>No such ticket registered for showno ".$showno;
	}}
echo "<br><br><br><a href='change2.php'>Change showno</a>";
echo "</td></tr></table";
?>


</body>
</html>