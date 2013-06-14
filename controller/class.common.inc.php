<?php

	/**
	* This class for common operation 
	*/
	class clsCommon {
		private $pri_var;
		function __construct() {
			$this->pri_var="original value";
			print 'I am in construct';
		}

		function day_log($msg) {
			$time_stmp = date('[Y-m-d H:i:s]');
			$date_stmp = date('Y-m-d');
			file_put_contents($date_stmp.".log", $time_stmp.$msg."\r\n", FILE_APPEND);
		}

		function inverse($x) {
	    	if (!$x) {
				throw new Exception('Division by zero.');
			}
			else return 1/$x;
		}


	}

	