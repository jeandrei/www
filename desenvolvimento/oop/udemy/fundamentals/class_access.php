<?php


class Cars{

	public $wheel_count =4; //qualquer classe acessa
	Private $door_count = 4;//apenas a classe acessa
	Protected $seat_count = 2;//a classe e as classes filha acessam
	
	
	function car_detail()
	{
		echo $this->wheel_count;
		echo $this->door_count;
		echo $this->seat_count;
	}


	
}

$bmw = new Cars();
//echo $bmw->wheel_count;
//echo $bmw->door_count;
echo $bmw->seat_count;
?>