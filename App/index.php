<?php

include 'config.php';
include 'Controller/ShorteningController.php';

$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url_path){
	case '/':
		include VIEW . 'ShorteningForms.php';
		break;
	case '/form/shortening/save':
		ShorteningController::save();		
		break;
	case '/error404':
		include VIEW . '404.php';
		break;
	default:
		ShorteningController::searchURL();
		break;
}
