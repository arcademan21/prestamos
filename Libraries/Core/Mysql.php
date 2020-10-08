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


}

