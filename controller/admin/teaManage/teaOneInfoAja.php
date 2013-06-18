<?php
	header("content-type:text/html;charset=utf-8");
	require_once('../../class.common.inc.php');
	date_default_timezone_set('PRC');

	$id=$_GET["q"];
	$sqlHelper = new SqlHelper();
	$con=$sqlHelper->conn;

	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("tms", $con);
	mysql_query('set names utf8', $con) or $sqlHelper->day_log("setup_db_code fail: ".mysql_error());

	$sql="SELECT * FROM tb_teacher WHERE id = '$id'";

	$res = mysql_query($sql);

	
	$tbl_head="<table border='1' bordercolor='green' cellspacing='0'><tr>";
	$tbl_head.="<th>教工编号</th><th>姓名</th><th>电话</th><th>所在系</th><th>所属学院</th>";
	$tbl_head.="</tr>";
	echo $tbl_head;
	while($row = mysql_fetch_array($res)) {
		$str_tbl="";	
		$str_tbl.="<tr>";
		$str_tbl.="<td>" . $row['TEA_NO'] . "</td>";
		$str_tbl.="<td>" . $row['TEA_NAME'] . "</td>";
		$str_tbl.="<td>" . $row['TEA_PHONE'] . "</td>";
		$str_tbl.="<td>" . $row['TEA_DEP'] . "</td>";
		$str_tbl.="<td>" . $row['TEA_INS'] . "</td>";
		$str_tbl.="</tr>";
		echo $str_tbl;
	}
	echo "</table>";

	mysql_close($con);//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>