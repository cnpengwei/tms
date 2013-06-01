<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>tms index page</title>
	<style type="text/css">
	body{
		background-color: #eee;
		/*text-align: center;*/
		/*float: center;*/
	}
	/*
	div#wrap{ 
		width: 960px;
		margin: 0 auto;
		top:50%;
		
		border: 1px solid #333;
		background-color: #ccc;
	}
	*/
	div#container{ 
		/*background:#ccc url(stats_name.jpg) repeat-y center; */
		position:absolute; 
		left:50%; 
		top:50%; 
		width:960px;
		/*height:300px;  */
		margin-left:-480px; 

		border: 1px solid #333;
		background-color: #ccc;
	}
	</style>
</head>
<body>

<?php

// var_dump($_POST);

// if(isset($_POST['btn_login'])){
// 	echo "22";
// 	session_start();
// 	if(isset($_POST['usr']) && isset($_POST['pwd'])){		
// 		$_SESSION['usr'] = 'abc';
// 		header("Location:index.php");
// 	}else{
// 		header("Location:login.php");
// 	}
// }

// echo $_POST['role_select'];
?>

<form  action="loginProcess.php" method="POST">
	<div id="container">	
		<h1>请登录</h1>	
		用户名: <input type="textbox" name="loginId" /><br/>
		身&nbsp;&nbsp;份: 
		<label>
			<select name="role_select">				
				<option value="1">管理员</option>
				<option value="2">教师</option>
				<option value="3">学生</option>
			</select>
		</label><br/>		 
		密&nbsp;&nbsp;码: <input type="password" name="userPwd" /><br/>
	<p>
		<input type="submit" value="用户登录" /> &nbsp;&nbsp; 
		<input type="reset" value="重新填写"/>
	</p>
	</div>
</form>
</body>
</html>
