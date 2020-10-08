<?php  

	class profileModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}

		public function getDataOfProfile(){


			return '{
				"status": "KO",
				"message": "Aun en desarrollo"
			}';



		}

	}