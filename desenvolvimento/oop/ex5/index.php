<?php
		include 'classes/users.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$users = new Users("Jeandrei", "Walter", "Castanho", "Verde");
	$users2 = new Users("Mari", "Walter", "Castanho", "Verde");	
	echo $users->fullName();
	echo $users2->fullName();
?>
</body>
</html>