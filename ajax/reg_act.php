
<?php
		date_default_timezone_set (PRC);//PRC  Asia/Shanghai

		$con = mysql_connect("localhost","root","");
		if (!$con) {
			day_log(mysql_error());
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("tms", $con);		
		$email = $_POST["email"];// $_SERVER["QUERY_STRING"]; //$_REQUEST["email"]; //$_GET["age"] $_REQUEST["name"]
		$uname = $_POST["uname"];
		$paswd = md5($_POST["paswd"]);
		
		//$sql = "INSERT INTO tb_common_member (email, password, username) VALUES ('a', 'b', 'c')";
		$sql = "INSERT INTO tb_common_member (email, password, username) VALUES ('$email', '$paswd', '$uname')";

		if (!mysql_query($sql, $con)) {
			day_log(mysql_error());
			die('Error: ' . mysql_error());
		}
		
		mysql_close($con);		

		function day_log($msg){
				$time_stmp = date('[Y-m-d H:i:s]');
				$date_stmp = date('Y-m-d');
				file_put_contents($date_stmp.".log", $time_stmp.$msg."\r\n", FILE_APPEND);
		}




		//获取域名或主机地址 
		// echo $_SERVER['HTTP_HOST']."<br>"; #localhost

		//获取网页地址 
		// echo $_SERVER['PHP_SELF']."<br>"; #/blog/testurl.php


		//获取网址参数 
		//echo $_SERVER["QUERY_STRING"]."<br>"; #id=5 //email=[object%20Object]&paswd=[object%20Object]&uname=[object%20Object]

		//获取用户代理 
		//echo $_SERVER['HTTP_REFERER']."<br>"; 
		
		//获取完整的url
		// echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		// echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		#http://localhost/blog/testurl.php?id=5

		//包含端口号的完整url
		// echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]; 
		#http://localhost:80/blog/testurl.php?id=5

		//只取路径
		// $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
		// echo dirname($url);
		
		// echo $_SERVER['DOCUMENT_ROOT']."<br>"; //获得服务器文档根变量
		// echo $_SERVER['PHP_SELF']."<br>"; //获得执行该代码的文件服务器绝对路径的变量
		// echo __FILE__."<br>"; //获得文件的文件系统绝对路径的变量
		// echo dirname(__FILE__); //获得文件所在的文件夹路径的函数


		//STR_TO_DATE('" + str_dt_timerev + "', '%Y%m%d%k%i%s') 
		//DATE_FORMAT( '1997-3-04 8:23:4', '%Y%m%d%H%i%s' )


		// {
		// $sql_page=”select * from user order by id desc”;
		// $page_res=mysql_query($sql_page);
		// while ($arr=mysql_fetch_array($page_res)){
		//  $ajax_arr['page_content'].=’id:’.$arr['id'].’<br>user:’.$arr['user'].’<br><hr>’;
		// }
?>