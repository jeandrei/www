<?php require APPROOT . '/views/inc/header.php';


?>

<!--MENSAGEM NO TOPO DO FORMULÁRIO-->
<?php flash('post_message');?>

<!-- Adicionar -->
<div class="container-fluid text-right">
    <a href="<?php echo URLROOT; ?>/alunos/add/<?php echo $_SESSION['user_id']; ?>" class="btn btn-success">
        <i class="fa fa-pencil"></i> Adicionar Aluno
    </a>
</div>

<hr>

<!-- TABELA -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">alunos</h3>
  <div class="card-body">
    <div id="table" class="">
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-left col-md-6">NOME DO ALUNO</th>          
          <th class="text-center"></th>
          <th class="text-center"></th>          
        </tr>
       <?php //die(var_dump($data['inscricoes']));?>
        <?php foreach($data['alunos'] as $registro) : ?> 

        <tr>
        <td class="pt-3-half text-left"><?php echo $registro->nome;?></td>
         
          <td>
            <span class="table-edit"><a href="<?php
             if($data['inscricoes'] <> NULL){ 
                if (!in_array($registro->id, $data['inscricoes'])){
                  echo URLROOT; ?>/inscricoes/add/<?php echo $registro->id; 
                }
              }else{
                echo URLROOT; ?>/inscricoes/add/<?php echo $registro->id;
              }
              ?>" 
              class="btn 
              <?php
              if($data['inscricoes'] <> NULL){
                  if (in_array($registro->id, $data['inscricoes'])){
                    echo "btn-secondary disabled";
                  }
                  else{
                    echo "btn-success";
                  }
              }else{
                  echo "btn-success";
                }
              ?>
              btn-rounded btn-sm my-0">
              <?php
                if($data['inscricoes'] <> NULL){
                  if (in_array($registro->id, $data['inscricoes'])){
                    echo "Inscrito";
                  }
                  else{
                    echo "Inscrever";
                  }
                }else{
                  echo "Inscrever";
                }
              ?> 
              </a></span>
            
          </td>
          
          <td>
            <span class="table-remove">
            <a href="<?php echo URLROOT; ?>/alunos/delete/<?php echo $registro->id; ?>" 
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