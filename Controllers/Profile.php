<?php  
	
	class Profile extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function profile(){
			
			$temp = '{
				"page_id": 20,
				"page_title": "Perfil",
				"page_subtitle": "Visualize perfil",
				"page_tag": "Perfil",
				"page_name": "profile"
			}';



			$data = '{
				"info": '.$temp.',
				"data": '.$this->getDataOfProfile().'
			}';

			$this->views->getView($this, 'profile', json_decode($data));
		}

		public function getDataOfProfile(){
			return $this->model->getDataOfProfile();
		}

		
	}