<?php
session_start();
unset($_SESSION['user_id']);

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
?>
