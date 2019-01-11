<?php require APPROOT . '/views/inc/header.php';

                                                               
?>


<?php flash('post_message');?>


<hr>

<!-- TABELA -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">ATENDIMENTOS</h3>
  <div class="card-body">
    <div id="table" class="">
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th style="width:50%" class="text-left">ESTABELECIMENTO DE ENSINO</th>
          <th style="width:20%" class="text-center">DESCRIÇÃO</th>            
          <th style="width:5%" class="text-center">IDADE MÍNIMA</th>  
          <th style="width:10%" class="text-center">COMPLETAR ATÉ</th>  
          <th style="width:5%" class="text-center">IDADE MÁXIMA</th>  
          <th style="width:5%" class="text-center"></th>
          <th style="width:5%" class="text-center"></th>
        </tr>
        
        <?php foreach($data['atendimentos'] as $registro) : ?> 

        <tr>
        <td class="pt-2-half text-left"><?php echo $registro->nome_estabelecimento;?></td>
        <td class="pt-3-half text-center"><?php echo $registro->descricao;?></td>
        <td class="pt-3-half text-center"><?php echo $registro->idade_minima;?></td>
        <td class="pt-3-half text-center"><?php echo $registro->completar_ate;?></td>
        <td class="pt-3-half text-center"><?php echo $registro->idade_maxima;?></td> 
         
          <td>
            <span class="table-edit"><a href="<?php echo URLROOT; ?>/atendimentos/edit/<?php echo $registro->id; ?>" class="btn btn-primary btn-rounded btn-sm my-0">Editar</a></span>            
          </td>
          <td>
            <span class="table-remove">
            <a href="<?php echo URLROOT; ?>/atendmentos/delete/<?php echo $registro->id; ?>" 
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

<!-- Adicionar -->
<div class="col-md-6">
    <a href="<?php echo URLROOT; ?>/atendimentos/add" class="btn btn-success float-left">
        <i class="fa fa-pencil"></i> Adicionar
    </a>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>