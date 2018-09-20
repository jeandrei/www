<?php
class Car{
	private $model = "N/A"; //definimos como privet pois queremos permitir apenas alguns modelos de carro.
					//se deixassemos como public poderia ser acessado diretamente e
					//não teríamos como controlar/validar os valores atribuidos

	
	//para evitar erros na construct definimos um valor null para a variáivel
	//e só atribuimos um novo valor se este for passado como parâmetro
	public function __construct($model = null)
	{
		if($model)
		{
			$this->model = $model;
		}
	}


	/*
	Magic constants
	__CLASS__ Retorna a classe
	__FILE__ Retorna o caminho ou o nome de um arquivo
	__METHOD__ Retorna o nome do metodo que a constante está usando

	*/
	public function getCarModel(){		
		return "<br> The " . __CLASS__ . " model is: " . $this->model;
	}


	//a função sim criamos como pública pois ela vai validar a entrada dos dados
	public function setModel($model)
	{
		$allowedModels = array("Mercedes benz","BMW");//apenas estes modelos serão permitidos

		if(in_array($model, $allowedModels))
		{
			$this -> model = $model;
		}
		else
		{
			$this -> model = "not in our list of models.";
		}
	}

	public function getModel()
	{
		return "The car model is " . $this -> model; 
	}

}
?>