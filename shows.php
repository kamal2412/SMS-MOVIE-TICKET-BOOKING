<?php $id=$_POST['idss'];
$date=$_POST['date'];

mysql_connect("localhost","root","");mysql_select_db("database");
function cleanme($v)
{
$v = mysql_real_escape_string($v);
$v=strip_tags($v);
$v = trim($v);

return($v);
}	

$id=cleanme($id);
$date=cleanme($date);
$shows=array('one','two','three','four','five');
$i=$z=$j=0;
if(!empty($date)&&!empty($id))
{
	
$query=mysql_query("SELECT tid FROM theater WHERE  id='$id'");
while($m=mysql_fetch_assoc($query))
{$tid=$m['tid'];}
$tid=$tid."_2";
$query=mysql_query("SELECT remaining FROM $tid WHERE  date='$date' ORDER BY showno ASC");

 while($mm=mysql_fetch_assoc($query))
{
$showremain[$i]=$mm['remaining'];
++$i; 
}
while($shows[$j])
{
$query=mysql_query("SELECT $shows[$j] FROM theater where id='$id'");
 while($mmm=mysql_fetch_assoc($query))
{$movie[$j]='/'.$mmm[$shows[$j]];
}
++$j;
}

 while($z<5)
  {echo $showremain[$z].$movie[$z]."@";++$z;}
}

?>