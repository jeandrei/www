<?php
//faz a leitura de todas as classes separadas em arquivos da pasta SPL
spl_autoload_register(function($class_name){
	include $class_name . '.php';
});

$foo = new foo;// tem que ser como no nome do arquivo se fizer com letra maiúscula aqui tbem vai ter que ser com  letra maiúscula
$bar = new bar;

$foo->sayHello();


?>