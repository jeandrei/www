<?php require 'header.php'; ?>

<div class="card">
  <h5 class="card-header">Consulta do protocolo número: <b><?php echo $data->protocolo; ?></b> | Data de registro: <b><?php echo date('d/m/Y H:i:s', strtotime($data->registro));?></b></h5>
  <div class="card-body">
    <h5 class="card-title">Posição na fila de espera: <b><?php echo $data->posicao; ?></b> para a etapa <b><?php echo $data->etapa; ?>.</b></h5>
    <p class="card-text">Status atual:<b> <?php echo $data->status; ?></b></p>
    <p class="card-text">Responsável pelo cadastro:<b> <?php echo $data->responsavel; ?></b></p>
    <p class="card-text">Iniciais do nome da criança:<b> <?php echo iniciais($data->nome); ?></b></p>
    <p class="card-text">Data de nascimento da criança:<b> <?php echo date('d/m/Y', strtotime($data->nascimento)); ?></b></p>
    
    <div class="container">    
    <div class="row">
      <div class="col text-center">
      <a class="btn btn-secondary text-center" href="<?php echo URLROOT; ?>">Voltar</a>
      </div>
    </div>

</div>
  </div>
</div>

<?php require 'footer.php'; ?>