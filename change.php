<?php session_start();
unset($_SESSION['now']);
header('Location:t_todaysell.php');
?>