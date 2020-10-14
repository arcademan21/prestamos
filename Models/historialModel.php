<?php  

	class historialModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}

		public function getAllData(){

			//OBTIENE TOTAL CLIENTES
			/*---------------------------------*/
			$data = [];

			$query = '
				SELECT *
				FROM historial
			';

			$request = $this->select_all($query);
			$data['alldata'] = $request;
			/*---------------------------------*/

			return $data;
			
		}
	}