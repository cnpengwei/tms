<?php

	function day_log($msg){
			$time_stmp = date('[Y-m-d H:i:s]');
			$date_stmp = date('Y-m-d');
			file_put_contents($date_stmp.".log", $time_stmp.$msg."\r\n", FILE_APPEND);
	}