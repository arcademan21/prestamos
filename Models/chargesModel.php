<?php  

class chargesModel extends Mysql{

public function __construct(){
	parent::__construct();
}

//OBTIENE TOTAL CLIENTES
/*---------------------------------*/

public function getClients(){

$data = [];

$query = '
	SELECT *
	FROM customers
	WHERE payment_status = "pending"
	OR payment_status = "initial"
	ORDER BY name ASC
';

$request = $this->select_all($query);
$data['alldata'] = $request;

return $data;

}
/*---------------------------------*/


}

