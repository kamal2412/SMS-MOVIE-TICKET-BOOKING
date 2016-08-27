<?php
$unset=time()-86400;
setcookie("mid","",$unset);
setcookie("username","",$unset);
setcookie("fullname","",$unset);
header("Location:index.php");
?>