<?php  
	
	class Users extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function users(){
			
			$temp = '{
				"page_id": 2,
				"page_title": "Users",
				"page_tag": "Users page",
				"page_name": "users"
			}';

			$data = json_decode($temp);

			$this->views->getView($this, 'users', $data);
		}

		public function insert($data){
			$data = $this->model->addUser($data);
		}

		public function update($name, $status, $id){
			$data = $this->model->updateUser('Francis', 1, 2);
			echo $data;
		}

		public function select(){
			$data = $this->model->selectUser($id);
			print_r($data);
		}

		public function selectAll(){
			$data = $this->model->selectAllUsers();
			print_r($data);
		}

		public function delete(){
			$data = $this->model->deleteUser($id);
		}
	}