<!DOCTYPE html>
<html>
<head>
	<title>Básico programação OOP PHP</title>
	<?php //Passso 7 Incluimos nossas classes na pagina principal 
	include("class_lib.php"); 
	?>
</head>
<body>
<?php

//Passo 8 Instanciamos/Criamos nosso objeto.
//$stefan = new person();

//Passo 9 a palavra chave new
//podemos criar vários objetos da mesma classe
//no ponto de vista do php cada objeto é sua própria entidade
//os dois são da mesma classe person mas são objetos totalmente diferentes
//$jimmy = new person();
$stefan = new person("Stefan Mischook");
$jimmy = new person("Nick Waddles");

/*Passo 10 Alteramos as propriedades dos objetos
utilizando os métodos*/
//$stefan->set_name("Stefan Mischook");
//$jimmy->set_name("Nick Waddles");

/*
Passo 11 Acessando os dados de um objeto
*/
echo "Stefan's full name: " . $stefan->get_name();
echo "<br>Nick's full name: " . $jimmy->get_name();

/*
Passo 12 Nunca acesse uma propriedade diretamente, pode ser feito, mas não é uma boa prática
Como no exemplo acima echo "Stefan's full name: " . $stefan->name;
Ao invés crie um método para recuperar o valor desta propriedade neste caso get_name
echo "Stefan's full name: " . $stefan->get_name();
*/


?>
</body>
</html>