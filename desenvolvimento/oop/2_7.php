<?php

class User{
    public $name;
    public $age;
    public static $minPassLength = 6;

    public static function validatePass($pass){
        // para pegar um valor estático dentro da classe deve se usar self:: 
        // e não $this
        if(strlen($pass) >= self::$minPassLength){
            return true;
        } else {
            return false;
        }
    }
}


$password = 'hello';
// para utilizar uma função estática não precisa instanciar
// pode chamar direto classe::função
if(User::validatePass($password)){
    echo 'Password valid';
} else {
    echo 'Password NOT valid';
}


?>