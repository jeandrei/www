<?php

ob_start(); 
include("init.php"); 

$usuario = new User();
$variavel = $usuario->find_this_query("SELECT * FROM users");



echo("<br><hr>");
var_dump($variavel);
?>