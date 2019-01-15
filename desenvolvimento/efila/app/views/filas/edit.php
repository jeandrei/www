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
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">CADASTRO DE filas</h3>
    <div class="card-body">

         <form action="<?php echo URLROOT; ?>/filas/edit/<?php echo $data['id']; ?>" method="post">    

        <legend>Dados do fila</legend>
        <fieldset>
       
        
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="atendimento">Atendimento:</label>                             
                <select 
                    class="form-control <?php echo (!empty($data['atendimento_id_err'])) ? 'is-invalid' : ''; ?>"
                    name="atendimento_id" 
                    id="atendimento_id"
                >

                    <option value="NULL">Selecione o estabelecimento</option>
                    
                    <?php foreach($data['atendimentos'] as $atendimento) : ?> 
                        <option value="<?php echo $atendimento->atendimento_id;?>"<?php if($atendimento->atendimento_id == $data['atendimento_id']){echo " selected";};?>>
                            <?php echo $atendimento->descricao;?>
                        </option>
                    <?php endforeach; ?>  
                
                </select>   
                <span class="invalid-feedback"><?php echo $data['atendimento_id_err']; ?></span>
            </div>
        </div>            
        
        <?php //não está trazendo o id do atendimento_id  die(var_dump($data));?>
        

        <!--DATA INICIAL-->
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="dataini">Data início: <sup>*</sup></label>
                <input 
                  class="form-control <?php echo (!empty($data['dataini_err'])) ? 'is-invalid' : ''; ?>"
                  type="date"  
                  name="dataini"
                  id="dataini";                 
                  value="<?php echo $data['dataini']; ?>"                  
                  > 
                  <span class="invalid-feedback"><?php echo $data['dataini_err']; ?></span>
            </div>
        </div>

         <!--DATA FINAL-->
         <div class="form-row">
            <div class="form-group col-md-2">
                <label for="datafim">Data termino: <sup>*</sup></label>
                <input 
                  class="form-control <?php echo (!empty($data['dataini_err'])) ? 'is-invalid' : ''; ?>"
                  type="date"  
                  name="datafim"
                  id="datafim";                 
                  value="<?php echo $data['datafim']; ?>"                  
                  > 
                  <span class="invalid-feedback"><?php echo $data['datafim_err']; ?></span>
            </div>
        </div>    
       
        </fieldset>


       
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo URLROOT; ?>/filas" class="btn btn-light"><i class="fa fa-backward"></i>Voltar</a>
        


        </form>
        

    </div><!--<div class="card-body">-->    
</div><!--<div class="card">-->   
<hr> 
<?php require APPROOT . '/views/inc/footer.php'; ?>

