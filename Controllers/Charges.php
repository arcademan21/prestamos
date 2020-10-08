<?php  
	
	class Charges extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function charges(){
			
			$temp = '{
				"page_id": 5,
				"page_title": "Abonos",
				"page_subtitle": "Abona el dinero de tus clientes",
				"page_tag": "Realizar un abono",
				"page_name": "charges"
			}';

			$data = json_decode($temp);
			$allData = $this->getClients();


			$data = array(
				'info' => $data, 
				'data' => $allData
			);

			$this->views->getView($this, 'charges', $data);
		}

		public function getClients(){
			return $this->model->getClients();
		}

		
	}