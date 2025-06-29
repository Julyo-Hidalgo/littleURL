<?php

include_once 'Exceptions/DatabaseExceptions.php'; 
include_once 'Exceptions/BusinessRuleException.php'; 

class ShorteningModel
{
	public string $url, $slug;

	function save(string $url){
		try{
			$this->url = $url;

			include_once 'DAO/ShorteningDAO.php';

			$dao = new ShorteningDAO;
				
			$slug = $dao->selectSlugByUrl($url);
			if (count($slug) != 0){
				$this->slug = $slug[0];
				return $this->slug;
			}

			if(!isset($this->slug))
				$this->slug = hash("crc32", $url);

			$dao->create($this);

			return $this->slug;
		}catch(DuplicateEntryException $e){
			if($e->getField() == "slug"){
				throw new SlugCrc32CollisionException($e->getValue(), $this->url);
			}else{
				print_r($e);
				exit();
			}
		}catch(DatabaseOperationException $e){
			print_r($e);
			exit();
		}
	}

	function searchURL(string $slug){
		try{
			$this->slug = $slug;

			include 'DAO/ShorteningDAO.php'; 

			$dao = new ShorteningDAO;

			$url = $dao->selectUrlBySlug($this->slug);

			if(count($url) == 0){
				echo 'Error 404';
				return 0;
			}

			$this->url = $url[0];

			return $this->url;
		}catch(Exception $e){
			echo $e;
		}
	}
}
