<?php


class Cars{

	var $wheels = 4;
	
	
	function gretting()
	{
		return "hello <br \>";
	}


	
}

$bmw = new Cars();

class Trucks extends Cars{
	var $wheels = 10;

}


$tacoma = new Trucks();
echo $tacoma->gretting();
echo $tacoma->wheels;


?>