<?php
//parei na página 79
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
// and && or ||
	
if ($firstName == 'Jeandrei' and $lastName == 'Walter')
{
	echo "Welcome, ho glorious leadder!";
}else
{
	echo 'Welcome to our website, ' . 
	htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') . ' ' .
	htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8') . '!';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Name</title>
</head>
<body><br>
Esses são os valores passados pelos métodos GET e POST:
<pre><?php echo print_r($_REQUEST); ?></pre>
</body>
</html>