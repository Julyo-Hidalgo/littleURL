<?php

class ShorteningController
{
	static function save(){
		include 'Model/ShorteningModel.php';

		$model = new ShorteningModel;

		$url = $_POST['url'];

		if($url == NULL){
			$error = true;

			include VIEW . 'ShorteningForms.php';

			exit(1);
		}

		if(substr($url, 0, 4) != "http"){
			$url = "https://" . $url;
		}

		$return = $model->save($url);

		$slug = $return;

		$domain = $_SERVER['HTTP_HOST'];

		$newUrl = $domain . '/' . $slug;

		include VIEW . 'Shortener.php';
	}

	static function searchURL(){
		include 'Model/ShorteningModel.php';

		$model = new ShorteningModel;

		$slug = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		$slug = ltrim($slug, "/");

		$url = ($return = $model->searchURL($slug)) ? $return : "/error404"; 

		echo "Redirecting to " . $url;

		header("Location: " . $url);
	}
}
