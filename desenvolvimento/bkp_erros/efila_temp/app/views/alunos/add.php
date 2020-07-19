<?php require APPROOT . '/views/inc/header.php';
      require APPROOT . '/helpers/functions.php';
?>

<!--FUNÇÃO QUE SETA O FOCO AO CARREGAR O FORMULÁRIO-->
<script>
window.onload = function(){focofield("nome");}
</script>

<hr>
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">CADASTRO DE ALUNOS</h3>
    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/alunos/add/<?php echo $_SESSION['user_id']; ?>" method="post">    

        <legend>Dados do Aluno</legend>
        <fieldset>

        <!--NOME-->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="nome">Nome: <sup>*</sup></label>
                <input 
                  class="form-control <?php echo (!empty($data['nome_err'])) ? 'is-invalid' : ''; ?>"
                  type="text"  
                  name="nome"
                  id="nome";
                  placeholder="Nome do aluno"
                  value="<?php echo $data['nome']; ?>"
                  onkeydown="upperCaseF(this)"
                  > 
                  <span class="invalid-feedback"><?php echo $data['nome_err']; ?></span>
            </div>
        </div>
                 


        <!--ENDEREÇO-->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="endereco">Endereço: <sup>*</sup></label>
                <input 
                  class="form-control <?php echo (!empty($data['endereco_err'])) ? 'is-invalid' : ''; ?>" 
                  type="text" 
                  name="endereco" 
                  id="endereco"
                  value="<?php echo $data['endereco']; ?>"          
                  placeholder="Endereço do aluno"
                  onkeydown="upperCaseF(this)"
                  >
                  <span class="invalid-feedback"><?php echo $data['endereco_err']; ?></span>        
            </div>          
        </div> 

        <!--NASCIMENTO-->
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="nascimento">Data de nascimento: <sup>*</sup></label>
                <input 
                  class="form-control <?php echo (!empty($data['nascimento_err'])) ? 'is-invalid' : ''; ?>"
                  type="date"  
                  name="nascimento"
                  id="nascimento";                 
                  value="<?php echo $data['nascimento']; ?>"                  
                  > 
                  <span class="invalid-feedback"><?php echo $data['nascimento_err']; ?></span>
            </div>
        </div>

        </fieldset>


       
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo URLROOT; ?>/alunos" class="btn btn-light"><i class="fa fa-backward"></i>Voltar</a>
        
        </form>
        

    </div><!--card-body-->
</div><!--class="card"-->    
<?php require APPROOT . '/views/inc/footer.php'; ?>

