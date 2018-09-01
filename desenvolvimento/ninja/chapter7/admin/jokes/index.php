<?php
include_once('../../includes/constants.inc.php');
include INCLUDES . '/magicquotes.inc.php';


//***********************************ADD A NEW JOKE***************************************
if (isset($_GET['add']))
{
	include INCLUDES . '/db.inc.php';
	$pageTitle = 'New Joke';
	$action = 'addform';
	$text = '';
	$authorid = '';
	$id = '';
	$button = 'Add joke';


	//Build the list of authors
	try 
	{
		$result = $pdo->query('SELECT id, name FROM author');
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching authors from the database';
		include 'error.html.php';
		exit();
	}


	foreach ($result as $row) 
	{	//a sacada para montar as listas está aqui sempre monta um array com o resultado da pesquisa
		$authors[] = array('id' => $row['id'], 'name' => $row['name']);	
	}


	//Build the list of categories
	try 
	{
		$result = $pdo->query('SELECT id, name FROM category');
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching categories from database';
		include 'error.html.php';
		exit();
	}


	foreach ($result as $row) 
	{
		$categories[] = array(
			'id' => $row['id'], 
			'name' => $row['name'], 
			'selected' => FALSE);
	}

include 'form.html.php';
exit();
}
//------------------------------------------------------------------------------------------------



//*****************************************WRITE THE JOKE INTO THE DATABASE***********************
if (isset($_GET['addform']))
{
	include INCLUDES . '/db.inc.php';

	if ($_POST['author'] == '')
	{
		$error = 'You must choose an author for this joke.
			Click &lsquo;back&rsquo; and try again.';
		include 'error.html.php';
		exit();
	}

	try 
	{
		$sql = 'INSERT INTO joke SET
				joketext = :joketext,
				jokedate = CURDATE(),
				authorid = :authorid';
		$s = $pdo->prepare($sql);
		$s->bindValue(':joketext', $_POST['text']);
		$s->bindValue(':authorid', $_POST['author']);
		$s->execute();		
	} catch (Exception $e) 
	{
		$error = 'Error adding submitted joke.';
		include 'error.html.php';
		exit();
	}

	$jokeid = $pdo->lastInsertID();
	if (isset($_POST['categories']))
	{
		try
		{
			$sql = 'INSERT INTO jokecategory SET
			jokeid = :jokeid,
			categoryid = :categoryid';
			$s = $pdo->prepare($sql);
			foreach ($_POST['categories'] as $categoryid)
			{
				$s->bindValue(':jokeid', $jokeid);
				$s->bindValue(':categoryid', $categoryid);
				$s->execute();					
			}
		}
		catch (PDOException $e)
		{
			$error = 'Error inserting joke into selected categories.';
			include 'error.html.php';
			exit();
		}
	}
header('Location: .');
exit();
}

//------------------------------------------------------------------------------------------------



//*************************************EDITING JOKES**********************************************
if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
	include INCLUDES . '/db.inc.php';
	try 
	{
		$sql = 'SELECT id, joketext, authorid FROM joke WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching joke details.';
		include 'error.html.php';
		exit();
	}
	$row = $s->fetch();

	$pageTitle = 'Edit Joke';
	$action = 'editform';
	$text = $row['joketext'];
	$authorid = $row['authorid'];
	$id = $row['id'];
	$button = 'Update Joke';

	//Build the list of authors
	try 
	{
		$result = $pdo->query('SELECT id, name FROM author');
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching authors from the database';
		include 'error.html.php';
		exit();
	}


	foreach ($result as $row) 
	{	//a sacada para montar as listas está aqui sempre monta um array com o resultado da pesquisa
		$authors[] = array('id' => $row['id'], 'name' => $row['name']);	
	}

	// Get list of categories containing this joke
	try 
	{
		$sql = 'SELECT categoryid FROM jokecategory
		WHERE jokeid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $id);
		$s->execute();
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching list of selected categories.';
		include 'error.html.php';
		exit();
	}

	foreach ($s as $row) 
	{
		$selectedCategories[] = $row['categoryid'];
	}

	//Build the list of all categories
	try 
	{
		$result = $pdo->query('SELECT id, name FROM category');		
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching lis of categories.';
		include 'error.html.php';
		exit();
	}

	foreach ($result as $row) 
	{
		$categories[] = array(
			'id' => $row['id'],
			'name' => $row['name'],
			'selected' => in_array($row['id'], $selectedCategories));
	}

	include 'form.html.php';
	exit();
}
//------------------------------------------------------------------------------------------------



//************************************WRITE DATE EDITING JOKE*************************************
if (isset($_GET['editform']))
{
	include INCLUDES . '/db.inc.php';
	if ($_POST['author'] == '')
	{
		$error = 'You must choose an author for this joke.
			Click &lsquo;back&rsquo; and try again.';
		include 'error.html.php';
		exit();
	}

	try 
	{
		$sql = 'UPDATE joke SET
		joketext = :joketext,
		authorid = :authorid
		WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->bindValue(':joketext', $_POST['text']);
		$s->bindValue(':authorid', $_POST['author']);		
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error updating submitted joke.';
		include 'error.html.php';
		exit();	
	}

	try 
	{
		$sql = 'DELETE FROM jokecategory WHERE jokeid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error removing obsolete joke category entries.';
		include 'error.html.php';
		exit();
	}

	if (isset($_POST['categories']))
	{
		try 
		{
			$sql = 'INSERT INTO jokecategory SET
			jokeid = :jokeid,
			categoryid = :categoryid';
			$s = $pdo->prepare($sql);

			foreach ($_POST['categories'] as $categoryid) 
			{
				$s->bindValue(':jokeid', $_POST['id']);
				$s->bindValue(':categoryid', $categoryid);
				$s->execute();
			}

		} catch (Exception $e) 
		{
			$error = 'Error inserting joke into selected categories.';
			include 'error.html.php';
			exit();	
		}
	}					
header('Location: .');
exit();
}
//------------------------------------------------------------------------------------------------


if(isset($_GET['action']) and $_GET['action'] == 'search')
{
	include INCLUDES . '/db.inc.php';
	//The basic statement	
	$select = 'SELECT id, joketext';
	$from = ' FROM joke';
	$where = ' WHERE TRUE';	


	$placeholders = array();

	if($_GET['author'] != '')
	{
		$where .= " AND authorid = :authorid";
		$placeholders[':authorid'] = $_GET['author'];
	}

	if($_GET['category'] != '')
	{
		$from .= ' INNER JOIN jokecategory ON id = jokeid';
		$where .= " AND categoryid = :categoryid";	
		$placeholders[':categoryid'] = $_GET['category'];
	}



	if($_GET['text'] != '')
	{
		$where .= " AND joketext LIKE :joketext";	
		$placeholders[':joketext'] = '%' . $_GET['text'] . '%';	
	}

	try 
	{
		$sql = $select . $from . $where;
		$s = $pdo->prepare($sql);
		$s->execute($placeholders);
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching jokes.';
		include 'error.html.php';
		exit();
	}

	foreach ($s as $row) 
	{
		$jokes[] = array('id' => $row['id'], 'text' => $row['joketext']);
	}
	include 'jokes.html.php';

	if(empty($jokes))
	{
		$error = 'No record satisfy your query';
		include 'error.html.php';
	}

exit();
}
include 'searchform.html.php';
?>