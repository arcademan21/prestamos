<?php  

class Mysql extends Connection{

	private $connection;
	private $strquery;
	private $arrvalues;

	public function __construct(){
		
		$this->connection = new Connection();
		$this->connection = $this->connection->conect();
	}

	//Insert register...
	public function insert(string $query, array $arrvalues){
		
		$this->strquery = $query;
		$this->arrvalues = $arrvalues;

		$insert = $this->connection->prepare($this->strquery);
		$result = $insert->execute($this->arrvalues);

		if($result){
			$lastInsert = $this->connection->lastInsertId();
		}else{
			$lastInsert = 0;
		}

		return $lastInsert;
	}

	//Get one register...
	public function select(string $query){
		
		$this->strquery = $query;

		$result = $this->connection->prepare($this->strquery);
		$result->execute();
		$data = $result->fetch(PDO::FETCH_ASSOC);

		return $data;
	}

	//Get all registers...
	public function select_all(string $query){

		$this->strquery = $query;

		$result = $this->connection->prepare($this->strquery);
		$result->execute();
		$data = $result->fetchall(PDO::FETCH_ASSOC);

		return $data;
	}

	//Update register...
	public function update(string $query, array $arrvalues){

		$this->strquery = $query;
		$this->arrvalues = $arrvalues;

		$update = $this->connection->prepare($this->strquery);
		$result = $update->execute($this->arrvalues);

		return $result;
		
	}

	//Delete register...
	public function delete(string $query){

		$this->strquery = $query;
		
		$delete = $this->connection->prepare($this->strquery);
		$result = $delete->execute();

		return $result;

	}


	protected function getInterestOfClient($code){
		$sql = '
			SELECT interest FROM customers WHERE id_customer = "'.$code.'";
		';

		$response = $this->select($sql);

		return $response['interest'];
	}

	protected function getPendingInterest($code){
		$sql = '
			SELECT SUM(pending_interest) AS pending_interest FROM payments WHERE id_customer = "'.$code.'";
		';

		$response = $this->select($sql);

		return $response['pending_interest'];
	}

	protected function getTotalPendingInterestOfClient($code){
		$sql = '
			SELECT 
				SUM(pending_interest) AS pending_interest 
			FROM payments 
			WHERE id_customer = "'.$code.'"
		';

		$response = $this->select($sql);

		return $response['pending_interest'];
	}

	protected function getMinOutstandingCapitalOfClient($code){
		$sql = '
			SELECT MIN(outstanding_capital) AS outstanding_capital
			FROM payments WHERE id_customer = "'.$code.'"
		';

		$response = $this->select($sql);

		return $response['outstanding_capital'];
	}

	protected function reduceWallet($mount){
		
		$sql = '
			SELECT mount 
			FROM wallet 
		';

		$current_mount = $this->select($sql);

		$mount = ($current_mount['mount'] - $mount);

		$sql = '
			UPDATE wallet 
			SET mount = ?
		';

		$data = array($mount);

		$this->update($sql, $data);
	}

	protected function success_message($message, $data=null){

		if(is_null($data)){
			return json_encode([
				'status'=> 'OK',
				'message'=> $message
			]);
		}

		return json_encode([
			'status'=> 'OK',
			'message'=> $message,
			'data'=> $data
		]);

	}

	protected function error_message($message, $data=null){

		if(is_null($data)){
			return json_encode([
				'status'=> 'KO',
				'message'=> $message
			]);
		}

		return json_encode([
			'status'=> 'KO',
			'message'=> $message,
			'data'=> $data
		]);

	}

	public function saveHistorial($code=null){

		/*---------------------------------*/
		//AÑADE CUENTAS SALDADAS AL HISTORIAL
		/*---------------------------------*/

		$sql = '
			SELECT DISTINCT
			payments.id_customer,
			payments.client,
			payments.dete,
			payments.outstanding_capital,
			payments.interest,
			payments.accrued_interest,
			payments.interest_paid,
			payments.pending_interest,
			payments.paid_capital,
			payments.increased_debt,
			payments.payment_month
			FROM payments, customers
			WHERE payments.id_customer = "'.$code.'"
			AND customers.id_customer = "'.$code.'"
		';

		$response = $this->select_all($sql);

		foreach ($response as $data) {
			
			$sql = '
				INSERT INTO historial(
					id_customer,
					client,
					dete,
					outstanding_capital,
					interest,
					accrued_interest,
					interest_paid,
					pending_interest,
					paid_capital,
					increased_debt,
					payment_month
				) VALUES (?,?,?,?,?,?,?,?,?,?,?)
			';

			$arrval = array(
				$data['id_customer'],
				$data['client'],
				$data['dete'],
				$data['outstanding_capital'],
				$data['interest'],
				$data['accrued_interest'],
				$data['interest_paid'],
				$data['pending_interest'],
				$data['paid_capital'],
				$data['increased_debt'],
				$data['payment_month']
			);

			$request = $this->insert($sql, $arrval);	
		}

	}

	public function deleterRegisters($code=null){
		
		$sql = 'DELETE FROM payments WHERE id_customer = "'.$code.'"';
		$this->delete($sql);

		$sql = 'DELETE FROM deposits WHERE id_customer = "'.$code.'"';
		$this->delete($sql);
	}

	public function changePaymentStatus($status, $code){
		
		$sql = '
			UPDATE customers
			SET payment_status = ?
			WHERE id_customer = ? 
		';

		$arrval = array($status, $code);

		$result = $this->update($sql, $arrval);
	}

	public function changeIntialLoan($mount, $code){
		$sql = '
			UPDATE customers
			SET initial_loan = ?
			WHERE id_customer = ? 
		';

		$arrval = array($mount, $code);

		$result = $this->update($sql, $arrval);
	}

	public function changeInterest($percent, $code){
		$sql = '
			UPDATE customers
			SET interest = ?
			WHERE id_customer = ? 
		';

		$arrval = array($percent, $code);

		$result = $this->update($sql, $arrval);
	}

	public function changePendingInterest($mount, $code){
		$sql = '
			UPDATE customers
			SET pending_interest = ?
			WHERE id_customer = ? 
		';

		$arrval = array($mount, $code);

		$result = $this->update($sql, $arrval);
	}

	public function getCustomerPendingInterest($code){
		$sql = '
			SELECT pending_interest 
			FROM customers
			WHERE id_customer = "'.$code.'"
		';

		$response = $this->select($sql);

		return $response['pending_interest'];
	}

	public function checkCurrentMonthAndUpdateRegister($mount, $code){

		$sql = '
			SELECT
			MAX(MONTH(dete)) AS last_month,
			interest
			FROM payments 
			WHERE id_customer = "'.$code.'"
			AND MONTH(dete) < MONTH(NOW())
		';

		$response = $this->select($sql);

		if(!is_null($response['last_month'])){
			if($response['last_month'] < date('m')){
				$this->changePendingInterest($response['interest']-$mount, $code);
			}
		}
		


	}

	public function updateGlobalInfo(){
		
		$data = $this->getAllData();
		$borrowed_this_month = $data['TOTAL_BORROWED_MONTH'][0]['BORROWED_OF_THIS_MONTH'];
		$total_capital_this_month = $data['TOTAL_CAPITAL_MONTH'][0]['CAPITAL_OF_THIS_MONTH'];
		$total_borrow = $data['TOTAL_BORROWED'][0]['TOTAL_BORROWED'];
		$interest_this_month = $data['PENDING_INTEREST_OF_THIS_MONTH'][0]['PENDING_INTEREST'];
		$all_pending_interest = $data['PENDING_INTEREST'][0]['PENDING_INTEREST'];
		$all_interest_paid = $data['ACURRED_INTEREST'][0]['ACURRED_INTEREST'];

		//dep($all_pending_interest);
		
		$sql = '
			UPDATE global_info
			SET 
			borrowed_this_month = ?,
			capital_borrow_this_month = ?,
			total_borrow = ?,
			interest_this_month = ?,
			all_pending_interest = ?,
			all_interest_paid = ?
		';

		$arrval = array(
			$borrowed_this_month,
			$total_capital_this_month,
			$total_borrow,
			$interest_this_month,
			$all_pending_interest,
			$all_interest_paid
		);

		$this->update($sql, $arrval);




	}

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

