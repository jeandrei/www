<?php
//1º CONECTAMOS NO BANCO DE DADOS
include '../connect/index.php';


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