<?php

// echo "modifiy sptudent info";//view :)
// 1. if html file has exist, take the value from the html file, instead of read DB
// 2. update the data into db.
// 3. write the html file at the same time
$id=intval($_GET['id']);
$html_file="html/stu-".$id.".html";


if(file_exists($html_file) ){//&& filemtime($html_file)+30>=time() // time delay not real time ...  
	// echo "from html";
	header("content-type:text/html;charset=utf-8");
	// echo file_get_contents($html_file);
	// exit;
	$html_fp = fopen($html_file,'r');
	

}

// the action of update DB will be moved to controller
$con=mysql_connect("localhost","root","");
if(!$con){
	die("connect fail");
}

mysql_select_db("tms", $con);
$sql='select `id`, `stu_no`, `stu_name`, `stu_password`, `stu_gender`, `stu_email`, `stu_phone`, ';
$sql.=' `stu_status`, `stu_emailstatus`, `stu_avatarstatus`, `stu_class`, `stu_grade`, `stu_department`,';
$sql.=" `stu_insti`, `stu_admin`, `create_time` from tb_student where id=$id";
mysql_query('set names utf8', $con);
$res=mysql_query($sql, $con);
//show detailed info of student
if($row=mysql_fetch_assoc($res)){
	ob_start();
	header("content-type:text/html;charset=utf-8");
	echo "<head><meta http-equiv='content-type' content='text/html;charset=utf-8'/></head>";
	echo "<table border='1px' bordercolor='#000' cellspacing='0' width=400px height=200px>";
	echo "<tr><td>学生详细信息</td></tr>";
	echo "<tr><td>学号:{$row['stu_no']}</td></tr>";
	echo "<tr><td>姓名:{$row['stu_name']}</td></tr>";
	echo "<tr><td>性别:{$row['stu_gender']}</td></tr>";
	echo "<tr><td>邮箱:{$row['stu_email']}</td></tr>";
	echo "<tr><td>电话:{$row['stu_phone']}</td></tr>";
	echo "<tr><td>状态:{$row['stu_status']}</td></tr>";
	echo "<tr><td align='right'><a href='stuList.php'>返回</a></td></tr>";
	echo "</table>";

	$ob_str=ob_get_contents();
	file_put_contents($html_file, $ob_str);
}

