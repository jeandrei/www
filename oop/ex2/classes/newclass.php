<?php

class NewClass {

	//Properties an methods goes here
	public $data = "I am a property called from NewClass";

	public function setNewProperty($newdata){
		$this->data = $newdata;
	}

	public function getProperty(){
		return $this->data;
	}

}


?>