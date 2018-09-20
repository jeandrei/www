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
?>