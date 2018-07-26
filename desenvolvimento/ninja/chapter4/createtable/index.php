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


//2º EXECUTAMOS A SQL PARA CRIAÇÃO DA TABELA
try {
	$sql = 'CREATE TABLE joke (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		joketext TEXT,
		jokedate DATE NOT NULL
    	) DEFAULT CHARACTER SET utf8 ENGINE=InnorDB';
    $pdo->exec($sql);
} catch (Exception $e) {
	$output = 'Error creating joke table: ' . $e->getMessage();
	include 'output.html.php';
	exit();
}
$output = 'Joke table successfully created. ';
include 'output.html.php';
?>