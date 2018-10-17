<?php
//classes abstratas 
abstract class Animal{
	public $name;
	public $color;

	public function describe(){
		return $this->name. ' is ' .$this->color;
	}

	abstract public function makeSound();//tirando essa linha não altera nada
}

class Duck extends Animal{
	public function describe(/*Traz o valor de describe da função da classe pai*/){
		return parent::describe();
	}
	public function makeSound(){
		return ' it Quacks';
	}
}

class Dog extends Animal{
	public function describe(){
		return parent::describe();
	}
	public function makeSound(){
		return ' it Barks';
	}
}

//como Animal é uma classe abstrata não instanciamos $animal = new Animal(); e sim como na linha abaixo
$animal = new Duck();
$animal->name = 'Ben';
$animal->color = 'Yellow';
echo $animal->describe();
echo $animal->makeSound();
?>