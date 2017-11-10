<?php

class First{
	public $id = 23;
	protected $name = 'John Doe';

	public function saySomething($word){
		echo $word;
	}
}

//extende a classe First todas as propriedades para a classe second mas como name foi definido como protected ele só pode ser acessado dentro da classe e aqui como a classe second está extendida a first ela tem acesso mas fora dela não, por isso que se colocar fora da classe echo $second->name não vai aparecer
class Second extends First{
	public function getName(){
		echo $this->name;
	}
}

$second = new Second;

echo $second->getName();
//$second->getName();
//echo $second->name; essa linha não funciona pois $name está definido como protected logo apenas dentro da classe second eu tenho acesso, fora dela não, por isso eu crio uma função getName para pegar este valor.
?>