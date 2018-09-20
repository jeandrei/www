<?php
/*
 ____________
|			|->Objeto->metodo();
|	classe  |->Objeto->metodo();
|			|->Objeto->metodo();
|___________|

 ____________
|			|->cão->latir();
|	 cão    |->cão->andar();
|			|->cão->correr();
|___________|


CLASSES = são templates como se fosse um projeto, uma receita usados para gerar objetos, sendo que esses objetos podem executar tarefas ou seja métodos, mais que isso, uma das grandes diferenças entre funções e classes é que a classe tem as duas coisas, variáveis e funções que formam o que chamamos de objeto, quando criamos uma variavel detro de uma classe a chamamos de propriedade.
	Vantagens evita ter um monte de funções e variaveis flutuando ao redor do código.

OBJETOS = são o resultado gerado pela classe, se a classe fosse uma receita de bolo, o objeto seria o bolo, é a classe encapsulada.

METODOS = são ações executadas pelo objeto.

*/

//Passo 1 separamos as classes em um arquivo separado, neste caso class.lib.php

//Passo 2 Criamos uma classe
class person {
	//Passo 3 Adicionamos dados na classe
	public $name;//Propriedade

	/*
	Passo 13 Constructor
	Constructor permite a inicialização de objetos.
	Ou seja atribui valores as propriedades quando inicia/cria um objeto.
	Ao criar uma função construct() o php vai executa-la automaticamente
	quando criar o objeto.
	*/
	function __construct($persons_name) {
		 $this->name = $persons_name;
		}



	//Passo 4 Adicionamos funções a classe
	public function set_name($new_name){	/*
									Passo 5	
									Funções são chamadas de métodos.									
									Para nomear o método sempre use:
									função do método _ propriedade que será alterada
									neste caso set_name set define o valor name a propriedade
									depois fica fácil para usar o método pois saberemos que
									set_name altera o valor da propriedade name 
									*/
		$this->name = $new_name;
	}

	public function get_name(){
		/*
			Passo 6
			$this é uma função embutida do php que aponta para o objeto corrente.
			neste caso $this->name vai apontar para a propriedade name deste objeto
		*/
		return $this->name;
	}

}


/*
Passo 15 Restrição de acesso temos:
Passo 16 restringindo acesso
public - Não tem restrição de acesso, qualquer um pode acessar a propriedade.
private - Apenas a mesma classe pode acessar a propriedade.
protected - Apenas a classe e classes derivadas daquela classe pode acessar a propriedade
tem a ver com herança.
*/

/*
Herança permite a reutilização de código, pense o seguinte.
Temos uma classe person que representa pessoa e agora queremos criar uma classe employee para representar
empregado.
Empregado é uma pessoa, então empregado vai herdar propriedades de pessoa, logo podemos fazer isso com
oop.
*/ 
 class employee extends person {
 	function __construct($employee_name)
 		/*devido ao fato de employee ser baseado na classe person (herança)
		a nova classe employee passa a ter acesso a todas os métodos e propriedades
		da classe person, por isso posso usar o método set_name aqui
		Obs.: se for necessário que o método execute uma ação diferente do 
		método da classe pai, pode se criar novamente o método na nova classe
		ex: protected function set_name($new_name){ ... }
		Uma vez criado um novo método e for necessário executar o método da classe pai
		ex: estou dentro da classe employee tenho o método set_name da classe employee, mas
		quero executar a set_name da classe pai person.
		Faria assim:
		person::set_name($new_name); ou
		parent::set_name($new_name);
 		*/
 		$this->set_name($employee_name);
 }

?>