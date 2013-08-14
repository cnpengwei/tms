<?php
	function getLastLoginTime(){
		if(!empty($_COOKIE['lastVisit'])){
			echo "上次登录时间是:".$_COOKIE['lastVisit'];
			setcookie("lastVisit", date("Y-m-d H:i:s"), time()+24*3600*30);
		}else{
			echo "第一次登录";
			setcookie("lastVisit", date("Y-m-d H:i:s"), time()+24*3600*30);
		}
	}
	
	function getCookieVal($key){
		if(!empty($_COOKIE[$key])){
			return $_COOKIE[$key];
		}else{
			return "";
		}


	}
?>