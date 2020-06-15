<?php

/*
    Uma classe é como se fosse o projeto de um carro
    a partir do projeto podemos construir várias carros iguais que serão os objetos

    Cada classe tem seus atributos como o carro cor, rodas, motor, direção

    e os metodos são as funções que o carro consegue executar como ligar, acelerar, frear

*/

//Defaine a class
class User{

    //Propreties (atributes)
    public $name;

    // Methods (functions)
    public function sayHello(){
        return $this->name . ' Says Hello' . "<br>";
    }

}

// Instantiate a user object from the user class
$user1 = new User;
$user1->name = "Jeandrei Walter";
echo $user1->sayHello();

// Create a second user
$user2 = new User;
$user2->name = "Dexter";
echo $user2->sayHello();



?>