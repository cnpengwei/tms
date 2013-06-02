<?php

$id=intval($_GET['id']);
$html_file="html/stu-".$id.".html";


if(file_exists($html_file) ){//&& filemtime($html_file)+30>=time() // time delay not real time ...  
	echo "from html";
	echo file_get_contents($html_file);
	exit;
}

$con=mysql_connect("localhost","root","");
if(!$con){
	die("connect fail");
}

mysql_select_db("tms", $con);
$sql="select * from tb_student where id=$id";
mysql_query('set names utf8', $con);
$res=mysql_query($sql, $con);
//show detailed info of student
if($row=mysql_fetch_assoc($res)){
	ob_start();
	header("content-type:text/html;charset=utf-8");
	echo "<head><meta http-equiv='content-type' content='text/html;charset=utf-8'/></head>";
	echo "<table border='1px' bordercolor='green' cellspacing='0' width=400px height=200px>";
	echo "<tr><td>学生详细信息</td></tr>";
	echo "<tr><td>{$row['stu_no']}</td></tr>";
	echo "<tr><td>{$row['stu_name']}</td></tr>";
	echo "</table>";
	$ob_str=ob_get_contents();
	file_put_contents($html_file, $ob_str);
}


