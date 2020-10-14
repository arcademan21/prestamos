<?php  

class clientModel extends Mysql{

public function __construct(){
	parent::__construct();
}

public function getDataOfClient($client_code){

$data = [];

$query = '
	SELECT DISTINCT *
	FROM customers
	WHERE id_customer = "'.$client_code.'"
	OR name = "'.strtolower($client_code).'"
';

$request = $this->select_all($query);

if(!empty($request)){

$data['customer'] = $request;

$query = '
	SELECT DISTINCT
	id_customer,
	interest,
	accrued_interest,
	interest_paid,
	pending_interest,
	paid_capital,
	dete,
	increased_debt,
	payment_month,
	outstanding_capital
	FROM payments
	WHERE id_customer = "'.$client_code.'"
	OR client = "'.strtolower($client_code).'"
	ORDER BY dete DESC
';

$request = $this->select_all($query);
$data['payments'] = $request;

$query = '
	SELECT DISTINCT
	dete,
	amount
	FROM deposits
	WHERE id_customer = "'.$client_code.'"
	OR client = "'.strtolower($client_code).'"
';

$request = $this->select_all($query);
$data['deposits'] = $request;

$query = '
	SELECT DISTINCT
	interest,
	increased_debt,
	dete,
	paid_capital,
	pending_interest,
	outstanding_capital
	FROM payments
	WHERE id_customer = "'.$client_code.'" 
	OR client = "'.strtolower($client_code).'"
	ORDER BY dete DESC
	LIMIT 1
';

$request = $this->select($query);
$data['global'] = $request;

//-------------------------------------------

$sql = '
	SELECT initial_loan, payment_status
	FROM customers
	WHERE id_customer = "'.$client_code.'"
';

$request = $this->select($sql);

if($request['initial_loan'] == 0 AND $request['payment_status'] = 'initial'){
	
	$sql = '
		UPDATE customers SET
		initial_loan = ?
		WHERE id_customer = "'.$client_code.'"
	';

	$arrval = array(
		$this->select('
			SELECT MAX(outstanding_capital) AS outstanding_capital
			FROM payments
			WHERE id_customer = "'.$client_code.'"
		')['outstanding_capital']
	);

	$this->update($sql, $arrval);
}

$sql = '
	SELECT DISTINCT
	payments.pending_interest AS pending_interest,
	customers.initial_loan AS outstanding_capital
	FROM payments, customers
	WHERE payments.id_customer = "'.$client_code.'"
	AND customers.id_customer = "'.$client_code.'"
';

$request = $this->select($sql);

$data['TOTAL_INFO_HEADER'] = $request;

//--------------------------------------------

return $data;

}else{
	return false;
}

}

}