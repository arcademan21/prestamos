<?php  
	
	class Login extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function login(){
			
			$temp = '{
				"page_id": 21,
				"page_title": "Login",
				"page_subtitle": "Inicio de sesion",
				"page_tag": "Login",
				"page_name": "login"
			}';

			$data = json_decode($temp);

			$this->views->getView($this, 'login', $data);
		}

		
	}