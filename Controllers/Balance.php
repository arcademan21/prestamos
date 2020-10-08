<?php  
	
	class Balance extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function balance(){
			
			$temp = '{
				"page_id": 12,
				"page_title": "Balances",
				"page_subtitle": "Administra el balance de tus prestamos",
				"page_tag": "Balances",
				"page_name": "balance"
			}';

			$data = json_decode($temp);

			$this->views->getView($this, 'balance', $data);
		}

		
	}