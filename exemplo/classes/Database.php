<?php
/*

Realizar a pesquisa no banco
	$database->query('SELECT * FROM tabela');
	$rows = $database->resultset();
*/

class Database{
	private $host	=	'localhost';
	private $user	=	'root';
	private $pass	=	'rootadm';
	private $dbname = 	'myblog';

	private $dbh;//db heandler manipulador do banco
	private $error;
	private $stmt;//statemant

	public function __construct(){//__construct é executada toda vez que a classe é instanciada
		//set DSN CONNECTION STRING  a conexão é feita assim $pdo = new PDO('mysql:host=localhost;dbname=myblog', 'root', 'rootadm'); logo a linha abaixo está montando a conexão.
		$dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname;
		
		//Set Options Após a conexão com o bd correr com sucesso o banco PDO assume um modo silencioso, no qual fica difícil identificar quando um erro de conexão ocorre após a conexão. Basicamente o que estamos dizendo é para mudar do método PDO::ATTR_ERRMODE para o método PDO::ERRMODE_EXCEPTION.
		$options = array(
			PDO::ATTR_PERSISTENT		=> true,
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION		
		);
		//CREATE new PDO
		try{//aqui monta completo PDO('mysql:host=localhost;dbname=myblog', 'root', 'rootadm');
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch(PDOEception $e){//se der alguma exceção ele pega a menságem de erro e guarda na variável $e
			$this->error = $e->getMessage();
		}
	/*Funções de pesquisa no banco  
	a pesquisa é feita assim no exemplo
	$sql = 'UPDATE user SET
				password = :password
				WHERE id = :id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':password', $password);
			$s->bindValue(':id', $userid);
			$s->execute();
	sql: a consulta sql
	$s: a variável que vai receber a consulta preparada
	$s:bindValue vai adicionar os valores de variáveis a consulta
	$pdo: é a conexão com o banco de dados em nossa classe Database é a variável dbh
	então aqui em nossa classe Database
	$this->stmt - $s
	$this->dbh->prepare($query) -  $pdo->prepare($sql);
	
	Para o bind
	$this->stmt - $s
	bindValue($param, $value, $type) - bindValue(':password', $password) passando type como parametro

	Execução
	return $this->stmt->execute() - $s->execute();
	*/}//construct
	
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}
	
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}//shitch
		}//if
	$this->stmt->bindValue($param, $value, $type);
	}//bind
	
	public function execute(){
		return $this->stmt->execute();
	}//execute
	
	public function resultset(){
		//execute é a função logo acima
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}//resultset

}//class
?>