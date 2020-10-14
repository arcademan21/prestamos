<?php  
	
	// header('Content-Type: application/json');

	$data = $_POST['fileData'];

	$strJson = json_encode($data);
	$stdClass = json_decode($strJson);

	//Connection configs
	const DB_HOST = 'localhost';
	const DB_NAME = 'prestamos';
	const DB_USER = 'root';
	const DB_PASSWORD = 'root';
	const DB_CHARSET = 'charset=utf8';

	$options = array(
        PDO::ATTR_EMULATE_PREPARES => FALSE, 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    );

	$conf = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';'.DB_CHARSET;

	try{
		$connection = new PDO($conf, DB_USER, DB_PASSWORD, $options);
		$connection->setAttribute(
			PDO::ATTR_ERRMODE, 
			PDO::ERRMODE_EXCEPTION
		);
	}catch(PDOException $e){
		$connection = 'Error: connection down';
		echo 'ERROR: '.$e->getMessage();
	}

	function addCustomers($customer, $connection){
		
		$result = selectOne('
			SELECT id_customer, client, dete, interest, outstanding_capital 
			FROM payments 
			WHERE client = "'.$customer.'" ORDER BY dete ASC LIMIT 1
		', $connection);

		//var_dump($result);

		$query = 'INSERT INTO customers(
			id_customer,	
			name,	
			full_name,	
			phone,	
			interest,	
			start_month,	
			initial_loan
		) VALUES (?,?,?,?,?,?,?)';

		$arrvalues = array(
			$result['id_customer'],
			$result['client'],
			'Not specifying',
			'Not specifying',
			$result['interest'],
			$result['dete'],
			$result['outstanding_capital']
		);

		insert($query, $arrvalues, $connection);
	}

	function insert(string $query, array $arrvalues, $connection){
			
		$strquery = $query;
		$arrvalues = $arrvalues;

		$insert = $connection->prepare($strquery);
		$result = $insert->execute($arrvalues);

		if($result){
			//$lastInsert = $connection->lastInsertId();
			$lastInsert = 'OK';
		}else{
			//$lastInsert = 0;
			$lastInsert = 'FAILED';
		}

		return $lastInsert;
	}


	function randomCode($long, $val){
		
		$char = [
			'B' ,'C' ,'D' ,'F' ,'G' ,'H' ,'J' ,'K' ,'L' ,'M' ,'N' ,'P' ,'Q' ,'R' ,'S' ,'T' ,'V' ,'W' ,'X' ,'Y' ,'Z',
			'b' ,'c' ,'d' ,'f' ,'g' ,'h' ,'j' ,'k' ,'l' ,'m' ,'n' ,'p' ,'q' ,'r' ,'s' ,'t' ,'v' ,'w' ,'x' ,'y' ,'z'
		];

		$randC = rand(0,42);
		$char = $char[$randC].'-';

		for($i = 1; $i <= $long; $i++){
			$rand = rand(0,9);
			$char .= $rand;
		}
		
		return $val.$char;
	
	}

	function select(string $query, $connection){
			
		$strquery = $query;

		$result = $connection->prepare($strquery);
		$result->execute();
		$data = $result->fetchall(PDO::FETCH_ASSOC);

		return $data;
	}

	function selectOne(string $query, $connection){
			
		$strquery = $query;

		$result = $connection->prepare($strquery);
		$result->execute();
		$data = $result->fetch(PDO::FETCH_ASSOC);

		return $data;
	}

	//Add new client...
	function addClient($data, $connection){
		
		// do{
		// 	$aux = select('SELECT id_customer FROM payments', $connection, $code);
		// 	$code = randomCode(6, '#');
		// 	foreach ($aux as $value) {
		// 		if($value['id_customer'] == $code){
		// 			$aux = true;
		// 			break;
		// 		}else{
		// 			$aux = false;
		// 		}
		// 	}
		// }while(select('SELECT id_customer FROM payments', $connection, $code));

		//$code = randomCode(6, '#');
		
		for($i = 0; $i < count($data->fileData); $i++){
			
			if($data->type == 'pendientes'){
				
				$query = 'INSERT INTO payments(
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
				) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
				$temp = array(
					$data->code,
					$data->client,
					$data->fileData[$i]->dete, 
					$data->fileData[$i]->outstanding_capital, 
					$data->fileData[$i]->interest, 
					$data->fileData[$i]->accrued_interest, 
					$data->fileData[$i]->interest_paid,	
					$data->fileData[$i]->pending_interest, 
					$data->fileData[$i]->paid_capital, 
					$data->fileData[$i]->increased_debt, 
					$data->fileData[$i]->payment_month
				);
				
				insert($query, $temp, $connection);

			}else if($data->type == 'abonados'){
			
				$query = 'INSERT INTO deposits(
					id_customer,
					client,
					dete,	
					amount
				) VALUES (?,?,?,?)';
				
				$temp = array(
					$data->code,
					$data->client,
					$data->fileData[$i]->Fecha, 
					$data->fileData[$i]->Importe
				);

				insert($query, $temp, $connection);
			}
		}

		
	}

	print_r(addClient($stdClass, $connection));
	//print_r($strJson);

	// $customers = [
 //      'alfredo colombia', 
 //      'claris prima',
 //      'jonas',
 //      'martin busqueda',
 //      'nuris yaritsa',
 //      'zaida nairoby',
 //      'maria perlita',
 //      'wilkin locutorio',
 //      'maribel pld'
 //    ];

 //    for($i = 0; $i < count($customers); $i++){
 //    	addCustomers($customers[$i], $connection);
 //    }
	









	
