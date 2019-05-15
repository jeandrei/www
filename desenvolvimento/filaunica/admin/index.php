<?php
// URL ROOT
require_once '../inc/db.inc.php';
require_once '../inc/helpers.inc.php';
require_once 'inc/access.inc.php';
/*
$name = 'Jeandrei';
$email = 'jeandreiwalter@yahoo.com.br';
$password = md5('123456' . 'filaunica');
$sql = 'INSERT INTO user SET
			name = :name,
      email = :email,
      password = :password';
		$s = $pdo->prepare($sql);
		$s->bindValue(':name', $name);
    $s->bindValue(':email', $email);
    $s->bindValue(':password', $password);
		$s->execute();		
*/

//var_dump($_POST);

/*if(isset($_POST['action']) && ($_POST['action'] == "logout"))
{
  echo "você clocou em logout";
}*/

//***********************************LOGIN***************************************
if (!userIsLoggedIn())
{
  include 'login.html.php';
  exit();
}
//**********************************FIM DO LOGIN*********************************



//quantos registros serão apresentados na paginação
$limit = 15;  

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


if($_REQUEST["act"] == NULL && $_GET['status'] == NULL && $_GET['etapa'] == NULL)
{
  $count =getFila($pdo,$pag_etapa,$pag_status);
  $fila = getFilaPaginacao($pdo,$start_from,$limit);  
  include 'registros.html.php';
  exit();
}



 if(($_REQUEST["act"]) && $_REQUEST["act"] == "search" || isset($_GET['etapa']))
{
    //atribui a fila os registros que satisfazem a consulta trazendo um intervalo de registros
    //que vão de start_from até limit 
    if($fila = getFilaPorEtapaPaginacao($pdo,$pag_etapa,$pag_status,$start_from,$limit))
    {
      //chama a função getFilaPorEtapa para pegar o número de registros no banco que satisfazem a consulta
      $count = getFilaPorEtapa($pdo,$pag_etapa,$pag_status);      
      include 'registros.html.php';
      exit();
    }
    else
    {
      $error = "Nenhum registro encontrado."; 
      include 'error.html.php';
      exit();
    }
}



//faz a busca por nome
if(($_REQUEST["act"]) && $_REQUEST["act"] == "searchname") {
    if($fila = getFila($pdo,$_POST['buscanome']))
    {
      $fila = getFila($pdo,$_POST['buscanome']); 
      include 'registros.html.php';
      exit(); 
    }
    else
    {
      $error = "Nenhum registro encontrado."; 
      include 'error.html.php'; 
      exit(); 
    } 
 }
 
 
 










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