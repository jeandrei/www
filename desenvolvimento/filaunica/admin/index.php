<?php
// URL ROOT
require_once '../inc/db.inc.php';
require_once '../inc/helpers.inc.php';



$limit = 2;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;


if(isset($_POST['etapa'])){
  $pag_etapa = $_POST['etapa'];
  $pag_status = $_POST['select_status'];
}
else
{
  $pag_etapa = $_GET['etapa'];
  $pag_status = $_GET['status'];
}



 //if(($_REQUEST["act"]) && $_REQUEST["act"] == "search" || isset($_POST['submit']))
//{
    if($fila = getFilaPorEtapa($pdo,$pag_etapa,$pag_status,$start_from,$limit))
    {
      include 'registros.html.php';
    }
    else
    {
      $error = "Nenhum registro encontrado."; 
      include 'error.html.php';
    }
//}
/*else
{
  $fila = getFila($pdo);
  include 'registros.html.php';
}*/












/*
  $pdo->exec("set names utf8");
  $sql = "SELECT id,comprovanteres,comprovante_res_nome,comprovanteres_tipo  FROM fila WHERE id = 22";
  
	$stmt = $pdo->prepare($sql);
  $stmt->execute(array());
  $result = $stmt->fetch();

  $tipo = $result['comprovanteres_tipo'];
  $conteudo = $result['comprovanteres'];
  header("Content-Type: $tipo");
  echo $conteudo;
*/

  //var_dump($stmt);
  //exit();
  /*
  foreach($result as $resultado)
   {
     $tipo = $resultado['comprovanteres_tipo'];
     $conteudo = $resultado['comprovanteres'];
     header("Content-Type: $tipo");
     echo $conteudo;
   } 
 */
 ?>