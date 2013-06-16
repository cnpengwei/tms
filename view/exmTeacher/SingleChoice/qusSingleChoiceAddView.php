<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>单项选择题信息-添加</title>

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
	<h1>单项选择题信息:</h1>
<table>
	<tr>
		<td align="right">题目编号:</td>
		<td><input type="text" name="qusNo" /></td>
	</tr>
	<tr>
		<td align="right">题目描述:</td>
		<td>
			<textarea cols="15" rows="8" name="qusDesc"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">A:</td>
		<td><input type="text" name="qusItemA" /></td>
	</tr>
	<tr>
		<td align="right">B:</td>
		<td><input type="text" name="qusItemB" /></td>
	</tr>
	<tr>
		<td align="right">C:</td>
		<td><input type="text" name="qusItemC" /></td>
	</tr>
	<tr>
		<td align="right">D:</td>
		<td><input type="text" name="qusItemD" /></td>
	</tr>
		<tr>
		<td align="right">Answer:</td>
		<td><input type="text" name="answer" /></td>
	</tr>
</table>
&nbsp;&nbsp; 
		<input type="reset" value="重新填写"/>&nbsp;&nbsp;
<input type="submit" name="btnSubmit" value="提交"/>

<input type='hidden' name='oper' value='add'>

	
	
</form>
</body>
</html>
