<?php
session_start();
$_SESSION['is_login']='';
session_destroy();//销毁session文件；
header("location:../login.php");//跳转到登陆页面
?>