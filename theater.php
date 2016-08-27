<?php
mysql_connect("localhost","root","");mysql_select_db("database");

$tid=$_POST['tid'];
$regseats=$_POST['regseats'];
$rates=$_POST['rates'];
$password=$_POST['password'];
$name=$_POST['name'];
$district=$_REQUEST['district'];
function cleanme($v)
{
$v = mysql_real_escape_string($v);
$v=strip_tags($v);
$v = trim($v);

return($v);
}	
$tid=cleanme($tid);
$regseats=cleanme($regseats);
$rates=cleanme($rates);
$password=cleanme($password);
$name=cleanme($name);
$district=cleanme($district);

if(!empty($tid)&&!empty($regseats)&&!empty($rates)&&!empty($password)&&!empty($name)&&!empty($district))
{ 
$tid1=$tid."_1";
$tid2=$tid."_2";
mysql_query("CREATE TABLE $tid1
(
 date VARCHAR(30),
 showno VARCHAR(10),
  occup VARCHAR(20),ticket VARCHAR(5),
  username VARCHAR(20),
 code VARCHAR(25)
)");
mysql_query("CREATE TABLE $tid2
(
 date VARCHAR(30),
 showno VARCHAR(10), 
 remaining VARCHAR(5) 
)");
mysql_query("INSERT INTO theater VALUES('','$tid','$password','$name','$district','$regseats','','','','','','$rates','','')");	

die("<br><br><br><br><center><h3> Registered Successfully <a href='t_login.php'>Login to fill further details</a></center>");
}
?>
<html><body><table align="center" width="60%" vspace="10%"><tr><td><form action="theater.php" name="alltheater" method="post">
Theater id:<br><input type="text" name="tid" /><br />
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


</select><br>
Theater name:<br><input type="text" name="name" /><br />
Password:<br><input type="password" name="password" /><br />

No of seats for registration:<br><input type="text" name="regseats" /><br />
Enter ticket rates (eg: 25,30,35)<br>
<input type="text" name="rates"><br>

<input type="submit" value="submit" /><br />
</form></td></tr></table></body></html>