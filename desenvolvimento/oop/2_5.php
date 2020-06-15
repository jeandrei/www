<?php
  class User{
    private $name;
    private $age;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    // __get MAGIC METHOD
    public function __get($property){
        if(property_exists($this, $property)){
            //return $this->name retorna o que está dentro da variável $property
            return $this->$property;
        }
    }

    // __set magic method
    public function __set($propery, $value){
        if(property_exists($this, $propery)){
            $this->$propery = $value;
        }
        return $this;
    }
  

  }
$user1 = new User('John', 40);
//$user1->setName('Jeff');
//echo $user1->getName();

$user1->__set('age', 41);
echo $user1->__get('name') . ' is ' . $user1->__get('age') . ' years old.';

?>