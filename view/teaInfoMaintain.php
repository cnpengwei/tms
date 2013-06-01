<?php

$tea_no=$_POST['tea_no'];
$tea_name=$_POST['tea_name'];
$tea_password=md5(trim($_POST['tea_password']));
$tea_gender=$_POST['tea_gender'];
$tea_email=$_POST['tea_email'];
$tea_phone=$_POST['tea_phone'];
$tea_status=$_POST['tea_status'];
// $tea_emailstatus=$_POST['tea_emailstatus'];
$tea_avatarstatus=$_POST['tea_avatarstatus'];
// $tea_level=$_POST['tea_level'];
$tea_department=$_POST['tea_department'];
$tea_insti=$_POST['tea_insti'];

date_default_timezone_set('PRC');
$con = mysql_connect("localhost","root","");
if (!$con) {
	day_log(mysql_error());
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("tms", $con);

$sql="INSERT INTO `tb_teacher`";
$sql.="(`tea_no`, `tea_name`, `tea_password`, `tea_gender`, `tea_email`,`tea_emailstatus`, `tea_phone`, `tea_status`,  `tea_avatarstatus`, ";
$sql.="`tea_department`,`tea_insti`)";
$sql.="VALUES";
$sql.="('$tea_no', '$tea_name','$tea_password', '$tea_gender', '$tea_email','0', '$tea_phone', '$tea_status',  '$tea_avatarstatus', ";
$sql.="'$tea_department','$tea_insti')";  

mysql_query('set names utf8', $con) or day_log("set uft8 on tms err:". mysql_error()) && die('Err:'.mysql_error());
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


?>