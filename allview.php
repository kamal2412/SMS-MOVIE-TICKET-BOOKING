<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control center</title>
</head>

<body>
<table align="center" vspace="10%" width="90%"  height="400px">
<tr>
<td width="30%"  height="400px">
<form action="allview.php" name="all"  method="post">
Location District:<br>
<select name="district">

<option value="">Select..&nbsp;</option>
<option value="trivandrum">Trivandrum</option>
<option value="kollam">Kollam</option>
<option value="pathanamthitta">Pathanamthitta</option>
<option value="alapuzha">Alapuzha</option>
<option value="kottayam">Kottayam</option>
<option value="idukki">Idukki</option>
<option value="ernakulam">Ernakulam</option>
<option value="thrissur">Thrissur</option>
<option value="palakkad">Palakkad</option>
<option value="malappuram">Malappuram</option>
<option value="kozhikode">Kozhikode</option>
<option value="wayanad">Wayanad</option>
<option value="kannur">Kannur</option>
<option value="kasaragod">Kasaragod</option>


</select><br />
<input type="submit" value="submit" /><br />
</form><br>
</td>
<td width="70%" height="400px">
<div style="overflow:auto; width:100%" >

<?php
mysql_connect("localhost","root","");mysql_select_db("database");
//mysql_connect("localhost","579716_bycinco","namaknamak");mysql_select_db("bycinco_99k_database");
$district=$_REQUEST['district'];
if(!empty($district))
{
$q=mysql_query("SELECT tid FROM theater WHERE district='$district'");
while($r=mysql_fetch_assoc($q))
{
$tid[]=$r['tid'];	
	
}
if(!$tid){die("<h3>No theater registered from ".$district);}
foreach($tid as $t)
{
	
	$q=mysql_query("SELECT regseats FROM theater WHERE tid='$t'");$treg="";$ttot="";
while($n=mysql_fetch_assoc($q))
{$treg=$n['regseats'];	
	}
	
	$q=mysql_query("SELECT totalseats FROM theater WHERE tid='$t'");
while($n=mysql_fetch_assoc($q))
{$ttot=$n['totalseats'];	
	}
$q=mysql_query("SELECT name FROM theater WHERE tid='$t'");
while($n=mysql_fetch_assoc($q))
{$tname=$n['name'];	
	}

$q=mysql_query("SELECT DISTINCT date FROM $t");
	$date="";
	echo "<strong><h2>".$tname."</h2></strong>";
	while($d=mysql_fetch_assoc($q))
{$date[]=$d['date'];}
	foreach($date as $dd)
	{echo "Date:&nbsp;".$dd."<hr><br>";
		$q=mysql_query("SELECT DISTINCT showno FROM $t WHERE date='$dd' ORDER BY showno DESC");
		$sho="";
		while($s=mysql_fetch_assoc($q))
			{$sho[]=$s['showno'];}
		$sn="";					
		foreach($sho as $sn)
		{/*	if($sn=="two"){ $sn="one";}
		if($sn=="three") {$sn="two";}
		if($sn=="one") {$sn="three";}
		*/
		$thiscost="";
		
		$q=mysql_query("SELECT code FROM $t WHERE date='$dd' AND showno='$sn'");
		$cd="";
		while($c=mysql_fetch_assoc($q))
		{$cd[]=$c['code'];}
		$cdd='';
		foreach($cd as $cdd)
		{
		$pieces=explode("#",$cdd);
		if(empty($pieces))
		{$pieces=explode("z",$cdd);}
		$thiscost=$thiscost+($pieces[1]*$pieces[2]);
	
		}
		$q=mysql_query("SELECT reg FROM fseat WHERE date='$dd' AND showno='$sn'");
		$donereg=0;$donedirect=0;$ttreg=0;$tttot=0;
		while($z=mysql_fetch_assoc($q))
		{$donereg=$z['reg'];}
		$ttreg=$treg-$donereg;	
		$q=mysql_query("SELECT direct FROM fseat WHERE date='$dd' AND showno='$sn'");
		while($z=mysql_fetch_assoc($q))
		{$donedirect=$z['direct'];}
		
		$tttot=$ttot-$donedirect;
		echo "<table border='1'><tr><td align='center' width='100px'>Showno:&nbsp;".$sn."</td><td align='center' width='200px'> Total Amount recieved&nbsp;:&nbsp;".$thiscost."<br></td><td width='250px'>Tickets sold&nbsp;>>&nbsp;&nbsp;Regn:&nbsp;".$ttreg."&nbsp;||&nbsp;Direct:&nbsp;".$tttot."</td></tr></table>";
		
		}
		
		echo "<br><br>";}
	
	}



}
?></div>
</td></tr></table>
</body>
<!--
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
-->
</html>
