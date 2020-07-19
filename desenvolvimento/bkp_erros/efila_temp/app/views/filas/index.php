<?php require_once APPROOT . '/views/inc/header.php';
      require_once APPROOT . '/helpers/functions.php';
     
?>


<?php flash('post_message');?>

<!-- Adicionar -->
<div class="container-fluid text-right">
    <a href="<?php echo URLROOT; ?>/filas/add" class="btn btn-success">
        <i class="fa fa-pencil"></i> Adicionar
    </a>
</div>

<hr>

<!-- TABELA -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">filas</h3>
  <div class="card-body">
    <div id="table" class="">
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>  
          <th style="width:5%" class="text-center">STATUS</th>         
          <th style="width:60%" class="text-center">ATENDIMENTO</th>            
          <th style="width:5%" class="text-center">IDADE MÍNIMA </th>           
          <th style="width:5%" class="text-center">IDADE MÁXIMA </th>  
          <th style="width:10%" class="text-center">INÍCIO</th> 
          <th style="width:10%" class="text-center">FIM</th>          
          <th style="width:5%" class="text-center"></th>
          <th style="width:5%" class="text-center"></th>
        </tr>

                
        <?php foreach($data['filas'] as $registro) : ?> 

        <tr>
        <td class="pt-3-half text-center"> 
          <span class="badge 
                <?php echo (($registro->status) == "ativo") ? 'badge-success' : 'badge-danger'; ?>
                align-middle">        
                <?php echo $registro->status;?></td> 
          </span> 
        <td class="pt-3-half text-center"><?php echo $registro->atendimento;?></td>
        <td class="pt-3-half text-center"><?php echo $registro->idade_minima;?></td>        
        <td class="pt-3-half text-center"><?php echo $registro->idade_maxima;?></td> 
        <td class="pt-3-half text-center"><?php echo $registro->dataini;?></td> 
        <td class="pt-3-half text-center"><?php echo $registro->datafim;?></td>               
        <td>
            <span class="table-edit"><a href="<?php echo URLROOT; ?>/filas/edit/<?php echo $registro->id; ?>" class="btn btn-primary btn-rounded btn-sm my-0">Editar</a></span>            
          </td>
          <td>
            <span class="table-remove">
            <a href="<?php echo URLROOT; ?>/filas/delete/<?php echo $registro->id; ?>" 
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