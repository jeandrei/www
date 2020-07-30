<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>Histórico</h1>
<a href="<?php echo URLROOT; ?>/admins" class="btn btn-light mt-3" style="margin:2em 0;"><i class="fa fa-backward"></i>Back</a>



<?php if($data['erro']!=null){die('Sem dados para emitir');}?>

<table class="table table-striped">
  <thead>
    <tr>      
      <th scope="col">Registro</th>
      <th scope="col">Usuário</th>
      <th scope="col">Status</th>
      <th scope="col">Histórico</th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach ($data as $registro): ?>
        <tr>      
            <td><?php echo $registro['registro']; ?></td>
            <td><?php echo $registro['usuario']; ?></td>
            <td><?php echo $registro['status']; ?></td>
            <td><?php echo $registro['historico']; ?></td>
        </tr>
    <?php endforeach; ?> 
    
    
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>