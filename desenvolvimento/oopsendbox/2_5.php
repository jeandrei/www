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
        // o que vai ter no this 
        // object(User)#1 (2) { ["name":"User":private]=> string(4) "Jean" ["age":"User":private]=> int(38) }
        // se passar no get __get('name')
        // a função property_exists vai procrar dentro do this por name
        // e vai trazer a propriedade que nesse caso é Jean
        if(property_exists($this, $property))
        return $this->$property;      
    }

    // __set MAGIC METHOD
    public function __set($property, $value){
        if(property_exists($this, $property)){
        $this->$property = $value;
        }
        return $this;
    }
    
}

$user1 = new User('Jean', 38);
//$user1->setName('Jeff');
//echo $user1->getName();
$user1->__set('age', 39);
echo $user1->__get('name');
echo '<br>';
echo $user1->__get('age');