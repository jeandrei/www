<?php
	//primeiro tem que incluir os parents
	//include 'classes/parentclass.php';
	include 'classes/newclass.php';

	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$object1 = new NewClass;
	
	$object2 = new NewClass;

	echo $object1->data . "</br>";

	$object1->setNewProperty("I'm a property changed belonging to object1" . "</br>");
	echo $object1->getProperty();


	$object2->setNewProperty("I'm a property changed belonging to object2" . "</br>");
	echo $object2->getProperty();

	//echo $data;
?>
</body>
</html>