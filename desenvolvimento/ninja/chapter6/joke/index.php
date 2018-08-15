<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';


//SE O addjoke ESTIVER COM VALOR QUER DIZER QUE O USUÁRIO CLICOU EM addjoke E QUER ADICIONAR UMA NOVA JOKE NOTE QUE AQUI NÃO PRECISA DE CONEXÃO COM O BANCO DE DADOS
if (isset($_GET['addjoke']))
{
	include 'form.html.php';
	exit();
}




// SE joketext POSSUI UM VALOR QUER DIZER QUE O USUÁRIO JÁ ADICIONOU UMA JOKE E CLICOU EM ADD
if (isset($_POST['joketext']))
{
	// CONECTAMOS NO BANCO DE DADOS
	include 'db.inc.php';

	try
	{	// CRIAMOS A SQL DA FORMA A UTILIZAR O METODO PREPARE :joketext AQUI É APENAS UM PLACEHOLDER
		$sql = 'INSERT INTO joke SET
		joketext = :joketext,
		jokedate = CURDATE()';
		$s = $pdo->prepare($sql);// INFORMAMOS AO MYSQL QUE IREMOS UTILIZAR O METODO prepare
		$s->bindValue(':joketext', $_POST['joketext']);// PASSAMOS O VALOR $_POST['joketext'] PARA O PLACEHOLDER :joketext PARA SER EXECUTADO NA SQL
		$s->execute();//EXECUTAMOS A SQL
	}
	catch (PDOException $e)
	{
		$error = 'Error adding submitted joke: ' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
header('Location: .');
exit();
}


// SE ?deletejoke PASSANDO PELO GET tiver valor quer dizer que O USUÁRIO CLICOU EM DELETE
if (isset($_GET['deletejoke']))
{
	// CONECTAMOS NO BANCO DE DADOS
	include 'db.inc.php';

	try
	{	// CRIAMOS A SQL 
		$sql = 'DELETE FROM joke WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch (PDOException $e)
	{
		$error = 'Error delleting joke: ' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
header('Location: .');
echo 'aqui';
exit();
}

// CONECTAMOS NO BANCO DE DADOS
	include 'db.inc.php';

// EXECUTAMOS A CONSULTA NO BD
try {

	$sql = 'SELECT joke.id, joketext, name, email 
	FROM joke INNER JOIN author
	ON authorid = author.id';
	$result = $pdo->query($sql);
} catch (Exception $e) {
	$error = 'Error fetching jokes: ' . $e->getMessage();
	include 'error.html.php';
	exit();
}

//while ($row = $result->fetch()) poderia ser feito assim
foreach ($result as $row) //mas o correto é assim
{
	$jokes[] = array(
		'id' => $row['id'], 
		'text' => $row['joketext'],
		'name' => $row['name'],
		'email' => $row['email']
	);
}

include 'jokes.html.php';

//$row = $result->fetch(); returns the next row in the result set as an array until there is no more rows so that it return false.
?>
