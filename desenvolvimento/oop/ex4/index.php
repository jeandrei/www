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
	$object = new NewClass;	
	echo $object;
?>
</body>
</html>