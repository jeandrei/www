<?php

$escola_id = $_GET['escola_id'];
$turma_id = $_GET['turma_id'];
$professor_id = $_GET['professor_id'];

include_once 'db.inc.php';

echo "teste mano";
echo $escola_id;
echo $turma_id;
echo $professor_id;
/*
   try
  {
    $sql = 'SELECT * FROM turma WHERE escola_id = :escola_id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':escola_id', $escola_id);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Erro ao tentar listar as turmas.';
    include 'error.html.php';
    exit();
  }

  $turmas = $s->fetchAll();
  
  if(empty($turmas)){
    die("<option>Sem turmas para esta escola</option>");
  }

  echo ("<option>Escolha uma turma</option>");
  foreach($turmas as $turma){    
    echo "<option value='".$turma['id']."'>".$turma['turma']."</option>";

}*/

?>
