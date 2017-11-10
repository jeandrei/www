<?php
class User{
	public $username;
	public static $minPassLength = 5;

	public static function validaPassword($password){
		if(strlen($password) >= self::$minPassLength){
			return true;
		}else{
			return false;
		}
	}
}

$password = 'pass';
//propriedades estáticas não precisa estanciar como $user = new user pode só usar o escopo de resolução :: Classe::
if(User::validaPassword($password)){
	echo 'Password is valid';
}else{
	echo 'Password is NOT valid';
}
?>