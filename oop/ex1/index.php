<?php
	//primeiro tem que incluir os parents
	include 'classes/parentclass.php';
	include 'classes/newclass.php';

	$object = new NewClass;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	echo $object->getname();
?>
</body>
</html>