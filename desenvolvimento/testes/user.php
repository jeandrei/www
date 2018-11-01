<?php


class User{

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	

	//aula 46
	public static function find_this_query($sql){
		global $database;
		$result_set = $database->query($sql);
		$the_object_array = array();
		

		/*
		
		mysqli_fetch_array($result_set) 
		retorna essa parte vai para o método 
		instantiation 
		array(10) { [0]=> string(1) "1" ["id"]=> string(1) "1" [1]=> string(4) "rico" ["username"]=> string(4) "rico" [2]=> string(3) "123" ["password"]=> string(3) "123" [3]=> string(4) "John" ["first_name"]=> string(4) "John" [4]=> string(3) "Doe" ["last_name"]=> string(3) "Doe" } 


		*/


		while($row = mysqli_fetch_array($result_set)){			
			$the_object_array[] = self::instantiation($row);
		}

		return $the_object_array;
		
	}





	//instanciamos a classe
	public static function instantiation($the_record){
		$the_object = new self();
		

		/*
		$the_object e $the_record 
		vai ter com esses valores
		object(User)#5 (5) { ["id"]=> NULL ["username"]=> NULL ["password"]=> NULL ["first_name"]=> NULL ["last_name"]=> NULL } object(User)#5 (5) { ["id"]=> NULL ["username"]=> NULL ["password"]=> NULL ["first_name"]=> NULL ["last_name"]=> NULL } object(User)#5 (5) { ["id"]=> NULL ["username"]=> NULL ["password"]=> NULL ["first_name"]=> NULL ["last_name"]=> NULL } 
		*/
		

        foreach ($the_record as $the_attribute => $value) {
        						//["username"] => JEAN        	
        	if($the_object->has_the_attribute($the_attribute)){
        		$the_object->$the_attribute = $value;        	
        	}
        	
        }

        return $the_object;

	}

	private function has_the_attribute($the_attribute){
		$object_propertis = get_object_vars($this);//traz todas as propriedades do objeto	
		return array_key_exists($the_attribute, $object_propertis);	

	}


}




?>
