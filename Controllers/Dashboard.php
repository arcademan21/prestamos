<?php  
	
	class Dashboard extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function dashboard(){
			
			$temp = '{
				"page_id": 3,
				"page_title": "Inicio",
				"page_subtitle": "Consulta el estado global del negocio",
				"page_tag": "Inicio - Estadisticas",
				"page_name": "dashboard"
			}';

			$data = json_decode($temp);

			
			$saveHistorial = $this->saveHistorial();
			$allData = $this->getAllData();


			$data = array(
				'info' => $data, 
				'data' => $allData
			);


			$this->views->getView($this, 'dashboard', $data);
		}

		public function updateDatabase(){
			return $this->model->updateDatabase();
		}

		public function getAllData(){
			return $this->model->getAllData();
		}

		public function saveHistorial(){
			return $this->model->saveHistorial();
		}

		public function updateGlobalInfo(){
			return $this->model->updateGlobalInfo();
		}



		
	}