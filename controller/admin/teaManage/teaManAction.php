<?php
header("content-type:text/html;charset=utf-8");
require_once('../../class.common.inc.php');
date_default_timezone_set('PRC');

$oper=$_POST['oper'];

if($oper==="add"){
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


	$sqlHelper = new SqlHelper();
	$con = $sqlHelper->conn;
	if (!$con) {
		$sqlHelper->day_log("teaManage.php".mysql_error());
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("tms", $con) or $sqlHelper->day_log("use db tms err:".mysql_error());
	mysql_query('set names utf8', $con) 
		or $sqlHelper->day_log("setup_db_code fail: ".mysql_error()) && die('Err:'.mysql_error());
	
	$sql="INSERT INTO `tb_teacher`";
	$sql.="(`TEA_NO`, `TEA_NAME`, `TEA_PASSWORD`, `TEA_GENDER`, `TEA_EMAIL`, `TEA_PHONE`, ";
	$sql.="`TEA_STAT`,`TEA_MAIL_STAT`, `TEA_AVATAR_STAT`, `TEA_DEP`, `TEA_INS`)";
	$sql.="VALUES";
	$sql.="('$tea_no', '$tea_name','$tea_password', '$tea_gender', '$tea_email','$tea_phone', ";
	$sql.=" '$tea_status', '0', '$tea_avatarstatus', '$tea_department','$tea_insti')";
	
	if($sqlHelper->execute_dml($sql)==1){
		echo "<br/>教师-添加成功....<a href='../../../view/admin/teaManage/teaManage.php'>查看最新</a>";	
	}else{
		echo "failed, pls note!";
	}

	mysql_close($con);		
}
//-----------------------------------------------------------------------------------------------

?>
