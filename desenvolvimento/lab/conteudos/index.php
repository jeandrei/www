<?php

include_once ('includes/constantes.php');
include_once AUXILIARES.'/magicquotes.inc.php';
include_once AUXILIARES.'/helpers.inc.php';
include_once AUXILIARES.'/db.inc.php';

try
{
  $sql = 'SELECT webaddress.id, address, description, objective
      FROM webaddress INNER JOIN user
        ON userid = user.id ORDER BY description';
  $result = $pdo->query($sql);         
}
catch (PDOException $e)
{
  $error = 'Error fetching jokes: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $addresses[] = array(
    'id' => $row['id'],
    'address' => $row['address'],
    'description' => $row['description'],
    'objective' => $row['objective']
  );
}

include 'addresses.html.php';
?>
