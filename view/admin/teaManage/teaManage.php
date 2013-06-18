<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>教工信息</title>
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
<script type="text/javascript" src="../../../js/rawjs.js"></script>
</head>
<body>
	<form action="../../../controller/admin/teaManage/teaManAction.php" method="POST">
	<h1>教师信息:</h1>
	<table>
		<tr>
			<td align="right">教工编号:</td>
			<td><input type="text" name="tea_no" /></td>
		</tr>
		<tr>
			<td align="right">姓名:</td>
			<td><input type="text" name="tea_name" /></td>
		</tr>
		<tr>
			<td align="right">初始密码(123456):</td>
			<td><input type="text" name="tea_password" /></td>
		</tr>
		<tr>
			<td align="right">性别:</td>
			<td>
				女<input type="radio" name="tea_gender" value="0" onclick="getVote(this.value)">
				男<input type="radio" name="tea_gender" value="1" onclick="getVote(this.value)">		
			</td>
		</tr>
		<tr>
			<td align="right">邮箱:</td>
			<td><input type="text" name="tea_email" /></td>
		</tr>
		<tr>
			<td align="right">电话:</td>
			<td><input type="text" name="tea_phone" /></td>
		</tr>
		<tr>
			<td align="right">状态:</td>
			<td><input type="text" name="tea_status" /></td>
		</tr>
		<tr>
			<td align="right">头像:</td>
			<td><input type="text" name="tea_avatarstatus" /></td>
		</tr>
		<tr>
			<td align="right">系别:</td>
			<td><input type="text" name="tea_department" /></td>
		</tr>
		<tr>
			<td align="right">学院:</td>
			<td><input type="text" name="tea_insti" /></td>
		</tr>
	</table>
	
	<input type="reset" value="重新填写"/>&nbsp;&nbsp;
	<input type="submit" name="btnSubmit" value="提交"/>
	<input type='hidden' name='oper' value='add'>
<hr />
请选择:
	<select name="tea" onchange="showTea(this.value)">
		<?php
			require_once("../../../controller/class.common.inc.php"); 
			$sqlHelper = new SqlHelper();
			$con = $sqlHelper->conn;
			if (!$con) {
				$sqlHelper->day_log("teaManage.php".mysql_error());
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("tms", $con) or $sqlHelper->day_log("use db tms err:".mysql_error());
			mysql_query('set names utf8', $con) or $sqlHelper->day_log("setup_db_code fail: ".mysql_error());
			
			$sql="SELECT  `ID`, `TEA_NAME` FROM `tb_teacher`";
			$res=$sqlHelper->execute_dql($sql); //mysql_query($sql,$con);
			$cnt=mysql_num_rows($res);
			for($i=0;$i<$cnt;$i++){
				$cols=mysql_fetch_array($res);
				echo "<option value='$cols[ID]'>$cols[TEA_NAME]";
				echo "</option>";
			}
		?>
	</select>
<hr />
<p>
	<div id="txtHint"><b>Teacher info will be listed here.</b></div>
</p>

</form>
</body>
</html>