<?php
require_once 'config.inc.php';
	$host = DB_HOST;
	$user = DB_USER;
	$pass = DB_PASS;
	$dbname = DB_NAME;

	//$pdo = ('mysql:host='.DB_HOST.';dbname='.DB_NAME. DB_USER. DB_PASS);
	//die(var_dump($pdo));

	

try
{
	//www_db_1 e o nome do container no docker
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);	
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	$output = 'Problemas ao tentar conectar com o banco de dados!' . $e->getMessage();	
	include_once 'output.html.php';
	exit();
}
?>