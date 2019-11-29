<?php require APPROOT . '/views/inc/nav_header.php'; ?>
<h1>Lista de Espera</h1>




<!--TABELA COM OS DADOS-->   
<div class="text-center small">
  <table class="table table-sm">
    <thead>
      <tr>  
        <th scope="col">Posição</th>        
        <th scope="col">Nome da Criança</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Etapa</th>          
        <th scope="col">Responsável</th> 
        <th scope="col">Protocolo</th>
        <th scope="col">Registro</th>
        <th scope="col">Comp Residência</th>
        <th scope="col">Comp Nascimento</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
          
    <tbody>        
        <?php foreach ($data as $registro): ?>
            <tr>
                <td><?php echo $registro['posicao']; ?></td>
                <td><?php echo $registro['nome']; ?></td>
                <td><?php echo $registro['nascimento']; ?></td>
                <td><?php echo $registro['etapa']; ?></td>
                <td><?php echo $registro['responsavel']; ?></td>
                <td><?php echo $registro['protocolo']; ?></td>
                <td><?php echo $registro['registro']; ?></td>
                <td><?php echo $registro['comp_res']; ?></td>
                <td><?php echo $registro['comp_nasc']; ?></td>
                <td><?php echo $registro['status']; ?></td>
            </tr>            
        <?php endforeach; ?>
    </tbody>
  </table>                  

<?php require APPROOT . '/views/inc/nav_footer.php'; ?>