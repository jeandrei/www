<?php
include_once('../../includes/constants.inc.php');
include INCLUDES . '/db.inc.php';

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
{
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
	$categories[] = array('id' => $row['id'], 'name' => $row['name'], 'selected' => FALSE);
}

include 'searchform.html.php';


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
	//$where .= " AND authorid = :authorid";
	$where .= " AND authorid = " . $_GET['authorid'];
	$placeholders[':authorid'] = $_GET['authorid'];
}

if($_GET['category'] != '')
{
	$from .= ' INNER JOIN jokecategory ON id = jokeid';
	//$where .= " AND categoryid = :categoryid";
	$where .= " AND categoryid = " . $_GET['categoryid'];
	$placeholders[':categoryid'] = $_GET['categoryid'];
}

if($_GET['text'] =! '')
{
	//$where .= " AND joketext LIKE :joketext";
	$where .= " AND joketext LIKE %" . $_GET['joketext'] . '%';
	$placeholders[':joketext'] = '%' . $_GET['joketext'] . '%';
}
/*
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
}*/
echo $select . $from . $where;
include 'jokes.html.php';
exit();
}
?>