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


<div id="container">
用户名: <input type="textbox" id="txt_name" /><br/>
密&nbsp;&nbsp;&nbsp;&nbsp;码: <input type="textbox" id="txt_upwd" /><br/>
<input type="button" id="btn_login" name="btn_login" value="登录" /> &nbsp;&nbsp; 
<a href="#" id="fetch_upwd">忘记密码</a>

	</div>




</body>
</html>
