<?php  
	
	class BorrowMoney extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function borrowmoney(){
			
			$temp = '{
				"page_id": 4,
				"page_title": "Borrow money",
				"page_subtitle": "Realiza prestamos",
				"page_tag": "Prestar",
				"page_name": "borrowmoney"
			}';

			$data = json_decode($temp);
			$allData = $this->getClients();


			$data = array(
				'info' => $data, 
				'data' => $allData
			);

			$this->views->getView($this, 'borrowmoney', $data);
		}

		public function getClients(){
			return $this->model->getClients();
		}

		
	}