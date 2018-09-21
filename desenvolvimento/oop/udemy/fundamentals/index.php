<?php
class Cars {
	function gretting(){

	}

}

echo "<br>************************* Classes *********************************";
//Listar todas as classes existentes
$my_classes = get_declared_classes();

foreach ($my_classes as $class) {
	echo "<br>" . $class;
}
//**********************************

echo "<br>************************* Métodos *********************************";

//Listar todos os métodos de uma classe
$the_methods = get_class_methods('Cars');

foreach ($the_methods as $method) {
	echo "<br>" . $method;
}


?>