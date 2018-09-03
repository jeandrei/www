<?php
include_once ('../../conteudos/includes/constantes.php');
include_once AUXILIARES.'/magicquotes.inc.php';
include_once AUXILIARES.'/access.inc.php';
include_once AUXILIARES.'/helpers.inc.php';
include_once AUXILIARES.'/db.inc.php';

//***********************************LOGIN***************************************
if (!userIsLoggedIn())
{
  include 'login.html.php';
  exit();
}
//**********************************FIM DO LOGIN*********************************

//*******************************ADICIONAR ENDEREÇO*******************************
//1 - Monta o formulário em branco
if(isset($_GET['add']))
{
  $pageTitle = 'Novo Endereço';
  $action = 'addform';
  $address = '';
  $description = '';
  $objective = '';
  $button = 'Gravar';
  include 'form.html.php';
  exit();
}//fim

//2 - Grava no BD
if (isset($_GET['addform']))
{

  if (!preg_match("|^http(s)?://[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i", $_POST['address']))
  {
    $ValidarErro = "Endereço/URL digitado é inválido.\n Informe um endereço da seguinte forma: http://www.dominio.com.br";
    //para que o \n funcione tem que usar echo nl2br($ValidarErro);
    $address = $_POST['description'];    
  }
  else
  if ($_POST['description'] == "")
  {
    $ValidarErro = 'Descrição em branco';
    $address = $_POST['address'];    
  }

  if (isset($ValidarErro))
  {
    $pageTitle = 'Novo Endereço';
    $action = 'addform';    
    $description = '';
    $objective = '';
    $button = 'Gravar';
    include 'form.html.php';
    exit();
  }
  
$userid = retornaUserId($_SESSION['email']); //pega o id do usuário

  try
  {
    $sql = 'INSERT INTO webaddress SET
      userid = :userid,      
      address = :address,
      description = :description,
      objective = :objective';      
    $s = $pdo->prepare($sql);
    $s->bindValue(':userid', $userid);
    $s->bindValue(':address', $_POST['address']);
    $s->bindValue(':description', $_POST['description']);
    $s->bindValue(':objective', $_POST['objective']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Erro ao tentar gravar os dados no banco de dados.';
    include 'error.html.php';
    exit();
  }
header('Location: .');
exit();
}
//*******************************FIM ADICIONAR ENDEREÇO**************************



//*******************************EDIÇÃO DOS ENDEREÇOS****************************

if (isset($_POST['action']) and $_POST['action'] == 'Editar')
{
//$userid = retornaUserId($_SESSION['email']);
$idadress = $_POST['id'];

  try
  {
    $sql = 'SELECT id, userid, address, description, objective FROM webaddress WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Erro ao tentar recuperar os dados do endereço.';
    include 'error.html.php';
    exit();
  }// end try

  $row = $s->fetch();

  $pageTitle = 'Editar Endereço';
  $action = 'editform';
  $description = $row['description'];
  $address = $row['address'];
  $objective = $row['objective'];
  $id = $row['id'];
  $button = 'Atualizar';

include 'form.html.php';
exit();

}//end if (isset($_POST['action']) and $_POST['action'] == 'Editar')

//***************************FIM EDIÇÃO DOS ENDEREÇOS****************************

//*******************************GRAVAR OS DADOS ALTERADOS**********************
if (isset($_GET['editform']))
{
  if (!preg_match("/^https?:\/\/(www\.)?[-a-z0-9+]{2,128}\.[a-z]{2,4}(\.[a-z]{2,4})?(\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*)?$/i", $_POST['address']))
  {
    $ValidarErro = "Endereço/URL digitado é inválido.\n Informe um endereço da seguinte forma: http://www.dominio.com.br";
    //para que o \n funcione tem que usar echo nl2br($ValidarErro);
    $address = $_POST['description'];    
  }
  else
  if ($_POST['description'] == "")
  {
    $ValidarErro = 'Descrição em branco';
    $address = $_POST['address'];    
  }

  if (isset($ValidarErro))
  {
      try
      {
        $sql = 'SELECT id, userid, address, description, objective FROM webaddress WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
      }
      catch (PDOException $e)
      {
        $error = 'Erro ao tentar recuperar os dados do endereço.';
        include 'error.html.php';
        exit();
      }// end try

      $row = $s->fetch();

      $pageTitle = 'Editar Endereço';
      $action = 'editform';
      $description = $row['description'];
      $address = $row['address'];
      $objective = $row['objective'];
      $id = $row['id'];
      $button = 'Atualizar';
      include 'form.html.php';
      exit();
  }// end if (isset($ValidarErro))
  else
  {//echo "id " . $_POST['id'] . "descricao" . $_POST['description'] . "endereco " . $_POST['address'];
    //exit();
      try
      {
        $sql = 'UPDATE webaddress SET 
                description = :description,
                address = :address,
                objective = :objective
                WHERE id = :id';                
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':description' ,$_POST['description']);
        $s->bindValue(':address', $_POST['address']);
        $s->bindValue(':objective', $_POST['objective']);
        $s->execute();        
      }
      catch (PDOException $e)
      {
        $error = 'Erro ao tentar atualizar os dados.';
        include 'error.html.php';
        exit();
      }//end try
  }// end if (isset($ValidarErro))


}// end if (isset($_GET['editform']))

//***************************FIM GRAVAR OS DADOS ALTERADOS**********************



//********************************DELETA ENDEREÇOS*****************************

if (isset($_POST['action']) and $_POST['action'] == 'Deletar')
{
  try
  {
    $sql = 'DELETE FROM webaddress WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e) 
  {
    $error = 'Erro ao tentar excluir o endereço solicitado.'  ;
    include 'error.htm.php';
    exit();
  }// end of try
}//if (isset($_POST['action'])

//**************************FIM DELETA ENDEREÇOS*******************************


//************************************PESQUISA NO BANCO DE DADOS DOS ENDEREÇOS CADASTRADOS***********************************
if (userHasRole('Account Administrator'))
{
  $s = $pdo->query('SELECT webaddress.id, user.name, address, description, objective
          FROM webaddress INNER JOIN user
          ON userid = user.id ORDER BY address');   
}
else
{
  try
  {     
    $sql = 'SELECT webaddress.id, user.name, address, description, objective
            FROM webaddress INNER JOIN user
            ON userid = user.id WHERE user.email = :email';
    $s = $pdo->prepare($sql);
    $s->bindValue(':email', $_SESSION['email']);    
    $s->execute();          
  }
  catch (PDOException $e)
  {
    $error = 'Erro ao tentar recuperar os endereços: ' . $e->getMessage();
    include 'error.html.php';
    exit();
  }
}

foreach ($s as $row)
{
  $addresses[] = array(
    'id' => $row['id'],
    'address' => $row['address'],
    'description' => $row['description'],
    'objective' => $row['objective'],
    'name' => $row['name']
  );
}

if (!empty($addresses)){
include 'addresses.html.php';
}
else
{
  $error = 'Não existe endereços cadastrados para este usuário!';
  echo "<p><a href='?add'>Adicionar um novo endereço</a></p>";
  include 'error.html.php';
  exit();
}
//**************************************FIM PESQUISA NO BANCO DE DADOS DOS ENDEREÇOS CADASTRADOS***********************************
?>
