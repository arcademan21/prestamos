<?php  
	
class AdminAjax extends Controllers{

public function __construct(){
	parent::__construct();
}

public function adminajax(){

	if(!empty($_POST['request'])){

		$request = json_decode(json_encode($_POST['request']));
		$method = strval($request->method);
		$response = $this->$method($request->params);

	}else{
		header('Location: '.base_url().'/error');
	}

	$this->views->getView($this, 'adminajax', $response);

}

public function login($params=null){
	return $this->model->login($params);
}

public function logout($params=null){
	return $this->model->logout($params);
}

public function addNewClient($params=null){
	return $this->model->addNewClient($params);
}

public function updateClient($params=null){
	return $this->model->updateClient($params);
}

public function deleteClient($params=null){
	return $this->model->deleteClient($params);
}

public function addNewLoan($params=null){
	return $this->model->addNewLoan($params);
}

public function addExistsLoan($params=null){
	return $this->model->addExistsLoan($params);
}

public function chargeMoney($params=null){
	return $this->model->chargeMoney($params);
}

public function searchCode($params=null){
	return $this->model->searchCode($params);
}

public function walletPlus($params=null){
	return $this->model->walletPlus($params);
}

public function walletRest($params=null){
	return $this->model->walletRest($params);
}

public function updateDatabase($params=null){
	return $this->model->updateDatabase($params);
}

public function updateRegisters($params=null){
	return $this->model->updateRegisters($params);
}

public function editClient($params=null){
	return $this->model->editClient($params);
}

public function tempAction($params=null){
	return $this->model->tempAction($params);
}





}