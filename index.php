<?php session_start();

	require_once 'Config/Config.php';
	require_once 'Helpers/Helpers.php';
	
	$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
	$expUrl = explode('/', $url);

	$controller = $expUrl[0];
	$method = $expUrl[0];
	$params = '';

	if(!empty($expUrl[1]) and $expUrl[1] != ''){
		$method = $expUrl[1];
	}

	if(!empty($expUrl[2]) and $expUrl[2] != ''){
		for($i=2; $i < count($expUrl); $i++){ 
			$params .= $expUrl[$i].',';
		}
		$params = trim($params, ',');
	}

	require_once 'Libraries/Core/Autoload.php';
	require_once 'Libraries/Core/Load.php';

		
	
	

	



















