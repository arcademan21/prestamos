<?php  

  

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

  function selectOne(string $query, $connection){
      
    $strquery = $query;

    $result = $connection->prepare($strquery);
    $result->execute();
    $data = $result->fetch(PDO::FETCH_ASSOC);

    return $data;
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

  function addCustomers($customer, $connection){
    
    $result = selectOne('
      SELECT 
      id_customer, 
      client, 
      dete, 
      interest, 
      MIN(outstanding_capital) AS outstanding_capital 
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

  $customers = [
      'alfredo colombia', 
      'claris prima',
      'jonas',
      'martin busqueda',
      'nuris yaritsa',
      'zaida nairoby',
      'maria perlita',
      'wilkin locutorio',
      'maribel pld'
    ];

    for($i = 0; $i < count($customers); $i++){
      addCustomers($customers[$i], $connection);
    }





