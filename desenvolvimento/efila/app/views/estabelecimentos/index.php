<?php require APPROOT . '/views/inc/header.php';


?>

<!--MENSAGEM NO TOPO DO FORMULÁRIO-->
<?php flash('post_message');?>

<!-- Adicionar -->
<div class="container-fluid text-right">
    <a href="<?php echo URLROOT; ?>/estabelecimentos/add" class="btn btn-success">
        <i class="fa fa-pencil"></i> Adicionar
    </a>
</div>

<hr>

<!-- TABELA -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">ESTABELECIMENTOS</h3>
  <div class="card-body">
    <div id="table" class="">
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-left col-md-6">NOME DO ESTABELECIMENTO</th>          
          <th class="text-center"></th>
          <th class="text-center"></th>
        </tr>
        
        <?php foreach($data['estabelecimentos'] as $registro) : ?> 

        <tr>
        <td class="pt-3-half text-left"><?php echo $registro->nome;?></td>
         
          <td>
            <span class="table-edit"><a href="<?php echo URLROOT; ?>/estabelecimentos/edit/<?php echo $registro->id; ?>" class="btn btn-primary btn-rounded btn-sm my-0">Editar</a></span>            
          </td>
          <td>
            <span class="table-remove">
            <a href="<?php echo URLROOT; ?>/estabelecimentos/delete/<?php echo $registro->id; ?>" 
                class="btn btn-danger btn-rounded btn-sm my-0"
                onclick="if(question('Tem certeza que deseja remover o registro?') == true)
                    {
                      document.forms[0].submit();
                    }
                    else
                    {										
                      return false;
                    }");
              >Remover
            </a></span>            
          </td>
        </tr>
        <?php endforeach; ?>  
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->

<hr>

<?php require APPROOT . '/views/inc/footer.php'; ?>