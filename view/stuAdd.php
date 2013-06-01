<!DOCTYPE HTML>
<html>
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
	<td align="right">初始密码(123456):</td>
	<td><input type="text" name="stu_password" /></td>
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
	<td>
		<select name="stu_class">
				<option value="01">01</option>	
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
		</select>	
	</td>
</tr>
<tr>
	<td align="right">年级:</td>
	<td>
		<select name="stu_grade">
				<option value="2009">2009</option>	
				<option value="2010">2010</option>
				<option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
		</select>		
	</td>
</tr>
<tr>
	<td align="right">系别:</td>
	<td><input type="text" name="stu_department" /></td>
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
