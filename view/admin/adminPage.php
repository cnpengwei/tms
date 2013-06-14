<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>管理员页面</title>
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
<a href="stuManage/stuList.php" >管理学生</a>
<a href="stuManage/stuAdd.php" >添加学生</a>
<a href="teaManage/teaList.php" >管理教师</a>
<a href="teaManage/teaAdd.php" >添加教师</a>
<a href="exit.php" >安全退出</a>
</body>
</html>