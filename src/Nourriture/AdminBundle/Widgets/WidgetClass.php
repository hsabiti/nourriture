<?php


class WidgetClass{
	
	private $name = null;
	
	public function __construct(){
		
	}
	public function setName($name){
	  $this->name = $name;
	}
	
	public function getName(){
	  return $this->name;
	}

}
