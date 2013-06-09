<?php
header("content-type:text/html;charset=utf-8");
$con=mysql_connect("localhost","root","");
if(!$con){
	die("connect fail");
}

mysql_select_db("tms", $con);
$sql="select * from tb_student";
mysql_query('set names utf8', $con);
$res=mysql_query($sql, $con);

echo "<h1>学生列表</h1>";
echo "<a href='stuAdd.php'>添加学生</a><hr/>";
echo "<table>";
echo "<tr><td>id</td><td>学号</td><td>姓名</td><td>查看详情</td><td>修改信息</td></tr>";
while($row=mysql_fetch_assoc($res)){
	$str_table=  '<tr>';
	$str_table.= '<td>'.$row['id'].'</td><td>'.$row['stu_no'].'</td><td>'.$row['stu_name'].'</td>';
	$str_table.= '<td><a href="showStu.php?id='.$row['id'].'">查看详情</a></td>';
	$str_table.= '<td><a href="modiStu.php?id='.$row['id'].'">修改信息</a></td>';
	$str_table.= '</tr>';
	echo $str_table;
}
echo "</table>";

