<?php 
//include_once ('../../includes/constantes.php');
//include_once AUXILIARES.'/helpers.inc.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <title>Gerenciamento de Usuários</title>
  </head>
  <body>    
    <div id="titulo">
      <p>Gerenciamento de Usuários</p>
    </div>
    <a class="link" href="?add">Adicionar novo Usuário</a><br><br>
    <button class="botao"><a style="text-decoration:none; cursor:default; color:black;" href="../index.php">Retornar</a></button>
    <div id="enderecos">
        <?php foreach ($users as $user): ?>
        <ul>
          <li>
            <form action="" method="post">
              <div>
                <?php htmlout($user['name']); ?>
                <input type="hidden" name="id" value="<?php
                    echo $user['id']; ?>"><br>
                <input type="submit" class="botao" name="action" value="Edite">
                <input type="submit" class="botao" name="action" value="Delete">
              </div>
            </form>
          </li>
        </ul>
        <?php endforeach; ?>
  </body>
    </div>    
    
</html>
