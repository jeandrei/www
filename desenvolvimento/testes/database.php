<?php

require_once("new_config.php");


class Database {

	public $connection;

	function __construct(){
		$this->open_db_connection();
	}

	/*
	mysqli_connect_errno()
	Irá retornar o número do código de erro da ultima chamada a função mysqli_connect(). Se não houve erro, esta função irá retornar zero. 
	*/
	public function open_db_connection(){
	//$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if($this->connection->connect_errno){
			die("Database connection failed badly" . $this->connection->connect_erro);

		}	
	}


	public function query($sql){
		$result = $this->connection->query($sql);
		$this->confirm_query($result);
	return $result;
	}


	private function confirm_query($result){
		if(!$result){
			die("Query Failed" . $this->connection->error);
		}
	}

	/*
	real_escape_string
	This function is used to create a legal SQL string that you can use in an SQL statement. The given string is encoded to an escaped SQL string, taking into account the current character set of the connection.
	Preparação da variável antes da execução dentro de uma sql.
	se tentar executar direto como no exemplo abaixo vai dar erro
	
	$city = "'s Hertogenbosch";
	
	$mysqli->query("INSERT into myCity (Name) VALUES ('$city')"));
	NÃO VAI FUNCIONAR

	TEM QUE PRIMEIRO PREPARAR A VARIÁVEL
	$city = $mysqli->real_escape_string($city);
	
	PARA DEPOIS EXECUTAR NA QUERY 
	$mysqli->query("INSERT into myCity (Name) VALUES ('$city')"));	
	*/
	public function scape_string($string){
		$escape_string = $this->connection->real_escape_string($string);
		return $escape_string;
	}

	public function the_insert_id(){
		return $this->connection->insert_id;
	}

}

$database = new Database();

?>