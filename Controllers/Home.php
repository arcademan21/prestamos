<?php  
	
	class Home extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function home(){
			
			$temp = '{
				"page_id": 1,
				"page_title": "Home",
				"page_tag": "Init page",
				"page_name": "home"
			}';

			$data = json_decode($temp);

			$this->views->getView($this, 'home', $data);
		}

		
	}