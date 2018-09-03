<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/magicquotes.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/jokecms//includes/access.inc.php';

//VERIFICAÇÃO DE SESSÃO, LOGIN E ATRIBUIÇÕES***************************************
if (!userIsLoggedIn())
{
  include '../login.html.php';
  exit();
}

if ((!userHasRole('Account Administrator')) and (!userHasRole('Site Administrator')))
{
  $error ='Only Account Administrators may access this page.';
  include '../accessdenied.html.php';
  exit();
}

//*******************************ADD**************************************
if (isset($_GET['add']))
{
	$pageTitle = 'New Category';
	$action = 'addform';
	$name = '';
	$id = '';
	$button = 'Add Category';

include 'form.html.php';
exit();
}

if (isset($_GET['addform']))
{
	include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

	try
	{
		$sql = 'INSERT INTO category SET
			name = :name';
		$s = $pdo->prepare($sql);
		$s->bindValue(':name', $_POST['name']);
		$s->execute();
	}
	catch (PDOException $e)
	{
		$error = 'Error adding submitted category.';
		include 'error.html.php';
		exit();
	}
header('Location: .');
exit();
}
//***************************************************************************

//***********************EDIT************************************************

if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
	include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

	try
	{
		$sql = 'SELECT id, name FROM category WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch (PDOException $e)
	{
		$error = 'Error fatching category details.';
		include 'error.html.php';
		exit();
	}

$row = $s->fetch();

$pageTitle ='Edit Category';
$action = 'editform';
$name = $row['name'];
$id = $row['id'];
$button = 'Update category';

include 'form.html.php';
exit();
}

if (isset($_GET['editform']))
{
	include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

	try
	{
		$sql = 'UPDATE category SET
			name = :name
			WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->bindValue('name', $_POST['name']);
		$s->execute();
	}
	catch (PDOException $e)
	{
		$error = 'Error updating submitted category.';
		include 'error.html.php';
		exit();
	}
}
//****************************************************************************

//***********************************DELETE***********************************
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
	include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

	//Delete joke associations with this category
	try
	{
		$sql = 'DELETE FROM jokecategory WHERE categoryid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch (PDOException $e)	
	{
		$error = 'Error removing jokes from category.';
		include 'error.html.php';
		exit();
	}

	//Delte the category
	try
	{
		$sql = 'DELETE FROM category WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch (PDOException $e)
	{
		$error = 'Error deleting category.';
		include 'error.html.php';
		exit();
	}
header('Location: .');
exit();
}
//****************************************************************************

//*****************************LISTA AS CATEGORIAS****************************
//Display category list
include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';
try
{
	$result = $pdo->query('SELECT id, name FROM category');
}
catch (PDOException $e)
{
	$error = 'Error fetching categories from databese!';
	include 'error.html.php';
	exit();
}

foreach ($result as $row)
 {
	$categories[] = array('id' => $row['id'], 'name' => $row['name']);
 }

include 'categories.html.php';

//****************************************************************************
?>