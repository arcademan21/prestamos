<?php  

class dashboardModel extends Mysql{

public function __construct(){
	parent::__construct();
}

/*---------------------------------*/

public function getAllData(){

//OBTIENE TOTAL CLIENTES
/*---------------------------------*/
$data = [];

$query = '
	SELECT *
	FROM payments
	ORDER BY dete ASC
';

$request = $this->select_all($query);
$data['alldata'] = $request;
/*---------------------------------*/

/*---------------------------------*/
//OBTIENE TOTAL PRESTADO DE ESTE AÑO
$query = '
	SELECT 
		SUM(outstanding_capital) AS TOTAL_BORROWED
	FROM payments 
	WHERE YEAR(dete) = YEAR(NOW()) 	
';

$request = $this->select_all($query);
$data['TOTAL_BORROWED'] = $request;
/*---------------------------------*/

//OBTIENE INTERES TOTAL PENDIENTE DE ESTE AÑO
/*---------------------------------*/
$query = '
	SELECT 
		SUM(pending_interest) AS PENDING_INTEREST
	FROM payments
	WHERE YEAR(dete) = YEAR(NOW())
';

$request = $this->select_all($query);
$data['PENDING_INTEREST'] = $request;
/*---------------------------------*/

//OBTIENE NUMERO TOTAL DE CUENTAS SALDADAS
/*---------------------------------*/
$query = '
	SELECT COUNT(id) AS SETTLED 
	FROM customers 
	WHERE payment_status = "solved" 
';

$request = $this->select_all($query);
$data['SETTLED'] = $request;
/*---------------------------------*/

/*---------------------------------*/
//OBTIENE NUMERO TOTAL DE CUENTAS PENDIENTES 
$query = '
	SELECT COUNT(id) AS DEBTORS 
	FROM customers 
	WHERE payment_status = "pending" 
';

$request = $this->select_all($query);
$data['DEBTORS'] = $request;
/*---------------------------------*/

/*---------------------------------*/
//OBTIENE NUMERO TOTAL DE CLIENTES
$query = '
	SELECT COUNT(id) AS CLIENTS FROM customers
';

$request = $this->select_all($query);
$data['CLIENTS'] = $request;
/*---------------------------------*/

/*---------------------------------*/
//OBTIENE DATOS DE ESTADISTICAS

//Dinero prestado
$query = '
	SELECT DISTINCT
		MAX(dete) AS DATES,
		SUM(outstanding_capital) AS BORROWED	
	FROM payments 
	WHERE YEAR(dete) = YEAR(NOW())
	AND MONTH(dete) < MONTH(NOW())  
	GROUP BY MONTH(dete) 
	ASC LIMIT 12
';

$request = $this->select_all($query);
$data['STADISTICS_BORROWED_MONTH'] = $request;

//Dinero pendiente
$query = '
	SELECT DISTINCT
		dete AS DATES,
		SUM(pending_interest) AS PENDING_INTEREST
	FROM payments 
	WHERE YEAR(dete) = YEAR(NOW())
	AND MONTH(dete) < MONTH(NOW())  
	GROUP BY MONTH(dete) 
	ASC LIMIT 12
';

$request = $this->select_all($query);
$data['STADISTICS_PENDING_INTEREST_MONTH'] = $request;

//Dinero pagado
$query = '
	SELECT DISTINCT
		dete AS DATES,
		SUM(paid_capital) AS PAID_CAPITAL
	FROM payments 
	WHERE YEAR(dete) = YEAR(NOW())
	AND MONTH(dete) < MONTH(NOW())  
	GROUP BY MONTH(dete) 
	ASC LIMIT 12
';

$request = $this->select_all($query);
$data['STADISTICS_PAID_CAPITAL_MONTH'] = $request;
/*---------------------------------*/

/*---------------------------------*/
//OBTIENE DATOS DE MI CARTERA

//Dinero pendiente
$query = '
	SELECT 
		mount AS MOUNT
	FROM wallet 
';

$request = $this->select_all($query);
$data['WALLET_MOUNT'] = $request;
/*---------------------------------*/

return $data;
	
}

}