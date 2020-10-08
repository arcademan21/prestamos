<?php  
	
	//URI BASE PROJECT
	const BASE_URL = 'http://localhost:8888/PROYECTOS_WEB/PRESTAMOS';

	//Connection configs
	const DB_HOST = 'localhost';
	const DB_NAME = 'prestamos';
	const DB_USER = 'root';
	const DB_PASSWORD = 'root';
	const DB_CHARSET = 'charset=utf8';

	//coins...
	const SPD = '.';
	const SPM = ',';
	const SMONEY = '€';

	//Time setings
	date_default_timezone_set('Europe/Madrid');
	
	setlocale(LC_TIME, 'es_ES.UTF-8'); // Unix
	//setlocale(LC_TIME, 'spanish'); // En windows
	setlocale(LC_MONETARY, 'es_ES.UTF-8');
	
	