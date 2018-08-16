<?php
include_once ROOT . '/includes/db.inc.php';

function totalJokes()
{
	try
	{
		$result = $GLOBALS['pdo']->query('SELECT COUNT(*) FROM joke');
	}
	catch(PDOException $e)
	{
		$error = 'Database error counting jokes';
		include 'error.html.php';
		exit();
	}
	$rows = $result->fetch();
	return $rows[0];

}


?>