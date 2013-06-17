<?php

$uid = $_POST['loginId'];
$pwd = md5(trim($_POST['userPwd']));
$rol = "";//$_POST['role_select'];//1 admin 2. teacher 3. student
$chk = $_POST['checkCode'];

session_start();
if ($chk!=$_SESSION['myCheckCode']){
	header("Location:login.php?errno=2");
	exit();
}

if(empty($_POST['keep'])){
	if(!empty($_COOKIE['uid'])){
		setcookie("uid",$id,time()-100);
	}
}else{
	setcookie("uid",$id, time()+7*2*24*3600);
}

date_default_timezone_set('PRC');
$con = mysql_connect("localhost","root","");
if (!$con) {
	day_log(mysql_error());
	die('Could not connect: ' . mysql_error());
}
mysql_query('set names utf8', $con) or day_log("setup_db_code fail: ".mysql_error());
mysql_select_db("tms", $con) or day_log("use db tms err:".mysql_error());

$sql="";
$sql="select stu_password, stu_name from tb_student where stu_no = '$uid'";
$res=mysql_query($sql,$con);
$row=mysql_fetch_row($res);//每个结果的列储存在一个数组的单元中，偏移量从 0 开始。 
if(!empty($row) && $pwd==$row[0]){//student
	//Loged as admin
	$rol=3;		
	$uname = $row[1]; //column index, instead of column name, not like mysql_fetch_assoc
	//here can write cookie, then get it out in other page, but this cookie maybe modified by invalid user...
	session_start();
	$_SESSION['user_name']=$uname;
	$_SESSION['user_id']=$uid;
	header("Location:exmStudent/examTaken.php?name=$uname&role=$rol");
	exit();
}else{
	$sql="select tea_password, tea_name from tb_teacher where tea_no = '$uid'";
	$res=mysql_query($sql);
	$row=mysql_fetch_row($res);
	if(!empty($row) && $pwd==$row[0]){//teacher
		$rol=2;
		$uname = $row[1];
		session_start();
		$_SESSION['user_name']=$uname;
		$_SESSION['user_id']=$uid;
		header("Location:exmTeacher/questionManageView.php?name=$uname&role=$rol");
		exit();
	}else{
		$sql="select admin_password, admin_name from tb_admin where admin_no='$uid'";
		$res=mysql_query($sql, $con);
		$row=mysql_fetch_row($res);
		if(!empty($row) && $pwd==$row[0]){//Admin
			$rol=1;
			$uname = $row[1];
			session_start();
			$_SESSION['user_name']=$uname;
			$_SESSION['user_id']=$uid;
			header("Location:admin/adminPage.php?name=$uname&role=$rol");
			exit();
		}else{
			//TODO ....非法用户
			header("Location:login.php?errno=1");
			exit();
		}	
	}
}

function day_log($msg){
		$time_stmp = date('[Y-m-d H:i:s]');
		$date_stmp = date('Y-m-d');
		file_put_contents($date_stmp.".log", $time_stmp.$msg."\r\n", FILE_APPEND);
}


/*
mysql_fetch_assoc($res)
//从结果集中取得一行作为关联数组
//返回根据从结果集取得的行生成的关联数组，如果没有更多行，则返回 false
//本函数返回的字段名是区分大小写的

mysql_free_result($res);
mysql_close($con);
*/

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