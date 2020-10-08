<?php  

class borrowMoneyModel extends Mysql{

public function __construct(){
	parent::__construct();
}


//OBTIENE TOTAL CLIENTES
/*---------------------------------*/

public function getClients(){

$data = [];

$query = '
	SELECT DISTINCT *
	FROM customers
	WHERE payment_status != "pending"
	ORDER BY name ASC
';

$request = $this->select_all($query);
$data['alldata'] = $request;

return $data;

}
/*---------------------------------*/

}