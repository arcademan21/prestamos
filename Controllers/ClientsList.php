<?php  
	
	class ClientsList extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function clientslist(){

			$clientslist = $this->getListOfClients();
			
			$temp = '{
				"page_id": 8,
				"page_title": "Lista de clientes",
				"page_subtitle": "Administra tus clientes",
				"page_tag": "Lista de clientes",
				"page_name": "clientslist"
			}';

			$temp = json_decode($temp);
			$data = array(
				'info' => $temp, 
				'clients' => $clientslist
			);
			
			$this->views->getView($this, 'clientslist', $data);
		}

		public function getListOfClients(){
			return $this->model->getListOfClients();
		}

		
	}