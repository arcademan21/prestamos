<?php  

	class Connection{

		private $connection;

		public function __construct(){

			$options = array(
		        PDO::ATTR_EMULATE_PREPARES => FALSE, 
		        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
		        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
		    );

			$conf = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';'.DB_CHARSET;

			try{
				$this->connection = new PDO($conf, DB_USER, DB_PASSWORD, $options);
				$this->connection->setAttribute(
					PDO::ATTR_ERRMODE, 
					PDO::ERRMODE_EXCEPTION
				);
			}catch(PDOException $e){
				$this->connection = 'Error: connection down';
				echo 'ERROR: '.$e->getMessage();
			}

		}

		public function conect(){
			return $this->connection;
		}
	}