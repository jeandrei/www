<?php
// DESABILITA MAGIC QUOTES NECESSÁRIO APENAS PARA FORMULÁRIOS que foi uma má ideia do php era para impedir SQL injections, mas sua implementação causou muitos problemas e já deve ter sido removida, mas para remover é necessário esse código. A maneira correta é usando prepared statements que prepara a instrução antes da execução.
if (get_magic_quotes_gpc())
{
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process))
		{
		foreach ($val as $k => $v)
			{
			unset($process[$key][$k]);
			if (is_array($v))
				{
					$process[$key][stripslashes($k)] = $v;
					$process[] = &$process[$key][stripslashes($k)];
				}
			else
				{
					$process[$key][stripslashes($k)] = stripslashes($v);
				}
			}
		}
	unset($process);
}

//SE O addjoke ESTIVER COM VALOR QUER DIZER QUE O USUÁRIO CLICOU EM addjoke E QUER ADICIONAR UMA NOVA JOKE NOTE QUE AQUI NÃO PRECISA DE CONEXÃO COM O BANCO DE DADOS
if (isset($_GET['addjoke']))
{
	include 'form.html.php';
	exit();
}

// CONECTAMOS NO BANCO DE DADOS
include '../connect/index.php';

// SE joketext POSSUI UM VALOR QUER DIZER QUE O USUÁRIO JÁ ADICIONOU UMA JOKE E CLICOU EM ADD
if (isset($_POST['joketext']))
{
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


// EXECUTAMOS A CONSULTA NO BD
try {
	$sql = 'SELECT joketext FROM joke';
	$result = $pdo->query($sql);
} catch (Exception $e) {
	$error = 'Error fetching jokes: ' . $e->getMessage();
	include 'error.html.php';
	exit();
}

//while ($row = $result->fetch()) poderia ser feito assim
foreach ($result as $row) //mas o correto é assim
{
	$jokes[] = $row['joketext'];
}

include 'jokes.html.php';

//$row = $result->fetch(); returns the next row in the result set as an array until there is no more rows so that it return false.
?>