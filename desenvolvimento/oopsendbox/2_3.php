<?php
    //Define a class
    class User{
        //Properties (attributes)
        public $name = 'Brad';
        //Methds (functions)
        public function sayHello(){
            return $this->name . ' Says Hello';
        }
    }

    // Instantiate a user object from the user class
    $user1 = new User();

    $user1->name ='Brad';
    echo $user1->name;
    echo '<br>';
    echo $user1->sayHello();

    // Create new user
    $user2 = new User();
    $user2->name ='Jean';
    echo '<br>';
    echo $user2->name;
    echo '<br>';
    echo $user2->sayHello();