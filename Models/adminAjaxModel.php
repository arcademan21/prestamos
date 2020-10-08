<?php  

class adminAjaxModel extends Mysql{

public function __construct(){
	parent::__construct();
}

public function updateRegisters($params=null){

	try {
		
	
		$arrResult = [];

		//Obteniendo todos los registros...
		$sql = '
			SELECT 
			MAX(dete) AS dete,
			id_customer
			FROM payments
			GROUP BY client
		';
		
		$response = $this->select_all($sql);

		//Recoriendo registros en busca de fechas 

		$month_and_day = date('m-d');
		foreach ($response as $data) {

			if(date('m-d', strtotime($data['dete'])) != $month_and_day){
				if(date('Y', strtotime($data['dete'])) == date('Y')){
					//Actualiza la base de datos...
					$month = date('m', strtotime($data['dete']));
					for($i = $month; $i < date('m'); $i++){
						$exect = $this->updateOneRegister($data, $i);
						array_push($arrResult, $exect);
					}
					
				}
				
			}
		}

		if(count($arrResult) > 0){

			$incidents = [];
			foreach ($arrResult as $data) {
				$temp = json_decode($data);
				if($temp->status == 'KO'){
					array_push($incidents, $temp);
				}
			}

			if(count($incidents) > 0 and count($incidents) < count($response)){
				return json_encode([
					'status'=>'OK',
					'message'=>'Existen incidencias',
					'data'=>[
						'incidentes'=>$arrResult
					]
				]);
			}else if(count($incidents) == count($response)){
				return json_encode([
					'status'=>'KO',
					'message'=>'Ha ocurrido un error al intentar actualizar los registros',
					'data'=>[
						'incidentes'=>$arrResult
					]
				]);
			}else{
				return json_encode([
					'status'=>'OK',
					'message'=>'Base de datos actualizada correctamente.',
					'data'=>[
						'incidentes'=>$arrResult
					]
				]);
			}

		}else{
			return json_encode([
				'status'=>'OK',
				'message'=>'Base de datos actualizada sin cambios.',
			]);
		}
	} catch (PDOException $e) {
		echo ''.$e->getMessage();
	}
	

}

public function updateOneRegister($data, $month){

	//comprobar si esta actualizado...
	$sql = '
		SELECT * 
		FROM customers 
		WHERE id_customer = "'.$data['id_customer'].'"
		AND MONTH(updated_on) = MONTH(NOW())
		AND DAY(updated_on) = DAY(NOW())
	';

	$response = $this->select($sql);

	if(!$response){
		return $this->updatedIt($data, $month);
	}else{
		return json_encode([
			'status'=> 'OK',
			'message'=> 'Base de datos actualizada sin cambios'
		]);
	}

}	

public function updatedIt($data, $month){

	try {
		
		$result = true;
		$arrResult = [];

		$sql = '
			SELECT DISTINCT
			payments.id_customer,
			payments.client,
			MAX(payments.dete) AS dete,
			payments.outstanding_capital,
			payments.interest,
			payments.accrued_interest,
			payments.interest_paid,
			payments.pending_interest,
			payments.paid_capital,
			payments.increased_debt,
			payments.payment_month
			FROM payments, customers
			WHERE MONTH(payments.dete) < MONTH(NOW())
			AND YEAR(payments.dete) <= YEAR(NOW())
			AND customers.id_customer = payments.id_customer
			AND customers.payment_status != "solved"
			AND customers.payment_status != "initial"
			AND customers.id_customer = "'.$data['id_customer'].'"
			AND payments.id_customer = "'.$data['id_customer'].'"
			GROUP BY payments.client
		';

		$response = $this->select($sql);


		// $date = $data['dete'];
		// $month = date('m', strtotime($data['dete']));
		// $day = date('d', strtotime($data['dete']));
		// $year = date('Y', strtotime($data['dete']));
		// $client = $data['client'];

		$sql = '
			INSERT INTO payments(
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

		$interest = $this->getInterestOfClient($response['id_customer']);
		$outstanding_capital = $this->getMinOutstandingCapitalOfClient($response['id_customer']);
		$pending_interest = ($outstanding_capital/100) * $interest;

		$arrval = array(
			$response['id_customer'],
			$response['client'],
			date('Y-'.($month+1).'-d H:i:s'),
			$outstanding_capital,
			$interest,
			$pending_interest,
			0,
			0,
			0,
			0,
			0
		);

		//dep($arrval);

		$result = $this->insert($sql, $arrval);
		array_push($arrResult, $arrval);

		if($result){
			
			$sql = '
				UPDATE update_database 
				SET updated_date = ?
				WHERE id = 1
			';

			$arrval = array(date('Y-m-d H:i:s'));
			$this->update($sql, $arrval);
			
			return json_encode([
				'status'=> 'OK',
				'message'=> 'Base de datos actualizada',
				'data'=> [
					'date'=> $arrval,
					'registers'=>$arrResult
				]
			]);

		}else{
			return json_encode([
				'status'=> 'KO',
				'message'=> 'Ha ocurrido un error al intentar actualizar la base de datos.',
				'data'=> false
			]);
			
		}

	} catch (PDOException $e) {
		//echo ''.$e->getMessage();
		return json_encode([
			'status'=> 'KO',
			'message'=> 'Ha ocurrido un error al intentar actualizar la base de datos.',
			'data'=> false
		]);
	}


}

public function updateDatabase($params=null){
	
	/*---------------------------------*/
	//AÑADE NUEVA FECHA PENDIENTE
	/*---------------------------------*/
	try {
			
		$result = true;
		$arrResult = [];

		$sql = '
			SELECT MONTH(updated_date) AS updated_date
			FROM update_database
		';

		$response = $this->select($sql);

		//dep($response);

		if($response['updated_date'] != date('m')){

			$sql = '
				SELECT DISTINCT
				payments.id_customer,
				payments.client,
				MAX(payments.dete) AS dete,
				payments.outstanding_capital,
				payments.interest,
				payments.accrued_interest,
				payments.interest_paid,
				payments.pending_interest,
				payments.paid_capital,
				payments.increased_debt,
				payments.payment_month
				FROM payments, customers
				WHERE MONTH(payments.dete) < MONTH(NOW())
				AND YEAR(payments.dete) <= YEAR(NOW())
				AND customers.id_customer = payments.id_customer
				AND customers.payment_status != "solved"
				AND customers.payment_status != "initial"
				GROUP BY payments.client
			';

			$response = $this->select_all($sql);
			
			$months = [];
			foreach ($response as $data) {
				
				$date = $data['dete'];
				$month = date('m', strtotime($data['dete']));
				$day = date('d', strtotime($data['dete']));
				$year = date('Y', strtotime($data['dete']));
				$client = $data['client'];

				$sql = '
					INSERT INTO payments(
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

				$interest = $this->getInterestOfClient($data['id_customer']);
				$outstanding_capital = $this->getMinOutstandingCapitalOfClient($data['id_customer']);
				$pending_interest = ($outstanding_capital/100) * $interest;

				
				if($month < date('m')){
					
					for($i = $month; $i < date('m'); $i++){
						
						$arrval = array(
							$data['id_customer'],
							$data['client'],
							date('Y-'.($i+1).'-d H:i:s'),
							$outstanding_capital,
							$interest,
							$pending_interest,
							0,
							0,
							0,
							0,
							0
						);

						// dep($i);
						// dep($month);
						// dep(date('m'));

						$result = $this->insert($sql, $arrval);
						array_push($arrResult, $arrval);
					}

				}
				
			}

		}

		//dep($result);

		if($result){
			
			$sql = '
				UPDATE update_database 
				SET updated_date = ?
				WHERE id = 1
			';

			$arrval = array(date('Y-m-d H:i:s'));
			$this->update($sql, $arrval);
			
			return json_encode([
				'status'=> 'OK',
				'message'=> 'Base de datos actualizada',
				'data'=> [
					'date'=> $arrval,
					'registers'=>$arrResult
				]
			]);

		}else{
			return json_encode([
				'status'=> 'KO',
				'message'=> 'Ha ocurrido un error al intentar actualizar la base de datos.',
				'data'=> false
			]);
			
		}

	} catch (PDOException $e) {
		//echo 'Error: '.$e->getMessage();
		return json_encode([
			'status'=> 'KO',
			'message'=> 'Ha ocurrido un error al intentar actualizar la base de datos.',
			'data'=> false
		]);
	}
}

/*---------------------------------*/
//METODOS DE SESION 
/*---------------------------------*/

public function login($params=null){
	
	$sql = '
		SELECT user, passw FROM users 
		WHERE user = "'.$params->email.'"
		AND passw = "'.md5($params->passw).'"
	';

	$request = $this->select($sql);

	if($request){
		
		$_SESSION['USER_NAME'] = $request['user'];

		return $this->success_message('Bienvenido señor '.$_SESSION['USER_NAME']);	
	}
	

	return $this->error_message('Usuario incorrecto.');
	
}

public function logout($params=null){
	
	try{
		session_destroy();
		session_unset();
		return $this->success_message('Sesion cerrada correctamente.');
	} catch (Exception $e) {
		return $this->error_message('No se pudo cerrar session.');
	}
	
}
/*---------------------------------*/

/*---------------------------------*/
//METODOS DE PRESTAMO 
/*---------------------------------*/

public function addNewClient($params=null){
	
	$sql = '
		SELECT name, id_customer 
		FROM customers
		WHERE name = "'.$params->name.'"
		OR id_customer = "'.$params->code.'"
	';

	$response = $this->select($sql);

	//dep($response);

	if(!$response){

		$sql = '
			INSERT INTO customers(
				id_customer,
				name,
				full_name,
				phone,
				start_month,
				interest,
				payment_status
			) VALUES (?,?,?,?,?,?,?) 
		';

		try {

			$data = array(
				$params->code,
				$params->name,
				$params->full_name,
				$params->phone,
				date('Y-m-d H:i:s'),
				$params->interest,
				'initial'
			);

			$this->insert($sql, $data);
			$this->changePaymentStatus('initial', $params->code);
			return $this->success_message('Cliente nuevo añadido...');

		} catch (PDOException $e) {
			//echo ''.$e->getMessage();
			return $this->error_message('Ha ocurrido un error al intentar añadir el cliente...');
		}

	}else{
		return $this->error_message('Ya existe un cliente con ese nombre o codigo.');
	}
}



public function addNewLoan($params=null){
	
	//dep($params);
	
	$sql = '
		SELECT client, id_customer 
		FROM payments
		WHERE client = "'.$params->name.'"
		OR id_customer = "'.$params->code.'"
	';

	$response = $this->select($sql);

	if(!$response){

		try {
			
			$addNewClient = json_decode($this->addNewClient($params));

			$sql = '
				INSERT INTO payments(
					id_customer,
					client,
					dete,
					outstanding_capital,
					interest,
					pending_interest,
					increased_debt
				)VALUE(?,?,?,?,?,?,?)
			';

			$data = array(
				$params->code,
				$params->name,
				date('Y-m-d H:i:s'),
				$params->initial_loan,
				($params->initial_loan/100) * $params->interest,
				//($params->initial_loan/100) * $params->interest,
				0,
				$params->initial_loan
			);

			$this->insert($sql, $data);
			$this->changePaymentStatus('initial', $params->code);
			$this->reduceWallet($params->initial_loan);

			return $this->success_message('Nuevo prestamo realizado.');

		} catch (PDOException $e) {
			//echo ''.$e->getMessage();
			return $this->error_message('Ha ocurrido un error al intentar el nuevo prestamo');
		}
	}else{
		return $this->error_message('Ya existe un cliente con este nombre o codigo [ Dirijase al apartado "Cliente de la lista" ] ');
	}
	
}

public function addExistsLoan($params=null){
	
	$sql = '
		SELECT 
			MAX(payments.dete) AS dete,
			customers.id_customer,
			customers.name AS client,
			customers.interest,
			customers.full_name AS full_name,
			customers.phone AS phone,
			MIN(payments.pending_interest) AS pending_interest,
			MIN(payments.outstanding_capital) AS outstanding_capital,
			SUM(payments.pending_interest) AS accrued_interest,
			SUM(payments.interest_paid) AS interest_paid,
			SUM(payments.paid_capital) AS paid_capital,
			(SELECT MIN(payment_month) FROM payments WHERE MONTH(dete) = MONTH(NOW())) AS payment_month
		FROM customers, payments
		WHERE customers.id_customer = "'.$params->code.'"
		AND payments.id_customer = "'.$params->code.'"
		AND YEAR(payments.dete) <= YEAR(NOW())	
	';

	$response = $this->select($sql);

	//dep($response);

	if($response['client'] == NULL){

		$sql = '
			SELECT 
				full_name,
				phone
			FROM customers
			WHERE id_customer = "'.$params->code.'"
		';

		$response = $this->select($sql);

		$params->full_name = $response['full_name'];
		$params->phone = $response['phone'];

		$sql = '
			UPDATE customers
			SET interest=?
			WHERE id_customer=?
		';
		
		$data = array($params->interest, $params->code);
		$this->update($sql, $data);


		$this->changePaymentStatus('initial', $params->code);
		return $this->addNewLoan($params);

	}else{

		if($response){
			
			try {
				
				$sql = '
					INSERT INTO payments(
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
					)VALUES(?,?,?,?,?,?,?,?,?,?,?)	
				';

				//dep($params);
				
				$client = $response['client'];
				$outstanding_capital = $params->initial_loan;
				$interest = ($outstanding_capital/100) * $params->interest;
				$accrued_interest = $response['accrued_interest'];
				$interest_paid = $response['interest_paid'];
				$pending_interest = $response['pending_interest'] + $interest;
				$paid_capital = $response['paid_capital'];

				$data = array(
					$params->code,
					$client,
					date('Y-m-d H:i:s'),
					$outstanding_capital,
					$interest,
					$accrued_interest,
					$interest_paid,
					//$pending_interest,
					0,
					$paid_capital,
					$outstanding_capital,
					0
				);

				//dep($data);

				$this->insert($sql, $data);
				$this->changePaymentStatus($params->code, 'pending');
				$this->reduceWallet($params->initial_loan);

				$sql = '
					UPDATE customers
					SET interest=?
					WHERE id_customer=?
				';

				$data = array($params->interest, $params->code);
				$this->update($sql, $data);

				$this->changePaymentStatus('solved', $params->code);
				return $this->success_message('Nuevo prestamo realizado.');

			} catch (PDOException $e) {
				//echo ''.$e->getMessage();
				return $this->error_message('Ha ocurrido un error al intentar el nuevo prestamo');
			}
		}else{
			return $this->error_message('No existe ningun cliente con este nombre o codigo ');
		}
	}
}
/*---------------------------------*/

/*---------------------------------*/
//METODOS DE DE ABONO 
/*---------------------------------*/

public function chargeMoney($params=null){

	$sql = '
		SELECT id_customer, name, payment_status
		FROM customers
		WHERE id_customer = "'.$params->code.'"
	';

	$response = $this->select($sql);

	if($response['payment_status'] != 'solved'){
		
		$sql = '
			SELECT 
				MIN(payments.outstanding_capital) AS outstanding_capital,
				SUM(payments.pending_interest) AS pending_interest,
				customers.interest AS interest 
			FROM payments, customers
			WHERE payments.id_customer = "'.$params->code.'"
		';

		$response = $this->select($sql);

		$outstanding_capital = $response['outstanding_capital'];
		$pending_interest = $response['pending_interest'];
	
		if($params->mount >= ($outstanding_capital + $pending_interest)){
			
			$this->saveHistorial($params->code);
			$this->changePaymentStatus('solved', $params->code);
			$this->walletPlus($params);
			$this->deleterRegisters($params->code);
			
			return $this->success_message('Abono realizado correctamente. El cliente ha saldado su cuenta.');

		}else{
			

			try {

				
				$sql = '
					SELECT id_customer 
					FROM payments
					WHERE id_customer = "'.$params->code.'"
					AND MONTH(dete) = MONTH(NOW())
					AND payment_month = 0
				';

				$response = $this->select($sql);

				//var_dump($response);

				$sql = '
					INSERT INTO deposits(
						id_customer,
						client,
						dete,
						amount
					) VALUES (?,?,?,?)
				';

				$data = array(
					$params->code,
					$params->name,
					date('Y-m-d H:i:s'),
					$params->mount
				);

				$this->insert($sql, $data);

				$sql = '
					INSERT INTO payments(
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

				$interest_less = $outstanding_capital - $params->mount;

				$data = array(
					$params->code,
					$params->name,
					date('Y-m-d H:i:s'),
					$outstanding_capital - $params->mount,
					($interest_less/100) * $this->getInterestOfClient($params->code),
					0,
					($params->mount/100) * $this->getInterestOfClient($params->code),
					$this->getPendingInterest($params->code),
					$params->mount - ($params->mount/100) * $this->getInterestOfClient($params->code),
					0,
					$params->mount
				);

				//dep($data);

				$this->insert($sql, $data);
				$this->changePaymentStatus('pending', $params->code);
				$this->walletPlus($params);
				return $this->success_message('Abono realizado correctamente.');

				
			} catch (PDOException $e) {
				//echo 'Error: '.$e->getMessage();
				return $this->error_message('Ha ocurrido un error al intentar abonar el dinero');
			}
					
		}
	
	}else{
		return $this->error_message('Este cliente no tiene cuenta pendiente.');
	}

}


public function walletPlus($params=null){
	
	$sql = '
		UPDATE wallet
		SET mount = ?
	';

	$currentMount = $this->select('SELECT mount FROM wallet')['mount'];
	$total_borrowed = $this->getTotalBorrowed();
	$subTotal = $currentMount + ($params->mount - $total_borrowed);

	$arrval = array(
		$subTotal
	);

	$this->update($sql, $arrval);
	return $this->success_message('Mi cartera fue actualiza', [
		'status'=>'OK',
		'message'=>'Mi cartera fue actualiza'
	]);
}

public function walletRest($params=null){
	
	$sql = '
		UPDATE wallet
		SET mount = ?
	';

	$currentMount = $this->select('SELECT mount FROM wallet')['mount'];
	$total_borrowed = $this->getTotalBorrowed();
	$subTotal = $currentMount - ($params->mount - $total_borrowed);

	$arrval = array(
		$subTotal
	);

	$this->update($sql, $arrval);
	return $this->success_message('Mi cartera fue actualiza', [
		'status'=>'OK',
		'message'=>'Mi cartera fue actualiza'
	]);
}

public function getTotalBorrowed(){
	/*---------------------------------*/
	//OBTIENE TOTAL PRESTADO DE ESTE AÑO
	$query = '
		SELECT 
			SUM(outstanding_capital) AS TOTAL_BORROWED
		FROM payments  	
	';

	$request = $this->select($query);
	return $request['TOTAL_BORROWED'];
	/*---------------------------------*/
}

/*---------------------------------*/


public function updateClient($params=null){
	return $this->success_message('Editando usuario...');
}

public function deleteClient($params=null){
	$sql = 'DELETE FROM customers WHERE id_customer = "'.$params->id_code.'"';
	//$this->delete($sql);
	return $this->success_message('Delete complete.');

}

public function searchCode($params=null){
	
	$sql = '
		SELECT name, id_customer FROM customers
		WHERE id_customer = "'.$params->code.'" 
	';

	$response = $this->select($sql);

	//var_dump($response);

	if($response){
		return json_encode([
			'status'=> 'OK',
			'message'=> 'Codigo cargado',
			'data'=>[
				'val'=>$response['name'],
				'code'=>$response['id_customer']
			]
		]);
		//return $this->success_message('Delete complete.');
	}else{
		return $this->error_message('Codigo no valido');
	}
}



}