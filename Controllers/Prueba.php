<?php  
	
	class Prueba extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function prueba(){
			
			$temp = '{
				"page_id": 13,
				"page_title": "Prueba",
				"page_subtitle": "Esto es una prueba",
				"page_tag": "Prueba",
				"page_name": "prueba"
			}';

			$data = json_decode($temp);

			$this->views->getView($this, 'prueba', $data);
		}

		

		
	}