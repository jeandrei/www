<?php
include_once('../../includes/constants.inc.php');
include_once INCLUDES . '/magicquotes.inc.php';

//******************************LOGIN************************************
require_once INCLUDES . '/access.inc.php';
if (!userIsLoggedIn())
{
	include '../login.html.php';
	exit();
}


if (!userHasRole('Account Administrator'))
{
	$error = 'Only Account Administrators may access this page.';
	include '../accessdenied.html.php';
	exit();
}
//-----------------------------------------------------------------------


//****************************ADD AUTHOR**********************************
if (isset($_GET['add']))
{
	include INCLUDES . '/db.inc.php';
	$pageTitle = 'New Author';
	$action = 'addform';
	$name = '';
	$email = '';
	$id = '';
	$button = 'Add author';

	//Build the list of roles
	try 
	{
		$result = $pdo->query('SELECT id, description FROM role');
	}
	catch (Exception $e) 
	{
		$error = 'Error fetching list of roles.';
		include 'error.html.php';
		exit();
	}

	foreach ($result as $row) 
	{
		$roles[] = array(
			'id' => $row['id'],
			'description' => $row['description'],
			'selected' => FALSE);
	}

	include 'form.html.php';
	exit();
}
//------------------------------------------------------------------------




//**************************SUBMIT NEW AUTHOR*****************************
if (isset($_GET['addform']))
{
	include INCLUDES . '/db.inc.php';
	try 
	{
		$sql =	'INSERT INTO author SET
			name = :name,
			email = :email';
		$s = $pdo->prepare($sql);
		$s->bindValue(':name', $_POST['name']);
		$s->bindValue(':email', $_POST['email']);
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error adding submitted author.';
		include 'error.html.php';
		exit();
	}

	$authorid = $pdo->lastInsertId();

	if ($_POST['password'] != '')
	{
		$password = md5($_POST['password'] . 'ijdb');
		
		try 
		{
			$sql = 'UPDATE author SET
				password = :password
				WHERE id = :id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':password', $password);
			$s->bindValue(':id', $authorid);
			$s->execute();
		} 
		catch (Exception $e) 
		{
			$error = 'Error setting author password.';
			include 'error.html.php';
			exit();
		}
	}

	if (isset($_POST['role']))
	{
		foreach ($_POST['role'] as $role) 
		{
			try 
			{
				$sql = 'INSERT INTO authorrole SET
					authorid = :authorid,
					roleid = :roleid';
				$s = $pdo->prepare($sql)	;
				$s->bindValue(':authorid', $authorid);
				$s->bindValue(':roleid', $role);
				$s->execute();
			} 
			catch (Exception $e) 
			{
				$error = 'Error assigning select role to author.';
				include 'error.html.php';
				exit();
			}
		}
	}
 header('Location: .');
 exit();
}
//-----------------------------------------------------------------------




//**************EDITIN AUTHOR GET CURRENT DATA FROM AUTHOR***************
if(isset($_POST['action']) and $_POST['action'] == 'Edit')
{
	include INCLUDES . '/db.inc.php';
	try 
	{
		$sql = 'SELECT id, name, email FROM author WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error fetching author details.';
		include 'error.html.php';
		exit();
	}

	$row = $s->fetch();

	$pageTitle = 'Edit Athor';
	$action = 'editform';
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	$button = 'Update author';

	//Get list of roles assigned to this author
	try 
	{
		$sql = 'SELECT roleid FROM authorrole WHERE authorid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $id);
		$s->execute();
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching list of assigned roles.';
		include 'error.html.php';
		exit();
	}

	$selectedRoles = array();
	foreach ($s as $row) 
	{
		$selectedRoles[] = $row['roleid'];
	}

	//Build the list of all roles
	try 
	{
		$result = $pdo->query('SELECT id, description FROM role');
	} 
	catch (Exception $e) 
	{
		$error = 'Error fetching list of roles.';
		include 'error.html.php';
		exit();
	}

	foreach ($result as $row) 
	{
		$roles[] = array(
			'id' => $row['id'],
			'description' => $row['description'],
			'selected' => in_array($row['id'], $selectedRoles));
	}

	include 'form.html.php';
	exit();
}
//----------------------------------------------------------------------





//*****************SAVING AUTHOR EDITING*******************************
if (isset(($_GET['editform'])))
{
	include INCLUDES . '/db.inc.php';
	try 
	{
		$sql = 'UPDATE author SET
			name = :name,
			email = :email
			WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->bindValue(':name', $_POST['name']);
		$s->bindValue(':email', $_POST['email']);
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error updating sumbitted author.';
		include 'error.html.php';
		exit();
	}

	if ($_POST['password'] != '')
	{
		$password = md5($_POST['password'] . 'ijdb');

		try 
		{
			$sql =	'UPDATE author SET
				password = :password
				WHERE id = :id'	;
			$s = $pdo->prepare($sql);
			$s->bindValue(':password', $password);
			$s->bindValue(':id', $_POST['id']);
			$s->execute();
		} 
		catch (Exception $e) 
		{
			$error = 'Error setting author password.';
			include 'error.html.php';
			exit();
		}
	}

	try 
	{
		$sql = 'DELETE FROM authorrole WHERE authorid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} 
	catch (Exception $e) 
	{
		$error = 'Error removing obsolete author role entries.';
		include 'error.html.php';
		exit();
	}

	if (isset($_POST['roles']))
	{
		foreach ($_POST['roles'] as $role) 
		{
			try 
			{
				$sql = 'INSERT INTO authorrole SET
					authorid = :authorid,
					roleid = :roleid';
				$s = $pdo->prepare($sql);
				$s->bindValue(':authorid', $_POST['id']);
				$s->bindValue(':roleid', $role);
				$s->execute();

			} 
			catch (Exception $e) 
			{
				$error = 'Error assigning selected role to author.';
				include 'error.html.php';
				exit();
			}
		}
	}
 header('Location: .');
 exit();
}
//---------------------------------------------------------------------





//****************************DELETE AUTHOR********************************
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
	include INCLUDES . '/db.inc.php';
	
	//Delete role assignments for this author
	try 
	{
		$sql = 'DELETE FROM authorrole WHERE authorid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} 
	catch (Exception $e) 
	{
		$error = 'Error removing author from roles.';
		include 'error.html.php';
		exit();
	}


	//Get jokes belonging to author
	try 
	{
		$sql = 'SELECT id FROM joke WHERE authorid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
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
			$s->execute();
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
		$s->execute();
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
		$s->execute();
	} catch (Exception $e) 
	{
		$error = 'Error deleting author.';
		include 'error.html.php';
		exit();
	}
header('Location: .');
exit();
}
//------------------------------------------------------------------------




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
//------------------------------------------------------------------------
?>