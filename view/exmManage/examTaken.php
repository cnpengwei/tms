<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>学生考试页面</title>
</head>
<body>
<?php
	$uname = $_GET['name'];
	$role = $_GET['role'];
	switch ($role){
		case 1:
  			$role="管理员";
  		break;  
		case 2:
  			$role="教师";;
  		break;
  		case 3:
  			$role="学生";;
  		break;
  		default:
		  $role="不明身份";	
	}
	
	echo "欢迎 ".$uname." 登录, 您当前的身份是:". $role. " <br/>";	
?>
<input type="button" name="btnExam" value="开始考试" /> &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" name="btnExam" value="开始复习" />

</body>
</html>