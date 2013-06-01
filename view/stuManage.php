<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>student management</title>
	<style type="text/css">
	#content{
		position: absolute;
		top:50%;
		left: 50%;
		width: 900px;
		height: 600px;
		margin:-100px 0 0 -450px;
	}
	.lengend{
		float: left;
		width: 250px;
		margin-top: 140px;
	}
	.skills li{
		float: right;
		clear:both;
		padding: 0 15px;
		height: 35px;
		line-height: 35px;
		color: #fff;
		margin-bottom: 1px;
		font-size: 18px;
		background-color: blue;
	}	
}
</style>
</head>
<body>
<form action="stuInfoMaintain.php" method="POST">
	<h1>学生信息:</h1>
<table>
<tr>
	<td align="right">学号:</td>
	<td><input type="text" name="stu_no" /></td>
</tr>
<tr>
	<td align="right">姓名:</td>
	<td><input type="text" name="stu_name" /></td>
</tr>
<tr>
	<td align="right">性别:</td>
	<td>
		女<input type="radio" name="stu_gender" value="0" onclick="getVote(this.value)">
		男<input type="radio" name="stu_gender" value="1" onclick="getVote(this.value)">		
	</td>
</tr>
<tr>
	<td align="right">邮箱:</td>
	<td><input type="text" name="stu_email" /></td>
</tr>
<tr>
	<td align="right">电话:</td>
	<td><input type="text" name="stu_phone" /></td>
</tr>
<tr>
	<td align="right">状态:</td>
	<td><input type="text" name="stu_status" /></td>
</tr>
<tr>
	<td align="right">头像:</td>
	<td><input type="text" name="stu_avatarstatus" /></td>
</tr>
<tr>
	<td align="right">班级:</td>
	<td><input type="text" name="stu_class" /></td>
</tr>
<tr>
	<td align="right">年级:</td>
	<td><input type="text" name="stu_grade" /></td>
</tr>
<tr>
	<td align="right">学院:</td>
	<td><input type="text" name="stu_insti" /></td>
</tr>
<tr>
	<td align="right">班主任:</td>
	<td><input type="text" name="stu_admin" /></td>
</tr>

</table>
&nbsp;&nbsp; 
		<input type="reset" value="重新填写"/>&nbsp;&nbsp;
<input type="submit" name="btnSubmit" value="提交"/>

</form>

</body>
</html>
