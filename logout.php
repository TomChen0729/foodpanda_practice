<?php
include("connect.php");
session_start();
//session_destroy();
unset($_SESSION['loggedin']);
$_SESSION['useremail']="";
$_SESSION['password']="";
$_SESSION['lastname']="";
$_SESSION['firstname']="";
header('Location: index.php'); // 重定向到登入頁面
exit;
?>
