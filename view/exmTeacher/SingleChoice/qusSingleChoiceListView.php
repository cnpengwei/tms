<?php
	echo "<h1>单项选择题管理</h1>";

	echo "<a href='qusSingleChoiceAddView.php'>添加单项选择题</a><hr/>";

	header("content-type:text/html;charset=utf-8");

$con=mysql_connect("localhost","root","");
if(!$con){
	die("connect fail");
}

mysql_select_db("tms", $con);
$sql="select * from tb_qus_single_choice";
mysql_query('set names utf8', $con);
$res=mysql_query($sql, $con);

echo "<table border=1>";
echo "<tr><td>id</td><td>题号</td><td>题目描述</td><td>查看详情</td><td>修改题目</td><td>删除题目</td></tr>";
while($row=mysql_fetch_assoc($res)){
	$str_table=  '<tr>';
	$str_table.= '<td>'.$row['id'].'</td>';
	$str_table.= '<td>'.$row['single_choice_qus_no'].'</td>';
	$str_table.= '<td>'.$row['single_choice_qus_desc'].'</td>';
	$str_table.= '<td><a href="showSingleChoiceView.php?id='.$row['id'].'">查看详情</a></td>';
	$str_table.= '<td><a href="modiSingleChoiceView.php?id='.$row['id'].'">修改题目</a></td>';
	$str_table.= '<td><a href="deleSingleChoiceView.php?id='.$row['id'].'">删除题目</a></td>';
	$str_table.= '</tr>';
	echo $str_table;
}
echo "</table>";
