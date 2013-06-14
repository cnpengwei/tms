<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>单项选择题信息</title>

	<style type="text/css">
	#content{
		position: absolute;
		top:50%;
		left: 50%;
		width: 900px;
		height: 600px;
		margin:-100px 0 0 -450px;
	}
	</style>
</head>
<body>
<form action="../../../controller/exmTeacher/SingleChoice/qusSingleChoiceAction.php" method="POST">
	<h1>删除该单项选择题:</h1><a href='singleChoiceListView.php'>返回</a>
	<?php	

	header("content-type:text/html;charset=utf-8");

	$id=intval($_GET['id']);

	$con=mysql_connect("localhost","root","");
	if(!$con){
		die("connect fail");
	}

	mysql_select_db("tms", $con);
	$sql="SELECT `ID`, `SINGLE_CHOICE_QUS_NO`, `SINGLE_CHOICE_QUS_DESC`, `SINGLE_CHOICE_ITEMA`, `SINGLE_CHOICE_ITEMB`,";
	$sql.=" `SINGLE_CHOICE_ITEMC`, `SINGLE_CHOICE_ITEMD`, `SINGLE_CHOICE_ANSWER`, `SINGLE_CHOICE_OWNER`, ";
	$sql.=" `SINGLE_CHOICE_COURSE_NO`, `CREATE_TIME` FROM `tb_qus_sin_choice` WHERE ID = $id";
	mysql_query('set names utf8', $con);
	$res=mysql_query($sql, $con);
	if($row=mysql_fetch_assoc($res)){
		header("content-type:text/html;charset=utf-8");
		echo "<head><meta http-equiv='content-type' content='text/html;charset=utf-8'/></head>";
		echo "<table border='1px' bordercolor='#000' cellspacing='0' width=400px height=200px>";
		echo "<th>题目详细信息</th>";
		echo "<tr><td>课程编号:{$row['SINGLE_CHOICE_COURSE_NO']}</td></tr>";
		echo "<tr><td>题目编号:{$row['SINGLE_CHOICE_QUS_NO']}</td></tr>";
		echo "<tr><td>题目描述:{$row['SINGLE_CHOICE_QUS_DESC']}</td></tr>";
		echo "<tr><td>选项A:{$row['SINGLE_CHOICE_ITEMA']}</td></tr>";
		echo "<tr><td>选项B:{$row['SINGLE_CHOICE_ITEMB']}</td></tr>";
		echo "<tr><td>选项C:{$row['SINGLE_CHOICE_ITEMC']}</td></tr>";
		echo "<tr><td>选项D:{$row['SINGLE_CHOICE_ITEMD']}</td></tr>";
		echo "<tr><td>答案:{$row['SINGLE_CHOICE_ANSWER']}</td></tr>";		
		echo "<tr><td>出题者:{$row['SINGLE_CHOICE_OWNER']}</td></tr>";
		echo "<tr><td align='right'><input type='submit' name='btnSubmit' value='确认删除'/></td></tr>";
		echo "</table>";
	}
?>

<input type='hidden' name='oper' value='del'>

</form>
</body>
</html>