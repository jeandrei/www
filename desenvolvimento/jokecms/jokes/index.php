<?php
include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/magicquotes.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/helpers.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/db.inc.php';
try
{
  $sql = 'SELECT joke.id, joketext, name, email
      FROM joke INNER JOIN author
        ON authorid = author.id';
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
  $jokes[] = array(
    'id' => $row['id'],
    'text' => $row['joketext'],
    'name' => $row['name'],
    'email' => $row['email']
  );
}

include 'jokes.html.php';
