<?php
include_once('../../includes/constants.inc.php');
include INCLUDES . '/db.inc.php';
try 
{
	$result = $pdo->query('SELECT id, name FROM author');
} catch (Exception $e) 
{
	$error = 'Error fetching authors from the database';
	include 'error.html.php';
	exit();
}


foreach ($result as $row) 
{
	$authors = array('id' => $row['id'], 'name' => $row['name']);
}


try 
{
	$result = $pdo->query('SELECT id, name FROM category');
} catch (Exception $e) 
{
	$error = 'Error fetching categories from database';
	include 'error.html.php';
	exit();
}



foreach ($result as $row) 
{
	$categories[] = array('id' => $row['id'], 'name' => $row['name']);
}


include 'searchform.html.php';



?>