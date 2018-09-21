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
	private $model;

	public function setModel($model)
	{
		$this->model = $model;
	}

	public function getModel()
	{
		return $this->$model;
	}

	
}

class SportsCar extends Car {//Classe filho, herda todas as propriedades e métodos
							// da classe pai que não seja private
	private $style = 'fast and furious';

	/*public function driveItWithStyle()
	{
		return 'Drive a ' . $this->getModel(). ' <i>' . $this->style . '</i>';
	}*/

	public function hello(){
		return "beep! I am a <i>" . $this->modejhl . "</i><br />";
	}

}



?>