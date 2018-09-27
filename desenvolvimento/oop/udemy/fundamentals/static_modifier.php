<?php


class Cars{

	static $wheel_count = 4;
	static $door_count = 4;//ao definir como estático temos que acessar 
							//Com a classe::propriedade ex: Cars::$dor_count
	
	
	
	static function car_detail()
	{
		echo Cars::$wheel_count;//não pode usar o $this se for static
		echo Cars::$door_count;		
	}


	
}

$bmw = new Cars();
echo Cars::$door_count;
Cars::car_detail();
?>