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





//1º CONECTAMOS NO BANCO DE DADOS
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=ijdb','ijdbuser','mypassword');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	$output = 'Unable to connect to the database server.' . $e->getMessage();	
	include 'output.html.php';
	exit();
}
$output = 'Database connection established.';
include 'output.html.php';

if (isset($_GET['addjoke']))
{
	include 'form.html.php';
	exit();
}

//2º EXECUTAMOS A CONSULTA NO BD
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