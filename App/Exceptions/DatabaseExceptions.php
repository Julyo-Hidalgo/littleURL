<?php

class DatabaseOperationException extends RuntimeException{
}

class DuplicateEntryException extends DatabaseOperationException{
	protected $field;
	protected $value;

	function __construct(string $field, mixed $value){
		$this->field = $field;
		$this->value = $value;
	}

	function getField(){
		return $this->field;
	}

	function getValue(){
		return $this->value;
	}
}
