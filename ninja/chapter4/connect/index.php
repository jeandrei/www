<?php
/*
UTILIZAMOS O MÉTODO TRY CATCH PARA VERIFICAR SE A CONEXÃO FOI BEM SUCEDIDA
try
{
1 CRIAMOS O OBJETO DE CONEXÃO COM O BANCO
$pdo = new PDO('mysql:host=localhost;dbname=ijdb', 'ijdbuser',
'mypassword');
2 what we’re saying with this line is that we want to set the PDO attribute that controls the error mode (PDO::ATTR_ERRMODE) to the mode that throws exceptions (PDO::ERRMODE_EXCEPTION)
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
3 we need to configure the character encoding of our database connection, you should use UTF-8
$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
$output = 'Unable to connect to the database server.';
include 'output.html.php';
exit();
}
*/
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=ijdb','ijdbuser','mypassword');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	$output = 'Unable to connect to the database server.' . $e->getMessage();
	//$e->getMessage() mostra a mensagem pega no PDOException para que o desenvolvedor saiba qual o problema essa opção pode ser removida após finalizar o projeto ou nesse caso a conexão com o banco para evitar menságens de erro do php.
	include 'output.html.php';
	exit();
}
$output = 'Database connection established.';
include 'output.html.php';

//$pdo = null; disconnect from the database server
?>