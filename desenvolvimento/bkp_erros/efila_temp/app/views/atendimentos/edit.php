<?php require APPROOT . '/views/inc/header.php';
      require APPROOT . '/helpers/functions.php';
     
?>

<!--FUNÇÃO QUE SETA O FOCO AO CARREGAR O FORMULÁRIO-->
<script>
window.onload = function(){focofield("estabelecimento");}
</script>

<!--MENSÁGEM NO TOPO DO FORMULÁRIO-->
<?php flash('post_message');?>


<hr>
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">ALTERANDO ATENDIMENTOS</h3>
    <div class="card-body">
        
        <form action="<?php echo URLROOT; ?>/atendimentos/edit/<?php echo $data['id']; ?>" method="post">    

        <legend>Dados do Atendimento</legend>
        <fieldset>

       

        <!--DESCRIÇÃO-->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="descricao">Descrição: <sup>*</sup></label>
                <input 
                  class="form-control <?php echo (!empty($data['descricao_err'])) ? 'is-invalid' : ''; ?>"
                  type="text"  
                  name="descricao"
                  id="descricao";
                  placeholder="Descrição do atendimento"
                  value="<?php echo $data['descricao']; ?>"
                  onkeydown="upperCaseF(this)"
                  > 
                  <span class="invalid-feedback"><?php echo $data['descricao_err']; ?></span>
            </div>
        </div>
                 


        <!--IDADE MÍNIMA EM MESES-->
        <div class="form-row">
            <div class="form-group">
                <label for="idade_minima">Idade Mínima em Meses: <sup>*</sup></label>
                <input style="width:70px;"
                  class="form-control onlynumbers <?php echo (!empty($data['idade_minima_err'])) ? 'is-invalid' : ''; ?>" 
                  type="number" 
                  name="idade_minima" 
                  id="idade_minima"
                  value="<?php echo $data['idade_minima']; ?>"                           
                  >
                  <span class="invalid-feedback"><?php echo $data['idade_minima_err']; ?></span>        
            </div>
        </div> 
        
        <!--IDADE MÁXIMA-->
        <div class="form-row">
            <div class="form-group">
                <label for="idade_maxima">Idade Máxima em Meses: <sup>*</sup></label>
                <input style="width:70px;" 
                  class="form-control onlynumbers <?php echo (!empty($data['idade_maxima_err'])) ? 'is-invalid' : ''; ?>" 
                  type="number" 
                  name="idade_maxima" 
                  id="idade_maxima"
                  value="<?php echo $data['idade_maxima']; ?>"          
                  >
                  <span class="invalid-feedback"><?php echo $data['idade_maxima_err']; ?></span>                        
            </div> 
        </div>    

       
       
        </fieldset>


       
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo URLROOT; ?>/atendimentos" class="btn btn-light"><i class="fa fa-backward"></i>Voltar</a>
        


        </form>
        

    </div><!--<div class="card-body">-->    
</div><!--<div class="card">-->   
<hr> 
<?php require APPROOT . '/views/inc/footer.php'; ?>

