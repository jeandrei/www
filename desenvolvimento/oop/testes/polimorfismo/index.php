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

$circ = new Circle(3);
$rect = new Rectangle(3,4);

echo "A área do círculo com raio 3 é: " . $circ->calcArea();
echo "<br> A área de um retangulo 3x4 é: " . $rect->calcArea();

?>
</body>
</html>