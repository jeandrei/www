<?php



if(isset($_GET['check']))//la no authors.html.php tem uma linha <p><a href="?add">Add new author</a></p> que quando o usuário clica entra aqui.
{
  $texto = $_POST['texto'];
  $regexp = $_POST['regexp'];
  //echo "$regexp";
  

if (preg_match("$regexp", $texto))
  {
    $output_re = 'A expressão regular SATISFAZ a exprassão regular.';
  }
  else
  {
    $output_re = 'A expressão regular NÃO SATISFAZ a exprassão regular.';
  }

  include 'form.html.php';//CARREGA O FORMULÁRIO PARA ADIÇÃO COM OS VALORES PARA AS VARIÁVEIS
  exit();
}
include 'form.html.php';//CARREGA O FORMULÁRIO PARA ADIÇÃO COM OS VALORES PARA AS VARIÁVEIS
?>