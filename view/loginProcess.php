<?php

$uid = $_POST['loginId'];
$pwd = $_POST['userPwd'];

if($uid="admin" && $pwd="admin"){
	header("Location: stuManage.php");
}else{
	header("Location: login.php");
}

?>