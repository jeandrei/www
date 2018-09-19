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
$stefan = new person();

//Passo 9 a palavra chave new
//podemos criar vários objetos da mesma classe
//no ponte de vista do php cada objeto é sua própria entidade
$jimmy = new person();



?>
</body>
</html>