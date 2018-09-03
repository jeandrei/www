<?php
//*****************************************************************CRIA A LISTA DE JOKES DO AUTOR PARA SER DELETADA****************
if(isset($_POST['action']) and $_POST['action'] == 'Delete')
{
	include_once $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';
	//Get jokes belonging to author
	try
		{
			$sql = 'SELECT id FROM joke WHERE authorid = :id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':id', $_POST['id']);
			$s->execute();
			$result = $s->fetchAll();
			echo "List of jokes to be deleted created";
		}
	catch (PDOExeption $e)
		{
			$error = 'Error getting list of jokes to delete.';
			include 'error.html.php';
			exit();
		}	
}
//************************************************************************************************************************************


//$result = $s->fetchAll();   No livro essa função está aqui, mas não sei porque não funciona aqui e sim na linha assima depois do $s->execute()

try
	{//Delete jokes categories entries
		$sql = 'DELETE FROM jokecategory WHERE jokeid = :id';
		$s=$pdo->prepare($sql);
		//For each joke
		foreach ($result as $row)
		{
			$jokeId = $row['id'];
			$s=bindValue(':id',$jokeId);
			$s->execute();
		}
	}
catch(PDOExeption $e)
	{
		$error = 'Error deleting category entries for joke.';
		include 'error.html.php';
		exit();
	}

// Delete jokes belonging to author
try
	{
		$sql = 'DELETE FROM joke WHERE authorid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
catch (PDOException $e)
	{
		$error = 'Error deleting jokes for author.';
		include 'error.html.php';
		exit();
	}

// Delete the author
try
	{
		$sql = 'DELETE FROM author WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
catch (PDOException $e)
	{
		$error = 'Error deleting author.';
		include 'error.html.php';
		exit();
	}
header('Location: .');
exit();
/*



//********************************************************************Display author list**************************************
include_once $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

try
{
	$result = $pdo->query('SELECT id, name FROM author');
}catch (PDOExeption $e)
{
	$error = 'Error fetching authors from the database!';
	include 'error.html.php';
	exit();
}

foreach ($result as $row) {
	$authors[] = array('id' => $row['id'], 'name' => $row['name']);
}
include 'authors.html.php';
/*Dentro do authors.html.php tem um link <a href="?add">Add new authors</a> que quando carrega a primeira vez não tem valor nenhum então não está setado
quando o usuário clica no link ele seta a variavel add através do metodo GET então no index fazemos a verificação se a variável esta setada e se sim carregamos o 
formulário para inserir outra joke como no exemplo abaixo
if (isset($_GET['add']))
	{
		formulariojoke.php;
		exit();
	}
****************************************************************************************************************************/
?>
