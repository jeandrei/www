<?php
/*
|| ou
&& e
*/


	/*
	function greet(){
		echo 'Hello world';
	}
	*/
	/*
	function greet($name){
		echo 'Hello '. $name;
	}
	*/

	/*
	function greet($greeting, $name='Jean'){
		echo mb_strtoupper($greeting. ' ' .$name . "<br \>");
	}
	greet('Whats Up', 'Brad');
	greet('Whats Up');
	

	$num = 50;

	if($num == 40){
		echo 'Correct';
	}elseif($num == 50)
	{
		echo 'Correct';
	}else{
		echo 'Wrong';
	}
	*/

	class Pets{
		public $tipo = 'cão';
	}
	class User{
		/*
			Duas coisas principais vão dentro de uma classe 
			properties e methods
			properties são atributos com Nome, email, 
			methods são são funções dentro da classe método e função é a mesma coisa aqui
		*/


//***************PROPERTIES**********************
		public $id;
		public $username;
		public $email;
		public $password;	

		/*
		public pode acessar em qualquer lugar
		private geralmente se deixa as propriedades private e os methodos public private só pode ser acessado dentro da classe
		protected pode ser estendido para outras classes
		*/	
//***************METHODS*************************
		//__construct executa sem ser chamada toda vez que a classe é isntanciada
		public function __construct($username, $password){
			//$this->username da classe lá de cima
			//$username aqui do method
			//então quando o username e o password vem pelas variáveis do método e o método coloca o valor na propriedade da classe e por fim a função auth_user pega o valor da propriedade da classe $this->username.
			$this->username = $username;
			$this->password = $password;			
		}

		public function register(){
			echo 'User Registerd';
		}

		//executando um método a partir de outro método $this-> significa dentro da classe
		public function login(){			
			$this->auth_user();			
		}

		public function auth_user(){
			echo $this->username. ' is authenticated';
		}

		//Serve para encerrar destruir uma instancia, pode ser usado para encerrar a conexão com o bd
		public function __destruct(){
			//echo "Destructor Calld";
		}
	}

//Instanciar a classe $User a variávil onde estamos instanciando e new User é a classe
$User = new User('Jean', 'senha@123');

//$User->register();
$User->login();

echo "<br>";

$Pets = new Pets;
echo $Pets->tipo;
?>