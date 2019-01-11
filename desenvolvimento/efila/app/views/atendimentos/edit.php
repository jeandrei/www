<?php require APPROOT . '/views/inc/header.php';
      require APPROOT . '/helpers/functions.php';
?>

<?php flash('post_message');?>
 <div class="row align-items-center mb-3">
    <div class="col-md-12">
        <hr>
        <h1>Editando Estabelecimento de Ensino</h1>        
        <hr>

        <form action="<?php echo URLROOT; ?>/estabelecimentos/edit/<?php echo $data['id']; ?>" method="post">   

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
                  placeholder="Nome do estabelecimento de Ensino"
                  value="<?php echo $data['nome']; ?>"> 
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
                  placeholder="Endereço do estabelecimento de Ensino">
                  <span class="invalid-feedback"><?php echo $data['endereco_err']; ?></span>        
            </div>   

        </fieldset>


       
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo URLROOT; ?>/estabelecimentos" class="btn btn-light"><i class="fa fa-backward"></i>Voltar</a>
        
        </form>
        

    </div><!--col-md-12-->
</div><!--div class="row align-items-center mb-3-->    
<?php require APPROOT . '/views/inc/footer.php'; ?>

