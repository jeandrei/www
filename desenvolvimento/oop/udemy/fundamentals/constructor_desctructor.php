<?php


class Cars{

	public $wheel_count =4; //qualquer classe acessa
	static $count = 1;
	
	
	function __construct()
	{
		echo $this->wheel_count;		
		echo self::$count++ . "<br \>";
	}


	
}

$bmw = new Cars();
$mercedes = new Cars();
$porsh = new Cars();
?>