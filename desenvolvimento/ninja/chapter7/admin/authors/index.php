<?php
include_once('../../includes/constants.inc.php');


//****************************DELETE AUTHOR********************************
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
	include INCLUDES . '/db.inc.php';
	//Get jokes belonging to author
	
	try 
	{
		$sql = 'SELECT id FROM joke WHERE authorid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		//$s->execute();
	} 
	catch (Exception $e) 
	{
		$error = 'Error getting list of jokes to delete.';
		include 'error.html.php';
		exit();
	}
	// $result = $s->fetchAll() By calling this method on our prepared statement ( $s ), we ask PHP to retrieve the entire set of results for the query and store them in a PHP array ( $result ):
	$result = $s->fetchAll();

	//Delete joke category entries
	try 
	{	//feito assim pq como resultado da pesquisa na tablea joke vai vim ids diferentes por exemplo 1 e 2 logo não tem como remover todos com um único comando
		$sql = 'DELETE FROM jokecategory WHERE jokeid = :id';
		$s = $pdo->prepare($sql);

		//For each joke
		foreach ($result as $row) 
		{
			$jokeId = $row['id'];
			$s->bindValue(':id', $jokeId);
			//$s->execute();
		}		
	} catch (Exception $e) 
	{
		$error = 'Error deleting category entries for joke.';
		include 'error.html.php';
		exit();
	}

	//Delete jokes belonging o author
	try 
	{
		$sql = 'DELETE FROM joke WHERE authorid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		//$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error deleting jokes for author.'	;
		include 'error.html.php';
		exit();
	}

	//Delete the author
	try 
	{
		$sql = 'DELETE FROM author WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		//$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error deleting author.';
		include 'error.html.php';
		exit();
	}
header('Location: .');
exit();
}

//**********************************************************************


//**************************LIST AUTHOR***********************************
include INCLUDES . '/db.inc.php';
try 
{
	$result = $pdo->query('SELECT id, name FROM author');
} catch (Exception $e) 
{
	$error ='Error fetching authors from the database!'	;
	include 'error.html.php';
	exit();
}

foreach ($result as $row) 
{
	$authors[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'authors.html.php';
//********************************************************************
?>