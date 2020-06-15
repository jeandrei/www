<?php

//ERANÇA
class User{
    protected $name;
    protected $age;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
}


// A CLASSE COSTOMER ERDA OS ATRIBUTOS DE USER
class Costomer extends User{
    // PROPRIEDADE EXCLUSIVA DE COSTOMER $BALANCE
    private $balance;

    // TEM UMA PROPRIEDADE A MAIS O BALANCE
    public function __construct($name, $age, $balance){
        //APLICAMOS AS PROPRIEDADES A CLASSE PAI
        parent::__construct($name, $age);
        // APLICAMOS O VALOR A PROPRIEDADE EXCLUSIVA
        $this->balance = $balance;
    }

    public function pay($amount){
        return $this->name . ' paid $' . $amount;
    }

    public function getBalance(){
        return $this->balance;
    }
}

$costomer1 = new Costomer('John', 33, 500);

echo $costomer1->pay(100);

echo '<br>Balance is ' . $costomer1->getBalance();
?>