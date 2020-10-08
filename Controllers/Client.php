<?php  
	
	class Client extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function client(){
			$this->code();
		}

		public function code($client_code=''){
			
			$temp = '{
				"page_id": 9,
				"page_title": "Datos del cliente",
				"page_subtitle": "Visualize los detalles de la cuenta.",
				"page_tag": "Datos del cliente",
				"page_name": "client",
				"client_code": "'.$client_code.'"
			}';

			$data = json_decode($temp);

			if(!empty($client_code)){

				$client = $this->getDataOfClient($client_code);
				
				if($client){
					$data = array(
						'info' => $data, 
						'client' => $client
					);
					$this->views->getView($this, 'client', $data);
				}else{

					$this->views->getView($this, 'clientNotFound', $data);
				}
			}else{
				$this->views->getView($this, 'clientNotFound', $data);
			}	
		}

		public function getDataOfClient($client_code){
			return $this->model->getDataOfClient($client_code);
		}

		
	}