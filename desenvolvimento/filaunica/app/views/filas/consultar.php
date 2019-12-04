<?php require APPROOT . '/views/filas/header.php'; ?>




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
          <td><?php echo date('d/m/Y H:i:s', strtotime($data->registro));?></td>
          <td><?php echo $data->protocolo;?></td>
          <td><?php echo $data->posicao;?></td>
          <td><?php echo $data->responsavel;?></td>
          <td><?php echo iniciais($data->nome);?></td>
          <td><?php echo date('d/m/Y', strtotime($data->nascimento));?></td>
          <td><?php echo $data->etapa;?></td>
          <td>
                <span class="badge 
                        <?php echo (($data->status) == "Aguardando") ? 'badge-success' : 'badge-danger'; ?>
                        align-middle">        
                        <?php echo $data->status; ?>
                </span>  
          </td>        
        </tr>
        <hr>
      </tbody>
    </table>    
          <a class="btn btn-secondary" href="<?php echo URLROOT; ?>">Voltar</a>
  </div> 




<?php require APPROOT . '/views/filas/footer.php'; ?>