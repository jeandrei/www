<?php


class Cars{

	static $wheel_count = 4;
	static $door_count = 4;//ao definir como estático temos que acessar 
							//Com a classe::propriedade ex: Cars::$dor_count
	
	
	
	static function car_detail()
	{
		return self::$wheel_count;//não pode usar o $this se for static
		return self::$door_count;		
	}


	
}

class Trucks extends Cars{

	static function display()
	{
		echo parent::car_detail();// se o metodo da classe pai for static para chamar o meteodo da classe pai usamos 
									//parent
	}

}

Trucks::display();


?>