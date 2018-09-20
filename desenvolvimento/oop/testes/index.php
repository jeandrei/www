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

$jeandrei = new Pessoa("Jeandrei");


echo "<br>O nome da pessoa é: " . $jeandrei->getNome();



?>
</body>
</html>