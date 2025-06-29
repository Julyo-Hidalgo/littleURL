<?php

class BusinessRuleException extends RuntimeException{
}

class SlugCrc32CollisionException extends BusinessRuleException{
	protected $duplicatedSlug;
	protected $url;

	function __construct(string $duplicatedSlug, string $url){
		$this->duplicatedSlug = $duplicatedSlug;
		$this->url = $url;
	}

	function getDuplicatedSlug (){
		return $this->duplicatedSlug;
	}

	function getUrl(){
		return $this->url;
	}
}
