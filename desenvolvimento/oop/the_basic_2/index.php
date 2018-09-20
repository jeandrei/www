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
	$mercedes = new Car("Mercedes benz");
	//define o modelo do carro
	//$mercedes -> setModel("Mercedes benz");
	//recupera o modelo do carro
	echo $mercedes -> getModel();

	$car1 = new Car("Mercedes");

	echo $car1 -> getCarModel();
?>
</body>
</html>