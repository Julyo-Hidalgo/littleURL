<?php

include_once 'Exceptions/BusinessRuleException.php'; 

class ShorteningController
{
	static function save(){
		try{
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
		}catch(SlugCrc32CollisionException $e){
				try{
					$model = new ShorteningModel;

					$newSlug = hash("crc32", $e->getDuplicatedSlug());
					$model->slug = $newSlug;

					$model->save($e->getUrl());
				}catch(SlugCrc32CollisionException $e){
					echo "Canceled operation!!!";
					print_r($e);
				}catch(BusinessRuleException $e){
					print_r($e);
					exit();
				}
		}catch(BusinessRuleException $e){
			print_r($e);
			exit();
		}
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
