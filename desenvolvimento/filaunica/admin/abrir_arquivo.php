<?php

require_once '../inc/db.inc.php';

  $pdo->exec("set names utf8");
  
  if($_GET['tipo'] == 'res'){
    $sql = "SELECT id,comprovanteres,comprovante_res_nome,comprovanteres_tipo  FROM fila WHERE id = $_GET[id]";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array());
    $result = $stmt->fetch();  
    $tipo = $result['comprovanteres_tipo'];
    $conteudo = $result['comprovanteres'];
  }
  
  if($_GET['tipo'] == 'nasc'){
    $sql = "SELECT id,comprovantenasc,comprovante_nasc_nome,comprovantenasc_tipo  FROM fila WHERE id = $_GET[id]";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array());
    $result = $stmt->fetch();  
    $tipo = $result['comprovantenasc_tipo'];
    $conteudo = $result['comprovantenasc'];
  }

 

  header("Content-Type: $tipo");
  echo $conteudo;


?>

