<?php  

class dashboardModel extends Mysql{

public function __construct(){
	parent::__construct();
}

/*---------------------------------*/

public function getAllData(){

$data = [];

//OBTIENE TOTAL PRESTADO DEL MES
/*---------------------------------*/
$query = '
	SELECT DISTINCT
		SUM(paid_capital) AS BORROWED_OF_THIS_MONTH	
	FROM payments 
	WHERE MONTH(dete) = MONTH(NOW()) 
	AND YEAR(dete) = YEAR(NOW())	
';

$request = $this->select_all($query);
$data['TOTAL_BORROWED_MONTH'] = $request;
/*---------------------------------*/

//OBTIENE CAPITAL ABONADO DEL MES
/*---------------------------------*/
$query = '
	SELECT DISTINCT
		SUM(increased_debt) AS CAPITAL_OF_THIS_MONTH	
	FROM payments 
	WHERE MONTH(dete) = MONTH(NOW()) 
	AND YEAR(dete) = YEAR(NOW())	
';

$request = $this->select_all($query);
$data['TOTAL_CAPITAL_MONTH'] = $request;
/*---------------------------------*/

//OBTIENE TOTAL CLIENTES
/*---------------------------------*/

$query = '
	SELECT *
	FROM payments
	ORDER BY dete ASC
';

$request = $this->select_all($query);
$data['alldata'] = $request;
/*---------------------------------*/

/*---------------------------------*/
//OBTIENE CAPITAL TOTAL PENDIENTE DE ESTE AÑO
$query = '
	SELECT DISTINCT
		SUM(paid_capital) AS TOTAL_BORROWED
	FROM payments 		
';

// SELECT 
// 	SUM(initial_loan) AS TOTAL_BORROWED
// 	FROM customers

$request = $this->select_all($query);
$data['TOTAL_BORROWED'] = $request;
/*---------------------------------*/

//OBTIENE INTERES TOTAL PENDIENTE DE ESTE AÑO
/*---------------------------------*/
$query = '
	SELECT 
		SUM(pending_interest) AS PENDING_INTEREST
	FROM payments
	WHERE MONTH(dete) < MONTH(NOW())
	AND YEAR(dete) = YEAR(NOW())
';

$request = $this->select_all($query);
$data['PENDING_INTEREST'] = $request;
/*---------------------------------*/

//OBTIENE INTERES TOTAL ABONADO DEL MES
/*---------------------------------*/
$query = '
	SELECT 
		SUM(interest_paid) AS ACURRED_INTEREST
	FROM payments
	WHERE MONTH(dete) = MONTH(NOW())
	AND YEAR(dete) = YEAR(NOW())
';

$request = $this->select_all($query);
$data['ACURRED_INTEREST'] = $request;
/*---------------------------------*/

//OBTIENE INTERESES TOTAL PENDIENTE DE ESTE MES
/*---------------------------------*/
$query = '
	SELECT DISTINCT
	SUM(interest) AS PENDING_INTEREST
	FROM payments
	WHERE id IN (SELECT MAX(id) FROM payments GROUP BY client) 
	AND MONTH(dete) = MONTH(NOW())
	AND YEAR(dete) = YEAR(NOW())
	ORDER BY client
';

$request = $this->select_all($query);
$data['PENDING_INTEREST_OF_THIS_MONTH'] = $request;
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

//Capital pendiente
$query = '
	SELECT DISTINCT
		MAX(dete) AS DATES,
		SUM(outstanding_capital) AS BORROWED	
	FROM payments 
	WHERE YEAR(dete) = YEAR(NOW()) 
	AND MONTH(dete) < MONTH(NOW())
	GROUP BY MONTH(dete)   
    ORDER BY MONTH(dete)
	ASC LIMIT 12	
';

$request = $this->select_all($query);
$data['STADISTICS_BORROWED_MONTH'] = $request;

//Capital abonado 
$query = '
	

	SELECT DISTINCT
		MAX(dete) AS DATES,
		SUM(paid_capital) AS PAID_CAPITAL	
	FROM payments 
	WHERE YEAR(dete) = YEAR(NOW()) 
	AND MONTH(dete) < MONTH(NOW())
	GROUP BY MONTH(dete)   
    ORDER BY MONTH(dete)
	ASC LIMIT 12
';

$request = $this->select_all($query);
$data['STADISTICS_PAID_CAPITAL_MONTH'] = $request;
/*---------------------------------*/

//Interes pendiente
$query = '
	
	SELECT DISTINCT
		MAX(dete) AS DATES,
		SUM(pending_interest) AS PENDING_INTEREST	
	FROM payments 
	WHERE YEAR(dete) = YEAR(NOW()) 
	AND MONTH(dete) < MONTH(NOW())
	GROUP BY MONTH(dete)   
    ORDER BY MONTH(dete)
	ASC LIMIT 12
';

$request = $this->select_all($query);
$data['STADISTICS_PENDING_INTEREST_MONTH'] = $request;

//Interes abonado
$query = '
	
	SELECT DISTINCT
		MAX(dete) AS DATES,
		SUM(interest_paid) AS INTEREST_PAID	
	FROM payments 
	WHERE YEAR(dete) = YEAR(NOW()) 
	AND MONTH(dete) < MONTH(NOW())
	GROUP BY MONTH(dete)   
    ORDER BY MONTH(dete)
	ASC LIMIT 12
';

$request = $this->select_all($query);
$data['STADISTICS_INTEREST_PAID_MONTH'] = $request;



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