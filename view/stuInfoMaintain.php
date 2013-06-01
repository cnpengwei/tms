<?php


date_default_timezone_set('PRC');
$con = mysql_connect("localhost","root","");
if (!$con) {
	day_log(mysql_error());
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("tms", $con);

$stu_no = $_POST['stu_no'];
$stu_name=$_POST['stu_name'];
$stu_gender=$_POST['stu_gender'];
$stu_email=$_POST['stu_email'];
$stu_phone=$_POST['stu_phone'];
$stu_status=$_POST['stu_status'];
$stu_avatarstatus = $_POST['stu_avatarstatus'];
$stu_class=$_POST['stu_class'];
$stu_grade=$_POST['stu_grade'];
$stu_insti=$_POST['stu_insti'];
$stu_admin=$_POST['stu_admin'];

$sql="INSERT INTO `tb_student`(`stu_no`, `stu_name`, `stu_gender`, `stu_email`, `stu_phone`, `stu_status`, `stu_emailstatus`, `stu_avatarstatus`, `stu_class`, `stu_grade`, `stu_insti`, `stu_admin`) VALUES ('$stu_no','$stu_name','$stu_gender','$stu_email','$stu_phone','$stu_status','$stu_avatarstatus','$stu_class','$stu_grade','$stu_insti','$stu_insti','$stu_admin')";

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