<?php session_start();
mysql_connect("localhost","root","");mysql_select_db("database");
$district=$_POST['district'];

$district = strip_tags($district);
$district = mysql_real_escape_string($district);
$district = trim($district);
if(!empty($district))
		  {
$query=mysql_query("SELECT name,uptodate FROM theater WHERE district='$district'");
$count=mysql_num_rows($query);
$theater='';
 
while($v=mysql_fetch_assoc($query))
{
$theater=$v['name'].'@'.$theater;
 
}
 
$theater=$count.'@'.$theater;
echo $theater;
		  }
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
