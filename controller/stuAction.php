<?php

echo "stuAction";//controller :)

$stu_no = $_POST['stu_no'];
$stu_name=$_POST['stu_name'];
$stu_password=md5(trim($_POST['stu_password']));
$stu_gender=$_POST['stu_gender'];
$stu_email=$_POST['stu_email'];
// $stu_emailstatus=$_POST['stu_emailstatus'];
$stu_phone=$_POST['stu_phone'];
$stu_status=$_POST['stu_status'];
$stu_avatarstatus = $_POST['stu_avatarstatus'];
$stu_class=$_POST['stu_class'];
$stu_grade=$_POST['stu_grade'];
$stu_department=$_POST['stu_department'];
$stu_insti=$_POST['stu_insti'];
$stu_admin=$_POST['stu_admin'];

date_default_timezone_set('PRC');
$con = mysql_connect("localhost","root","");
if (!$con) {
	day_log(mysql_error());
	die('Could not connect: ' . mysql_error());
}

mysql_query('set names utf8', $con) or day_log("setup_db_code fail: ".mysql_error());

mysql_select_db("tms", $con) or day_log("use db tms err:".mysql_error());

$sql="INSERT INTO `tb_student`";
$sql.=" (`stu_no`, `stu_name`, `stu_password`, `stu_gender`, `stu_email`, `stu_emailstatus`, `stu_phone`, `stu_status`, `stu_avatarstatus`, `stu_class`, ";
$sql.="`stu_grade`, `stu_department`,`stu_insti`, `stu_admin`)";
$sql.=" VALUES";
$sql.="('$stu_no','$stu_name','$stu_password','$stu_gender','$stu_email','0','$stu_phone','$stu_status','$stu_avatarstatus','$stu_class',";
$sql.="'$stu_grade', '$stu_department', '$stu_insti','$stu_admin')";

if (!mysql_query($sql, $con)) {
	day_log(mysql_error());
	die('Error: ' . mysql_error());
}

mysql_close($con);		

function day_log($msg){
		$time_stmp = date('[Y-m-d H:i:s]');
		$date_stmp = date('Y-m-d');
		file_put_contents($date_stmp.".log", $time_stmp.$msg."\r\n", FILE_APPEND);
}

