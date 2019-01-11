<?php require APPROOT . '/views/inc/header.php';
      require APPROOT . '/helpers/functions.php';
?>

<!--FUNÇÃO QUE SETA O FOCO AO CARREGAR O FORMULÁRIO-->
<script>
window.onload = function(){focofield("nome");}
</script>

<hr>
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">CADASTRO DE ESTABELECIMENTO</h3>
    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/estabelecimentos/add" method="post">    

        <legend>Dados do Estabelecimento</legend>
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
                  placeholder="Nome do estabelecimento de Ensino"
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
                  placeholder="Endereço do estabelecimento de Ensino"
                  onkeydown="upperCaseF(this)"
                  >
                  <span class="invalid-feedback"><?php echo $data['endereco_err']; ?></span>        
            </div>   

        </fieldset>


       
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo URLROOT; ?>/estabelecimentos" class="btn btn-light"><i class="fa fa-backward"></i>Voltar</a>
        
        </form>
        

    </div><!--card-body-->
</div><!--class="card"-->    
<?php require APPROOT . '/views/inc/footer.php'; ?>

