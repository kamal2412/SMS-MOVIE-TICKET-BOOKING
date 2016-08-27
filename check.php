<?php 
$username=$_POST['username'];
mysql_connect("localhost","root","");mysql_select_db("database");
if(!empty($username))
{$all=$username;

$query = mysql_query("SELECT * FROM members WHERE username='$username'");

if(strlen($username)<=4){echo "Invalid. minimum length 5";}
else if(strlen($username)>25){echo " Invalid. maximum length 25";}


else if($rows = mysql_fetch_assoc($query))
{
echo ("Already taken");
}
else { echo "<strong><font color='green'>Valid</font>";}
}

?>