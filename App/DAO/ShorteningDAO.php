<?php

class ShorteningDAO
{
	private $pdo;

	function __construct(){
		try {
			$this->pdo = new PDO("mysql:host=" . $_ENV["DB"]["HOST"] . ":" . $_ENV["DB"]["PORT"] . ";dbname=" . $_ENV["DB"]["NAME"], $_ENV["DB"]["USER"], $_ENV["DB"]["PASS"]); 
		} catch (PDOException $e) {
			echo $e;
		}
	}

	function create(ShorteningModel $model){
		$stmt = $this->pdo->prepare("INSERT INTO Shortening (url, slug) VALUES (:url, :slug)");

		$stmt->bindParam(":url", $model->url);
		$stmt->bindParam(":slug", $model->slug);

		return $stmt->execute();
	}	

	function selectSlugByUrl(string $url){
		try{
			$stmt = $this->pdo->prepare("SELECT slug FROM Shortening WHERE url = :url");

			$stmt->bindParam(":url", $url);

			$stmt->execute();
		
			$return = $stmt->fetchAll(PDO::FETCH_COLUMN);

			return $return;

		} catch (PDOException $e) {
			echo $e;
		}
	}	

	function selectUrlBySlug(string $slug){
		try{
			$stmt = $this->pdo->prepare("SELECT url FROM Shortening WHERE slug = :slug");

			$stmt->bindParam(":slug", $slug);

			$stmt->execute();
		
			$return = $stmt->fetchAll(PDO::FETCH_COLUMN);

			return $return;

		} catch (PDOException $e) {
			echo $e;
		}
	}	
}
