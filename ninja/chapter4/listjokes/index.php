<?php
//1º CONECTAMOS NO BANCO DE DADOS
include '../connect/index.php';

//2º EXECUTAMOS A CONSULTA NO BD
try {
	$sql = 'SELECT joketext FROM joke';
	$result = $pdo->query($sql);
} catch (Exception $e) {
	$error = 'Error fetching jokes: ' . $e->getMessage();
	include 'error.html.php';
	exit();
}

//while ($row = $result->fetch()) poderia ser feito assim
foreach ($result as $row) //mas o correto é assim
{
	$jokes[] = $row['joketext'];
}

include 'jokes.html.php';

//$row = $result->fetch(); returns the next row in the result set as an array until there is no more rows so that it return false.
?>