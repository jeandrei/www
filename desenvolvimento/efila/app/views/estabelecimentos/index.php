<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message');?>
 <div class="row align-items-center mb-3">
    <div class="col-md-6">
        <h1>Estabelecimentos de Ensino</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/estabelecimentos/add" class="btn btn-primary float-right">
            <i class="fa fa-pencil"></i> Adicionar
        </a>
    </div>
 </div> 



 <!--TABELA-->
 <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        
        <?php foreach($data['estabelecimentos'] as $registro) : ?>    
        
        <tbody>
            <tr>
                <td><?php echo $registro->nome;?></td>
            </tr>
        </tbody>    
        </div>
    <?php endforeach; ?>
</table>


<?php require APPROOT . '/views/inc/footer.php'; ?>