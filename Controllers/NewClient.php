<?php  
	
	class NewClient extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function newclient(){
			$temp = '{
				"page_id": 10,
				"page_title": "Nuevo cliente",
				"page_subtitle": "Registra un nuevo cliente.",
				"page_tag": "Nuevo cliente",
				"page_name": "newclient"
			}';

			$data = json_decode($temp);
			$this->views->getView($this, 'newclient', $data);
		}
	
	}