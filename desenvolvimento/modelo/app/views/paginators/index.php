<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p>


<table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Protocolo</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data['registros'] as $registro):?>
        <tr>
            <td><?php echo strtoupper($registro->nomecrianca); ?></td>
            <td><?php echo date('d/m/Y h:i:s', strtotime($registro->nascimento)); ?></td>
            <td><?php echo $registro->protocolo;?></td>
            <td><?php echo $registro->status;?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php require APPROOT . '/views/inc/footer.php'; ?>

