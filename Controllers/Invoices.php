<?php  
	
	class Invoices extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function invoices(){
			
			$temp = '{
				"page_id": 11,
				"page_title": "Facturas",
				"page_subtitle": "Administra tus facturas",
				"page_tag": "Facturas",
				"page_name": "invoices"
			}';

			$data = json_decode($temp);

			$this->views->getView($this, 'invoices', $data);
		}

		
	}