<?php  

	class Views{

		public function getView($controller, $view, $data=''){

			$controller = get_class($controller);

			if($controller == 'Home'){
				$view = 'Views/'.$view.'.php';
			}else{
				$view = 'Views/'.$controller.'/'.$view.'.php';	
			}

			if(!isset($_SESSION['USER_NAME'])){
				$view = 'Views/Login/login.php';	
		  	}

			require_once $view;

		}
	}