<?php
try
{
	//www_db_1 e o nome do container no docker
	$pdo = new PDO('mysql:host=db;dbname=ijdb','root','rootadm');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	$output = 'Unable to connect to the database server.' . $e->getMessage();	
	include_once 'output.html.php';
	exit();
}
?>