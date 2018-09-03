<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/magicquotes.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/access.inc.php';

//VERIFICAÇÃO DE SESSÃO, LOGIN E ATRIBUIÇÕES***************************************
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
//FIM SESSÃO LOGIN E ATRIBUIÇÕES

//01 - CRIA FORMULÁRIO**************************SE O USUÁRIO CLICA PARA ADICIONAR UM NOVO AUTHOR******************************
if(isset($_GET['add']))//la no authors.html.php tem uma linha <p><a href="?add">Add new author</a></p> que quando o usuário clica entra aqui.
{
  include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

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
  catch (PDOExecption $e)
  {
    $error = 'Error fetching list of roles.';
    include 'error.html.php';
    exit();
  }// end try

  foreach ($result as $row) 
  {
    $roles[] = array(
      'id' => $row['id'],
      'description' => $row['description'],
      'selected' => FALSE);
  }

  include 'form.html.php';//CARREGA O FORMULÁRIO PARA ADIÇÃO COM OS VALORES PARA AS VARIÁVEIS
  exit();
}
//*****************************************************************************************************************************

//02 - APÓS O PASSO 01***********************INSERE OS DADOS NO BANCO DE DADOS*************************************************
if (isset($_GET['addform']))
{
  include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';
  try
  {
    $sql = 'INSERT INTO author SET
      name = :name,
      email = :email';
    $s = $pdo->prepare($sql);
    $s->bindValue(':name', $_POST['name']);
    $s->bindValue(':email', $_POST['email']);
    $s->execute();
  }
  catch (PDOException $e)
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
    catch (PDOException $e)
    {
      $error = 'Error setting author password.';
      include 'error.html.php';
      exit();
    }//end try
  }//end if ($_POST['passwor

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
          $s->bindValue(':authorid', $authorid);
          $s->bindValue(':roleid', $role);
          $s->execute();
        }
        catch (PDOException $e)
        {
          $error = 'Error assigning selected role to author.';
          include 'error.html.php';
          exit();
        }//end try      
      }//end foreach ($_POST['roles'] as $role)    
    }//end (isset($_POST['roles']))
 

header('Location: .');
exit();
}//end if(isset($_GET['addform']))
//*******************************************************************************************************************************

//03 - EDIÇÃO DO AUTHOR**********************************************************************************************************
if (isset($_POST['action']) and $_POST['action'] == 'Edit') //se o usuário clicou em edit
{
  include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

  try
  {
    $sql = 'SELECT id, name, email FROM author WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching author details.';
    include 'error.html.php';
    exit();
  }

$row = $s->fetch();//passa os registros da variável $s para a variavel $row

$pageTitle = 'Edit Author';
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
catch (PDOException $e)
{
  $error = 'Error fetching list of assigned roles.';
  include 'error.html.php';
  exit();
}//end try

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
catch (PDOException $e)
{
  $error = 'Error fetching list of roles.';
  include 'error.html.php';
  exit();
}//end try

foreach ($result as $row)
{
  $roles[] = array(
    'id' => $row['id'],
    'description' => $row['description'],
    'selected' => in_array($row['id'], $selectedRoles));
}//end foreach

include 'form.html.php';//monta o formulário com os dados recuperados
exit();
}
//*******************************************************************************************************************************

//04 - ************************************ATUALIZA OS DADOS DO AUTHOR JÁ CADASTRADO DEPOIS DO PASSO 3***************************
if (isset($_GET['editform']))
{
  include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';
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
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submited author';
    include 'error.html.php';
    exit();
  }

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
      $s->bindValue(':id', $_POST['id']);
      $s->execute();
    }
    catch (PDOException $e)
    {
      $error = 'Error setting author password.';
      include 'error.html.php';
      exit();
    }//end try
  }//end if ($_POST

  try
  {
    $sql = 'DELETE FROM authorrole WHERE authorid =:id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing obsolete author role entries.';
    include 'error.html.php';
    exit();
  }// end try

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
      catch (PDOException $e)
      {
        $error = 'Error assigning selected role to author.';
        include 'error.html.php';
        exit();
      }// end try
    }// end foreac
  }//end if (isset($_POST['roles']))

  header('Location: .');
  exit();
}
//*******************************************************************************************************************************


if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

  //Delete role assignments for this author
  try
  {
    $sql = 'DELETE FROM authorrole WHERE authorid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing author from roles.';
    include 'error.html.php';
    exit();
  }//end try

  // Get jokes belonging to author
  try
  {
    $sql = 'SELECT id FROM joke WHERE authorid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error getting list of jokes to delete.';
    include 'error.html.php';
    exit();
  }

  $result = $s->fetchAll();

  // Delete joke category entries
  try
  {
    $sql = 'DELETE FROM jokecategory WHERE jokeid = :id';
    $s = $pdo->prepare($sql);

    // For each joke
    foreach ($result as $row)
    {
      $jokeId = $row['id'];
      $s->bindValue(':id', $jokeId);
      $s->execute();
    }
  }
  catch (PDOException $e)
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
}


// Display author list********************************************************************************
include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';

try
{
  $result = $pdo->query('SELECT id, name FROM author');
}
catch (PDOException $e)
{
  $error = 'Error fetching authors from the database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $authors[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'authors.html.php';
//**************************************************************************************************




?>