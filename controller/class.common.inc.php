<?php

	/**
	* This class for execute the DB and other local common operation 
	*/
	class SqlHelper {
		public $conn;
		public $dbname="TMS";
		public $username="root";
		public $password="";
		public $host="localhost";

		
		function __construct() {
			$this->conn=mysql_connect($this->host,$this->username,$this->password);
			if(!$this->conn){
				$err_msg="connnect to db err:".mysql_error();
				day_log($err_msg);
				die($err_msg);				
			}
		}

		//DQL
		public function execute_dql($sql){
			$res=mysql_query($sql,$this->conn) or die ("execute query err:".mysql_error());
			return $res;
		}
		
		//DML
		public function execute_dml($sql){
			$b=mysql_query($sql, $this->conn);
			if(!$b){
				return 0;
			}else{
				if(mysql_affected_rows($this->conn)>0){
					return 1; //indicate execute ok
				}else{
					return 2; //indictate no rows affected
				}
			}
		}
		//close db connection
		public function close_connection(){
			if(!empty($this->conn)){
				mysql_close($this->conn);
			}
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