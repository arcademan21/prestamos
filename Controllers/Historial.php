<?php  
	
	class Historial extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function historial(){
			
			$temp = '{
				"page_id": 30,
				"page_title": "Historial",
				"page_tag": "Historial de movivientos",
				"page_name": "historial"
			}';

			$allData = $this->getAllData();
			$data = array(
				'info'=>json_decode($temp),
				'data'=>$allData
			);


			$this->views->getView($this, 'historial', $data);
		}

		public function getAllData(){
			return $this->model->getAllData();
		}

		
	}