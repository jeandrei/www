<?php


function userIsLoggedIn()
{
	
	if(isset($_POST['action']) and $_POST['action'] == 'login')
	{
		if(!isset($_POST['email']) or $_POST['email'] == '' or
		!isset($_POST['password']) or $_POST['password'] == '')
		{
			$GLOBALS['loginError'] = 'Por favor informe seu email e senha.';
			return FALSE;
		}// end if(!isset($_POST['email'])
		
		$password = md5($_POST['password'] . 'labdb');		

		if (databaseContainsUser($_POST['email'], $password))//alterei o nome da funçao databaseContainsAuthor
		{
			session_start();
			$_SESSION['loggedIn'] = TRUE;
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $password;
			return TRUE;
		}
		else
		{
			session_start();
			unset($_SESSION['loggedIn']);
			unset($_SESSION['email']);
			unset($_SESSION['password']);
			$GLOBALS['loginError'] = 'Email ou senha inválido, favor tente novamente.';
			return FALSE;
		}//end if (databaseContainsAuthor
	}// end if(isset($_POST['action']

	if (isset($_POST['action']) and $_POST['action'] == 'logout')
	{
		session_start();
		unset($_SESSION['loggedIn']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		header('Location: ' . $_POST['goto']);
		exit();
	}// end if (isset($_POST['action'])

	session_start();
	if (isset($_SESSION['loggedIn']))
	{
		return databaseContainsUser($_SESSION['email'],
			$_SESSION['password']);
	}
}//end function userIsLoggedIn


function databaseContainsUser($pdo,$email, $password)
{
	try
	{
		$sql = 'SELECT COUNT(*) FROM user
			WHERE email = :email AND password = :password';
		$s = $pdo->prepare($sql);
		$s->bindValue(':email', $email);
		$s->bindValue(':password', $password);
		$s->execute();
	}
	catch (PDOExeption $e)
	{
		$error = 'Erro ao tentar recuperar os dados do usuário.';
		include 'error.html.php';
		exit();
	}//end try

	$row = $s->fetch();

	if ($row[0] > 0)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}//end function databaseContainsAuthor


?>