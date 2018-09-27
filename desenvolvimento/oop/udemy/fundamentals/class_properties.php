<?php


class Cars{

	var $wheel_count =4;
	var $door_count = 4;
	
	function car_detail()
	{
		return "This car has " . $this->wheel_count . " wheels.<br />";
	}


	
}

$bmw = new Cars();
$mercedes = new Cars();

//echo $bmw->whell_count = 10 . "<br>";
echo $mercedes->car_detail();
echo $bmw->car_detail();

?>