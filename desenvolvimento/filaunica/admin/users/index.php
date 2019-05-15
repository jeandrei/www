<?php
require_once '../../inc/db.inc.php';
require_once '../../inc/config.inc.php';
require_once '../inc/access.inc.php';

if (!userIsLoggedIn())
{
	include '../login.html.php';
	exit();
}


if (!userHasRole('Administrador'))
{
	$error = 'Apenas usuários com acesso de administrador tem acesso a esta página.';
	include '../accessdenied.html.php';
	exit();
}


/*

//********************************ADICIONAR UM NOVO USUÁRIO*****************************

if (isset($_GET['add']))//Monta o formulário para a inserção de dados
{
	$pageTitle = 'Novo Usuário';
	$action = 'addform';
	$name = '';
	$email = '';
	$id = '';
	$button = 'Gravar';

	try
	{		
		$result = $pdo->query('SELECT id, description FROM role');
	}
	catch (PDOException $e)
	{
		$error = 'Erro ao recuperar a lista de atribuições.';
		include 'error.html.php';
		exit();
	}// and try

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


if (isset($_GET['addform']))// ao clicar no botão gravar
{

		if (!isset($_POST['roles']))
		{
			$ValidarErro = "Você deve selecionar ao um privilégio."; 
		}
		if (!preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST['password']))
		{
			$ValidarErro = "Senha deve conter no mínimo 8 caracteres uma letra maiúscula e um algarismo. " . $_POST['id'];
		}
		if (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $_POST['email']))
		{
			$ValidarErro = "Email inválido";   
		}
		if ($_POST['name'] == "")
		{
		$ValidarErro = 'Nome inválido.';       
		}

		if (isset($ValidarErro))//se tiver algum erro
		{
			$pageTitle = 'Novo Usuário';
			$action = 'addform';
			isset($_POST['name']) ? $name = $_POST['name'] : $name = '';
			isset($_POST['email']) ? $email = $_POST['email'] : $email = '';
			isset($_POST['id']) ? $id = $_POST['id'] : $id = '';			
			$button = 'Gravar';

			try
			{		
				$result = $pdo->query('SELECT id, description FROM role');
			}
			catch (PDOException $e)
			{
				$error = 'Erro ao recuperar a lista de atribuições.';
				include 'error.html.php';
				exit();
			}// and try

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

	try
	{
		$sql = 'INSERT INTO user SET
			name = :name,
			email = :email';
		$s = $pdo->prepare($sql);
		$s->bindValue(':name', $_POST['name']);
		$s->bindValue(':email', $_POST['email']);
		$s->execute();			
	}
	catch (PDOException $e)
	{
		$error = 'Erro ao tentar gravar os dados do usuário.';
		include 'error.html.php';
		exit();
	}// end try

	$userid = $pdo->lastInsertId();

	if ($_POST['password'] != '')
	{
		$password = md5($_POST['password'] . 'labdb');

		try
		{
			$sql = 'UPDATE user SET
				password = :password
				WHERE id = :id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':password', $password);
			$s->bindValue(':id', $userid);
			$s->execute();
		}
		catch (PDOException $e)
		{
			$error = 'Erro ao tentar grava a senha de acesso.';
			include 'error.html.php';
			exit();
		}// end try
	}//end if ($_POST['password'] != '')

	if (isset($_POST['roles']))
	{	
		foreach ($_POST['roles'] as $role) 
		{
			try
			{
				$sql = 'INSERT INTO userrole SET
					userid = :userid,
					roleid = :roleid';
				$s = $pdo->prepare($sql);
				$s->bindValue(':userid', $userid);
				$s->bindValue(':roleid', $role);
				$s->execute();				
			}
			catch (PDOException $e)
			{
				$error = 'Erro ao associar as permições do usuário.';
				include 'error.html.php';
				exit();
			}//end try
		}// end foreach ($_POST['roles']
	}//end if (isset($_POST['roses']))
header('Location: .');
exit();
}
//********************************FIM ADICIONAR UM NOVO USUÁRIO*************************

//********************************DELETAR USUÁRIO***************************************
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
	try
	{
		$sql = 'DELETE FROM userrole WHERE userid = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue('id', $_POST['id']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$erro = 'Erro ao tentar remover as atribuições do usuário. ';
		include 'error.html.php';
		exit();
	}//end try

	try
	{
		$sql = 'DELETE FROM user WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Erro ao tentar excluir o usuário. ';
		include 'error.html.php';
		exit();
	}
header('Location: .');
exit();
}
//********************************FIM DELETAR USUARIO**********************************



//*****************EDITAR USUARIO RECUPERAR DADOS E MONTAR O FORMULARIO******************
if (isset($_POST['action']) and $_POST['action'] == 'Edite') //se o usuário clicou em edit
{
	try
  {
    $sql = 'SELECT id, name, email FROM user WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Erro ao recuperar os dados do usuário.';
    include 'error.html.php';
    exit();
  }

	$row = $s->fetch();//passa os registros da variável $s para a variavel $row

	$pageTitle = 'Editar Usuário';
	$action = 'editform';
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	$button = 'Gravar';
	//Get list of roles assigned to this author
	try
	{
	  $sql = 'SELECT roleid FROM userrole WHERE userid = :id';
	  $s = $pdo->prepare($sql);
	  $s->bindValue(':id', $id);
	  $s->execute();
	}
	catch (PDOException $e)
	{
	  $error = 'Erro ao recuperar as atribuições do usuário.';
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
	  $error = 'Erro ao recuperar a lista de atribuições.';
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
//**************FIM EDITAR USUARIO RECUPERAR DADOS E MONTAR O FORMULARIO******************

//********************GRAVAR OS DADOS EDITADOS NO PASSO ANTERIOR**************************
if (isset($_GET['editform']))
{
		if (!isset($_POST['roles']))
		{
			$ValidarErro = "Você deve selecionar ao um privilégio."; 
		}
		if (!preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST['password']))
		{
			$ValidarErro = "Senha deve conter no mínimo 8 caracteres uma letra maiúscula e um algarismo.";
		}
		if (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $_POST['email']))
		{
			$ValidarErro = "Email inválido";   
		}
		if ($_POST['name'] == "")
		{
		$ValidarErro = 'Nome inválido.';       
		}

		if (isset($ValidarErro))//se tiver algum erro
		{
			try
			  {
			    $sql = 'SELECT id, name, email FROM user WHERE id = :id';
			    $s = $pdo->prepare($sql);
			    $s->bindValue(':id', $_POST['id']);
			    $s->execute();
			  }
			  catch (PDOException $e)
			  {
			    $error = 'Erro ao recuperar os dados do usuário.';
			    include 'error.html.php';
			    exit();
			  }

				$row = $s->fetch();//passa os registros da variável $s para a variavel $row

				$pageTitle = 'Editar Usuário';
				$action = 'editform';
				$name = $row['name'];
				$email = $row['email'];
				$id = $row['id'];
				$button = 'Gravar';
				//Get list of roles assigned to this author
				try
				{
				  $sql = 'SELECT roleid FROM userrole WHERE userid = :id';
				  $s = $pdo->prepare($sql);
				  $s->bindValue(':id', $id);
				  $s->execute();
				}
				catch (PDOException $e)
				{
				  $error = 'Erro ao recuperar as atribuições do usuário.';
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
				  $error = 'Erro ao recuperar a lista de atribuições.';
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
		}//if (isset($ValidarErro))

  try
  {
    $sql = 'UPDATE user SET
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
    $error = 'Erro ao tentar gravar os dados a serem atualizados.';
    include 'error.html.php';
    exit();
  }

  if ($_POST['password'] != '')
  {
    $password = md5($_POST['password'] . 'labdb');

    try
    {
      $sql = 'UPDATE user SET
          password = :password
          WHERE id = :id';
      $s = $pdo->prepare($sql);
      $s->bindValue(':password', $password);
      $s->bindValue(':id', $_POST['id']);
      $s->execute();
    }
    catch (PDOException $e)
    {
      $error = 'Erro ao tentar gravar a atualização da senha.';
      include 'error.html.php';
      exit();
    }//end try
  }//end if ($_POST

  try
  {
    $sql = 'DELETE FROM userrole WHERE userid =:id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Erro ao remover antigas atribuições do usuário.';
    include 'error.html.php';
    exit();
  }// end try

  if (isset($_POST['roles']))
  {
    foreach ($_POST['roles'] as $role)
    {
      try
      {
        $sql = 'INSERT INTO userrole SET
          userid = :userid,
          roleid = :roleid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userid', $_POST['id']);
        $s->bindValue(':roleid', $role);
        $s->execute();
      }
      catch (PDOException $e)
      {
        $error = 'Erro ao tentar gravar as atribuições do usuário.';
        include 'error.html.php';
        exit();
      }// end try
    }// end foreac
  }//end if (isset($_POST['roles']))

  header('Location: .');
  exit();
}
//*******************FIM GRAVAR OS DADOS EDITADOS NO PASSO ANTERIOR*********************
*/

//********************************BUSCA A LISTA COM TODOS OS USUÁRIOS*******************
try
{
	$result = $pdo->query('SELECT id, name FROM user');	
}
catch (PDOException $e)
{
	$error = 'Erro ao tentar recuperar os usuários da base de dados.';
	include 'error.html.php';
	exit();
}//end of try

foreach ($result as $row) 
{
	$users[] = array('id' => $row['id'], 'name' => $row['name']);	
}

include 'users.html.php'
//*******************************FIM LISTA DE TODOS OS USUÁRIOS*************************
?>