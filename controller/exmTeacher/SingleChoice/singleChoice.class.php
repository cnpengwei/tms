<?php
	/**
	* 
	*/
	class singleChoice 
	{
		private $id;
		private $qus_no;
		private $qus_desc;

		public function getId(){
			return $this->id;
		}
		
		public function getQus_no(){
			return $this->qus_no;
		}

		public function getQus_desc(){
			return $this->qus_desc;
		}

		public function setQus_desc($qus_desc){
			$this->qus_desc=$qus_desc;
		}
		function __construct(argument)
		{
			# code...
		}
	}
?>