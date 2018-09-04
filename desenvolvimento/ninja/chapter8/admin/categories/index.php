<?php
include_once('../../includes/constants.inc.php');
include_once INCLUDES . '/magicquotes.inc.php';

//****************************ADD CATEGORY**********************************
if (isset($_GET['add']))
{
	$pageTitle = 'New Catetory';
	$action = 'addform';
	$name = '';	
	$id = '';
	$button = 'Add category';

	include 'form.html.php';
	exit();
}
//------------------------------------------------------------------------




//**************************SUBMIT NEW CATEGORY*****************************
if (isset($_GET['addform']))
{
	include INCLUDES . '/db.inc.php';
	try 
	{
		$sql =	'INSERT INTO category SET
			name = :name;';
		$s = $pdo->prepare($sql);
		$s->bindValue(':name', $_POST['name']);		
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error adding submitted category.';
		include 'error.html.php';
		exit();
	}
 header('Location: .');
 exit();
}
//-----------------------------------------------------------------------




//**************EDITIN CATEGORY GET CURRENT DATA FROM CATEGORY***************
if(isset($_POST['action']) and $_POST['action'] == 'Edit')
{
	include INCLUDES . '/db.inc.php';
	try 
	{
		$sql = 'SELECT id, name FROM category WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error fetching category details.';
		include 'error.html.php';
		exit();
	}

	$row = $s->fetch();

	$pageTitle = 'Edit Category';
	$action = 'editform';
	$name = $row['name'];	
	$id = $row['id'];
	$button = 'Update category';

	include 'form.html.php';
	exit();
}
//----------------------------------------------------------------------





//*****************SAVING CATEGORY EDITING*******************************
if (isset(($_GET['editform'])))
{
	include INCLUDES . '/db.inc.php';
	try 
	{
		$sql = 'UPDATE category SET
			name = :name			
			WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->bindValue(':name', $_POST['name']);		
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error updating sumbitted category.';
		include 'error.html.php';
		exit();
	}
 header('Location: .');
 exit();
}
//---------------------------------------------------------------------





//****************************DELETE CATEGORY********************************
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
	include INCLUDES . '/db.inc.php';
	//Get jokes belonging to author
	
	//Delete joke associations with this categorry
	try 
	{
		$sql = 'DELETE FROM jokecategory WHERE categoryid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} 
	catch (Exception $e) 
	{
		$error = 'Error removing jokes from catgory.';
		include 'error.html.php';
		exit();
	}
	
	//Delete the category
	try 
	{	
		$sql = 'DELETE FROM category WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} 
	catch (Exception $e) 
	{
		$error = 'Error deleting category.';
		include 'error.html.php';
		exit();
	}
	
header('Location: .');
exit();
}
//------------------------------------------------------------------------




//**************************LIST CATEGORY***********************************
include INCLUDES . '/db.inc.php';
try 
{
	$result = $pdo->query('SELECT id, name FROM category');
} catch (Exception $e) 
{
	$error ='Error fetching categorys from the database!'	;
	include 'error.html.php';
	exit();
}

foreach ($result as $row) 
{
	$categories[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'categories.html.php';
//------------------------------------------------------------------------
?>