<?php

class ShorteningModel
{
	public string $url, $slug;

	private function generateSlug(string $url){
		$slug = hash("crc32", $url);

		$dao = new ShorteningDAO;

		$check = $dao->selectUrlBySlug($slug);

		if(count($check) != 0){
			$newSlug = $this->generateSlug($slug);
			return $newSlug;
		}

		return $slug;
	}

	function save(string $url){
		$this->url = $url;

		include 'DAO/ShorteningDAO.php'; 

		$dao = new ShorteningDAO;
			
		$slug = $dao->selectSlugByUrl($url);
		if (count($slug) != 0){
			$this->slug = $slug[0];
			return $this->slug;
		}

		$this->slug = $this->generateSlug($this->url); 

		$dao->create($this);

		return $this->slug;
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
