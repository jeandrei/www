<?php require APPROOT . '/views/inc/header.php';


?>

<!--MENSAGEM NO TOPO DO FORMULÁRIO-->
<?php flash('post_message');?>

<!-- Adicionar -->
<div class="container-fluid text-right">
    <a href="<?php echo URLROOT; ?>/alunos" class="btn btn-success">
        <i class="fa fa-pencil"></i> Adicionar
    </a>
</div>

<hr>

<!-- TABELA -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">SUAS INSCRIÇÕES</h3>
  <div class="card-body">
    <div id="table" class="">
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-left col-md-6">NOME DO ALUNO</th> 
          <th class="text-center col-md-6">ATENDIMENTO</th> 
          <th class="text-center col-md-6">POSIÇÃO</th> 
          <th style="width:5%" class="text-center"></th>
          <th style="width:5%" class="text-center"></th>
        </tr>

       
        
        <?php foreach($data['inscricoes'] as $registro) : ?> 

        <tr>
        <td style="width:50%" class="pt-3-half text-left"><?php echo $registro->nome;?></td>
        <td style="width:30%" class="pt-3-half text-center"><?php echo $registro->descricao;?></td>
        <td style="width:10%" class="pt-3-half text-center"><?php echo $registro->ordem_fila . "º";?></td>
        <td>
            <span class="table-edit"><a href="<?php echo URLROOT; ?>/filas/ver/<?php echo $registro->fila_id; ?>" class="btn btn-primary btn-rounded btn-sm my-0">Ver</a></span>            
        </td>
        
          
          <td>
            <span class="table-remove">
            <a href="<?php echo URLROOT; ?>/inscricoes/delete/<?php echo $registro->id; ?>" 
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