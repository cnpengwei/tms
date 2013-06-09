
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
	p{
		margin:0;
	}
	</style>
</head>
<body>
<form  action="loginProcess.php" method="POST">
	<div id="container">	
		<h1>请登录</h1>	
		用户名: <input type="textbox" name="loginId" /><br/>
		<br/>		 
		密&nbsp;&nbsp;码: <input type="password" name="userPwd" /><br/>
		验证码: <input type="text" name="checkCode"><img src="checkCode.php" onclick="this.src='checkCode.php?a='+Math.random()" /> <br />
		保存一周<input type="checkbox" name="keep" />
	<p>
		<input type="submit" value="用户登录" /> &nbsp;&nbsp; 
		<input type="reset" value="重新填写"/>
	</p>
	
	<?php		
		if(isset($_GET['errno'])) {			
			 if(!empty($_GET['errno'])) {
				$errno=$_GET['errno'];
				if($errno == 1) {
					echo "<font color='red' size='3'>用户名或密码错误 </font>";	
				}else if($errno == 2){
					echo "<font color='red' size='3'>验证码错误 </font>";
				}
			 }
						
		}
	?>

	</div>
</form>

</body>
</html>
