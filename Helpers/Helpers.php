<?php  

	function base_url(){
		return BASE_URL;
	}

	function media(){
		return BASE_URL.'/Assets';
	}

	function headerAdmin($data=''){
		$view_header = 'Views/Template/header_admin.php';
		require_once $view_header;
	}

	function footerAdmin($data=''){
		$view_header = 'Views/Template/footer_admin.php';
		require_once $view_header;
	}

	function dep($data){

		$format = print_r('<div class="container">');
			$format .= print_r('<div class="row">');
				$format .= print_r('<div class="col-md-12 preview-code">');
					$format .= print_r('<pre>');
					$format .= print_r($data);
					$format .= print_r('</pre>');
				$format .= print_r('</div>');
			$format .= print_r('</div>');
		$format .= print_r('</div>');

		return $format;
	
	}

	function getModal(string $nameModal, $data){
		$viewModal = 'Views/Template/Modals/'.$nameModal.'.php';
		require_once $viewModal;
	}

	function strClean($str){
		
		$string = preg_replace(['/\s+/','/^\s|\s$/'], [' ',''], $str);
		$string = trim($string);
		$string = stripcslashes($string);
		$string = str_replace('<script>', '', $string);
		$string = str_replace('</script>', '', $string);
		$string = str_replace('<script src>', '', $string);
		$string = str_replace('<script type=>', '', $string);
		$string = str_replace('SELECT * FROM', '', $string);
		$string = str_replace('DELETE FROM', '', $string);
		$string = str_replace('INSERT INTO', '', $string);
		$string = str_replace('SELECT COUNT(*) FROM', '', $string);
		$string = str_replace('DROP TABLE', '', $string);
		$string = str_replace("OR '1'='1'", '', $string);
		$string = str_replace('OR "1"="1"', '', $string);
		$string = str_replace('OR ´1´=´1´', '', $string);
		$string = str_replace('is NULL; --', '', $string);
		$string = str_replace('is NULL; --', '', $string);
		$string = str_replace("LIKE '", '', $string);
		$string = str_replace('LIKE "', '', $string);
		$string = str_replace("LIKE ´", '', $string);
		$string = str_replace("OR 'a'='a'", '', $string);
		$string = str_replace('OR "a"="a"', '', $string);
		$string = str_replace("OR ´a´=´a´", '', $string);
		$string = str_replace("OR ´a´=´a´", '', $string);
		$string = str_replace('--', '', $string);
		$string = str_replace('^', '', $string);
		$string = str_replace('[', '', $string);
		$string = str_replace(']', '', $string);
		$string = str_replace('==', '', $string);

		return $string;
	
	}

	function passGenerator($length=10){
		
		$pass = '';
		$longPass = $length;
		$chars = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz';
		$longStr = strlen($chars);

		for ($i=1; $i < $longPass; $i++) { 
			$pos = rand(0, $longStr-1);
			$pass .= substr($chars, $pos, 1);
		}

		return $pass;
	
	}

	function token(){
		
		$r1 = bin2hex(random_bytes(10));
		$r2 = bin2hex(random_bytes(10));
		$r3 = bin2hex(random_bytes(10));
		$r4 = bin2hex(random_bytes(10));
		$token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;

		return $token;

	}

	function formatMoney($mount){
		$mount = number_format($mount,2,SPD,SPM);
		return $mount;
	}












