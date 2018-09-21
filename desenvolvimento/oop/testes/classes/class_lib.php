<?php

class Pessoa
{
	private $nome = "N/A";

	function __construct($nome = null)
	{
		if($nome)
		{			
			$this->nome = $nome;
			//$nome = $this->setNome("Dexter");
			echo "oi o conteúdo da função getnome é: " . $this->getNome();"<br>";
		}
	}


	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}
}

class Car {//Classe Pai
	protected $model; //protected pode ser acessada pelas classes filho

	public function setModel($model)
	{
		$this->model = $model;
	}

	public function getModel()
	{
		return $this->$model;
	}

	public function hello() //final public function hello() impede que os filhos dessa classe sobescrevão a função
	{
		return "beep";
	}

	
}

class SportsCar extends Car {//Classe filho, herda todas as propriedades e métodos
							// da classe pai que não seja private
	private $style = 'fast and furious';

	public function driveItWithStyle()
	{
		return 'Drive a ' . $this->getModel(). ' <i>' . $this->style . '</i>';
	}

	public function hello() //sobescreve a função helo da classe pai
	{
		return "beep! I am a <i>" . $this->model . "</i><br />";
	}

}



?>