<?php

$uid = $_POST['loginId'];
$pwd = $_POST['userPwd'];
$rol = $_POST['role_select'];

echo $rol;

if($uid=="admin" && $pwd=="admin" && $rol == "1"){
	header("Location: stuManage.php");
}else{
	header("Location: login.php");
}

?>