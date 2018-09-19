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

*/

//Passo 1 separamos as classes em um arquivo separado, neste caso class.lib.php

//Passo 2 Criamos uma classe
class person {
	//Passo 3 Adicionamos dados na classe
	var $name;//Propriedade

	/*
	Passo 13 Constructor
	Constructor permite a inicialização de objetos.
	Ou seja atribui valores as propriedades quando inicia/cria um objeto.
	*/

	//Passo 4 Adicionamos funções a classe
	function set_name($new_name){	/*
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

	function get_name(){
		/*
			Passo 6
			$this é uma função embutida do php que aponta para o objeto corrente.
			neste caso $this->name vai apontar para a propriedade name deste objeto
		*/
		return $this->name;
	}

}



?>