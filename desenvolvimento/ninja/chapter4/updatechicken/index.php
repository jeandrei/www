<?php
//1º CONECTAMOS NO BANCO DE DADOS
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=ijdb','ijdbuser','mypassword');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	$output = 'Unable to connect to the database server.' . $e->getMessage();	
	include 'output.html.php';
	exit();
}
$output = 'Database connection established.';
include 'output.html.php';


//2º EXEMPLO DE ATUALIZAÇÃO NO BANCO COM RENTORNO DE NÚMERO DE REGISTROS AFETADOS
try {
	$sql = 'UPDATE joke SET jokedate="2018-06-07"
	        WHERE joketext LIKE "%chicken%"';
	$affectedRows = $pdo->exec($sql);
} catch (Exception $e) {
	$output = 'Error performing update: ' . $e->getMessage();
	include 'output.html.php';
	exit();
}
$output = "Update $affectedRows rows.";
include 'output.html.php';
?>