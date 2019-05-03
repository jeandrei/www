<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fila Única</title>

    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        #principal{
          margin: 10px 40px;
        }
    </style>  
  

   
  </head>
  <body>

<img src="img/LOGO.png" class="img-fluid" alt="Responsive image">

<?php


?>
    
    
<div id="principal">
      <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Cadastro realizado com sucesso!</h4>
          <p>Seu cadastro na Fila Única de Penha/SC foi realizado com sucesso.</p>
          <p> Anote o número do seu protocolo:<h1>Potocolo:<?php echo  $protocolo; ?></h1></p>
          <p>Quando da disponibilidade de uma vaga para a sua solicitação e respeitando a ordem de inscrição, a secretaria de educação entrará em contato
            para o processo de matrícula do aluno.
            Dúvidas podem ser sanadas nos telefones:<br>
            <br>(47) 3345-4025
            <br>(47) 3345-2388            
          </p>
          Abaixo estão as informações do seu cadastro.          
          <hr>
            <p class="mb-0">
              <?php  
                    echo "O nome do aluno é: <b>" . $data['nome'] . "</b><br>";
                    echo "As opções que você escolheu são: <b>";
                      if(!empty($data['setor1'])){
                        echo getEscola($pdo,$data['setor1']);
                      }
                      if(!empty($data['setor2'])){
                        echo ",opcao2 " . getEscola($pdo,$data['setor2']);
                      }
                      if(!empty($data['setor3'])){
                        echo ", " . getEscola($pdo,$data['setor3']);
                      } 
                      $posicao = buscaPosicaoFila($pdo,$protocolo);
                      echo "</b><br>A etapa para a data de nascimento do aluno é: <b>" . getDescricaoEtapa($pdo,$id_etapa) . "</b>";
                      echo "<br>A posição na fila é: <b>" . $posicao['posicao'] . "</b>";
                     
              ?>
            </p>
        </div>
</div>
  </body>
</html>