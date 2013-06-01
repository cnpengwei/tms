<?php

$uid = $_POST['loginId'];
$pwd = md5(trim($_POST['userPwd']));
$rol = $_POST['role_select'];//1 admin 2. teacher 3. student


date_default_timezone_set('PRC');
$con = mysql_connect("localhost","root","");
if (!$con) {
	day_log(mysql_error());
	die('Could not connect: ' . mysql_error());
}
mysql_query('set names utf8', $con) or day_log("setup_db_code fail: ".mysql_error());
mysql_select_db("tms", $con) or day_log("use db tms err:".mysql_error());

$sql="";
if($rol == "1"){
	$sql="select admin_password from tb_admin where admin_no='$uid'";
}elseif($rol == "2"){
	$sql="select tea_password from tb_teacher where tea_no = '$uid'";	
}elseif($rol == "3"){
	$sql="select stu_password from tb_student where stu_no = '$uid'";
}

$res=mysql_query($sql,$con);
//从结果集中取得一行作为关联数组
//返回根据从结果集取得的行生成的关联数组，如果没有更多行，则返回 false
//本函数返回的字段名是区分大小写的
if($row=mysql_fetch_assoc($res)){
	if($rol == "1"){//1. admin
		if($row['admin_password'] == $pwd){
			day_log("admin ".$uid." login");
			header("Location:stuManage.php");
			exit();	
		}else{
			header("Location:login.php?errno=1");
			exit();
		}
	}elseif ($rol == "2") {//2. teacher
		if($row['tea_password'] == $pwd){
			day_log("teacher ".$uid. " login");
			header("Location:questionManage.php");
			exit();
		}else{
			header("Location:login.php?errno=1");
			exit();
		}

	}elseif($rol == "3") {//3. student
		if($row['stu_password'] == $pwd){
			day_log("student ".$uid." login");
			header("Location:examTaken.php");
			exit();
		}else{
			header("Location:login.php?errno=1");
			exit();
		}
	}
}else{
	//用户名或密码错
	header("Location:login.php?errno=1");
	exit();
}

mysql_free_result($res);
mysql_close($con);

function day_log($msg){
		$time_stmp = date('[Y-m-d H:i:s]');
		$date_stmp = date('Y-m-d');
		file_put_contents($date_stmp.".log", $time_stmp.$msg."\r\n", FILE_APPEND);
}


/*
$admin_name="admin";
$admin_password=md5("admin");
date_default_timezone_set('PRC');
$con = mysql_connect("localhost","root","");
if (!$con) {
	day_log(mysql_error());
	die('Could not connect: ' . mysql_error());
}
mysql_query('set names utf8', $con) or day_log("setup_db_code fail: ".mysql_error());
mysql_select_db("tms", $con) or day_log("use db tms err:".mysql_error());
$sql="INSERT INTO `tb_admin`";
$sql.=" (`admin_no`, `admin_name`, `admin_password`)";
$sql.=" VALUES";
$sql.="('001','$admin_name','$admin_password')";

if (!mysql_query($sql, $con)) {
	day_log(mysql_error());
	die('Error: ' . mysql_error());
}

mysql_close($con);	

*/

?>