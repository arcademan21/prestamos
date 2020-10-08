<?php  

	class usersModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}

		//Add new user...
		public function addUser(string $name){
			
			$query = 'INSERT INTO users(name, register_date) VALUES (?,?)';
			$data = array($name, date("Y-m-d H:i:s"));
			$request = $this->insert($query, $data);

			return $request;
		}

		//Select one user...
		public function selectUser($id){

			$query = 'SELECT * FROM users WHERE id = '.$id;
			$request = $this->select($query);

			return $request;
		}

		//Select all users...
		public function selectAllUsers(){

			$query = 'SELECT * FROM users';
			$request = $this->select_all($query);

			return $request;
		}

		//Update user...
		public function updateUser($name, $status, $id){

			$query = 'UPDATE users SET name=?, status=? WHERE id=?';
			$data = array($name, $status, $id);
			$request = $this->update($query, $data);

			return $request;
		}

		//Delete user...
		public function deleteUser($id){

			$query = 'DELETE FROM users WHERE id = ?';
			$data = array($id);
			$request = $this->update($query, $data);

			return $request;
		}

	}