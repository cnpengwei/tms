<?php

$con=mysql_connect("localhost","root","");
if(!$con){
	die("connect fail");
}

mysql_select_db("tms", $con);
$sql="select * from tb_student";
$res=mysql_query($sql, $con);

header("content-type:text/html;charset=utf-8");
echo "<h1>学生列表</h1>";
echo "<a href='stuAdd.php'>添加学生</a><hr/>";
echo "<table>";
echo "<tr><td>id</td><td>学号</td><td>姓名</td><td>查看详情</td><td>修改信息</td></tr>";
while($row=mysql_fetch_assoc($res)){
	echo '<tr><td>'.$row['id'].'</td><td>'.$row['stu_no'].'</td><td><a href="showStu.php?id='.$row['id'].'">查看详情</a></td><td><a href="#">修改信息</a></td></tr>';
}
echo "</table>";

