<?php
//***********************************************faz a conexão com o banco de dados*******
try//tenta fazer a conexão com o banco de dados
{
	$pdo = new PDO('mysql:host=localhost;dbname=ijdb', 'ijdbuser', 'mypassword');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)//caso algo de errado ele pega o erro originao do php e joga para a variavel $e 
{						//atribui a mensagem de erro tratada na variavel $erro
	$error = "Unable to connect to the dattabase server";
	include "error.html.php";
	exit();
}
//*****************************************************************************************
?>