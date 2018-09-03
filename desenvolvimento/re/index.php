<?php


if (isset($_POST['digrex']) && ($_POST['digrex'])!= "")
{
  $texto = $_POST['texto'];   
  $digrex = $_POST['digrex'];
  if (preg_match("$digrex", $texto))
      {
        $output_re = 'A expressão regular <b>SATISFAZ,</b> o texto digitado.';
      }
      else
      {
        $output_re = 'A expressão regular NÃO SATISFAZ o texto digitado.';
      } 
}
else
{
    if(isset($_GET['check']))//la no authors.html.php tem uma linha <p><a href="?add">Add new author</a></p> que quando o usuário clica entra aqui.
    {
      $texto = $_POST['texto'];
      $regexp = $_POST['regexp'];
      //echo "$regexp";
      

    if (preg_match("$regexp", $texto))
      {
        $output_re = 'A expressão regular SATISFAZ o texto digitado.';
      }
      else
      {
        $output_re = 'A expressão regular NÃO SATISFAZ o texto digitado.';
      }

      //include 'form.html.php';//CARREGA O FORMULÁRIO PARA ADIÇÃO COM OS VALORES PARA AS VARIÁVEIS
      //exit();
}
}
include 'form.html.php';//CARREGA O FORMULÁRIO PARA ADIÇÃO COM OS VALORES PARA AS VARIÁVEIS
?>