<?php


class User{

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;


	public static function find_all_users(){
		//não colocamos o mysqli_fetch_array pois vamos usa-lo no formuláio.		
		return self::find_this_query("SELECT * FROM users");		
	}

	public static function find_user_by_id($user_id){
		//global $database;
		$result_set = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");
		//mysqli_fetch_array aqui pq vai retornar apenas um registro
		$found_user = mysqli_fetch_array($result_set);
		return $found_user;
	}

	//aula 46
	public static function find_this_query($sql){
		global $database;
		$result_set = $database->query($sql);
		//1 BUSCA TODOS OS VALORES DO BANCO QUE ATENDEM A PESQUISA
		$the_object_array = array();

		//2 PARA CADA LINHA RETORNADA NA PESQUISA FAZ O SEGUINTE
		while($row = mysqli_fetch_array($result_set)){
			//3 CRIA O OBJETO E ATRIBUI O VALOR DENTRO DE UM OUTRO ARRAY
			/*$the_object_array[] = ["id"]=> string(1) "1" ["username"]=> string(4) "rico" ["password"]=> string(3) "123" ["first_name"]=> string(4) "John" ["last_name"]=> string(3) "Doe" }
			chamando a função instantiation($the_record) na linha a seguir
			*/
			$the_object_array[] = self::instantiation($row);
			//como resultado temos o array $the_object_array[] com todos os campos e valores dentro do array.
		}

		return $the_object_array;
		/*
		 vai retornar todo o objeto e seus valores exemplo
		array(3) { [0]=> object(User)#9 (5) { ["id"]=> string(1) "1" ["username"]=> string(4) "rico" ["password"]=> string(3) "123" ["first_name"]=> string(4) "John" ["last_name"]=> string(3) "Doe" } [1]=> object(User)#10 (5) { ["id"]=> string(1) "2" ["username"]=> string(4) "Jean" ["password"]=> string(5) "12345" ["first_name"]=> string(8) "Jeandrei" ["last_name"]=> string(6) "Walter" } [2]=> object(User)#11 (5) { ["id"]=> string(1) "3" ["username"]=> string(3) "Dex" ["password"]=> string(3) "dog" ["first_name"]=> string(6) "Dexter" ["last_name"]=> string(5) "Mydog" } }
		
		$result = $usuario->find_this_query("SELECT * FROM users");
		foreach ($result as $usuario){
			echo $usuario->username ." ". $usuario->id . "<br>";
		}
		
		SENDO ASSIM POR EXEMPLO TEREMOS AQUI O VALOR DO ID, USERNAME, PASSWORD ETC.

		*/
	}

	//instanciamos a classe
	public static function instantiation($the_record){
		$the_object = new self();
       /*$the_record vai ter o valor
		array(3) { [0]=> object(User)#9 (5) { ["id"]=> string(1) "1" ["username"]=> string(4) "rico" ["password"]=> string(3) "123" ["first_name"]=> string(4) "John" ["last_name"]=> string(3) "Doe" } [1]=> object(User)#10 (5) { ["id"]=> string(1) "2" ["username"]=> string(4) "Jean" ["password"]=> string(5) "12345" ["first_name"]=> string(8) "Jeandrei" ["last_name"]=> string(6) "Walter" } [2]=> object(User)#11 (5) { ["id"]=> string(1) "3" ["username"]=> string(3) "Dex" ["password"]=> string(3) "dog" ["first_name"]=> string(6) "Dexter" ["last_name"]=> string(5) "Mydog" } }*/
       
        foreach ($the_record as $the_attribute => $value) {
        					   //["last_name"]=> string(5) "Mydog"
        	if($the_object->has_the_attribute($the_attribute)){
        		$the_object->$the_attribute = $value;
        	}
        	
        }

        return $the_object;
        /*vai retornar 
		 { ["id"]=> 1 ["username"]=> JEAN ["password"]=> 12345 ["first_name"]=> JEAN ["last_name"]=> WALTER }
        */

	}

	private function has_the_attribute($the_attribute){
		$object_propertis = get_object_vars($this);//traz todas as propriedades do objeto
		return array_key_exists($the_attribute, $object_propertis);

	}


}




?>