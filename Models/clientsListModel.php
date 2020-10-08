<?php  

	class clientsListModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}

		public function getListOfClients(){

			$query = 'SELECT * FROM customers';
			$request = $this->select_all($query);

			return $request;
		}

	}