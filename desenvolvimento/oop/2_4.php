<?php
  class User{
      public $name;
      public $age;
      
      // Magic Methods Construct and Destruct 
      // Construct runs when an object is created
      public function __construct($name, $age){
          //Magic Constant __CLASS__ there is many
          echo 'Class ' . __CLASS__ . ' instantiated <br>';
          $this->name = $name;
          $this->age = $age;
      }

      // Called when no other references to a certain object
      // Used for cleanup, closing connections, etc
      public function __destruct(){
          echo '<br> destructor ran...';
      }

      public function sayHello(){
          return $this->name . ' Says Hello';
      }
  }

  $user1 = new User('Dexter', 10);
  echo $user1->name . ' is ' . $user1->age . ' years old';
  echo '<br>';
  echo $user1->sayHello();

?>