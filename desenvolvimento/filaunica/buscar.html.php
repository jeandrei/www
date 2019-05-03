<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
   
   <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">

  <!--jquery-->
  <script src="<?php echo URLROOT; ?>/js/jquery-3.3.1.min.js"></script> 

   <!--jquery mask-->
   <script src="<?php echo URLROOT; ?>/js/jquery.mask.js" data-autoinit="true"></script>
   

  <!--Botstrap main-->
  <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>

  <!--Javascript funções-->
  <script src="<?php echo URLROOT; ?>/js/main.js"></script>
   
</head>

<body>
<img src="img/LOGO.png" class="img-fluid" alt="Responsive image">
<hr>
<h1 align="center">RESULTADO DA BUSCA POR PROTOCOLO</h1>
  <div class="text-center">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Registro</th>
          <th scope="col">Protocolo</th>
          <th scope="col">Posição na fila</th>
          <th scope="col">Responsável</th>
          <th scope="col">Nome da Criança</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Etapa</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo date('d/m/Y H:i:s', strtotime($registro['registro']));?>
          <td><?php echo $protocolo;?>
          <td><?php echo $posicao['posicao'];?>
          <td><?php echo $registro['responsavel'];?>
          <td><?php echo iniciais($registro['nome']);?>
          <td><?php echo date('d/m/Y', strtotime($registro['nascimento']));?>
          <td><?php echo $registro['etapa'];?>
          <td>
              <span class="badge 
                      <?php echo (($registro['status']) == "Aguardando") ? 'badge-success' : 'badge-danger'; ?>
                      align-middle">        
                      <?php echo $registro['status']; ?>
              </span> 
          </td>        
        </tr>
        <hr>
      </tbody>
    </table>    
          <a class="btn btn-secondary" href="<?php echo URLROOT; ?>">Voltar</a>
  </div> 

</body>
</html>