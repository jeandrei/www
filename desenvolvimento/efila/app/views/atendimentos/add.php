<?php require APPROOT . '/views/inc/header.php';
      require APPROOT . '/helpers/functions.php';
     
?>

<!--FUNÇÃO QUE SETA O FOCO AO CARREGAR O FORMULÁRIO-->
<script>
window.onload = function(){focofield("descricao");}
</script>

<!--MENSÁGEM NO TOPO DO FORMULÁRIO-->
<?php flash('post_message');?>




 <div class="row align-items-center mb-3">
    <div class="col-md-12">
        <hr>
        <h1>Adicionando Atendimento</h1>        
        <hr>

        <form action="<?php echo URLROOT; ?>/atendimentos/add" method="post">    

        <legend>Dados do Atendimento</legend>
        <fieldset>

        <!--LISTBOX $estabelecimento->id VEM DE CONTROLER FUNÇÃO ADD QUE PEGA OS DADOS
        DA FUNÇÃO getEstabelecimentos DO MODEL ATENDIMENTO
        -->
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="estabelecimento">Selecione o Estabelecimento:</label>
            <select class="form-control" id="estabelecimento">
                <?php foreach($data['estabelecimentos'] as $estabelecimento) : ?> 
                    <option value="<?php echo $estabelecimento->id;?>"><?php echo $estabelecimento->nome;?></option>
                <?php endforeach; ?>  
            </select>
            </div>
        </div>
        

        <!--NOME-->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="nome">Descrição: <sup>*</sup></label>
                <input 
                  class="form-control <?php echo (!empty($data['nome_err'])) ? 'is-invalid' : ''; ?>"
                  type="text"  
                  name="nome"
                  id="nome";
                  placeholder="Descrição do atendimento"
                  value="<?php echo $data['nome']; ?>"
                  onkeydown="upperCaseF(this)"
                  > 
                  <span class="invalid-feedback"><?php echo $data['nome_err']; ?></span>
            </div>
        </div>
                 


        <!--IDADE MÍNIMA-->
        <div class="form-row">
            <div class="form-group">
                <label for="idade_minima">Idade Mínima: <sup>*</sup></label>
                <input style="width:70px;"
                  class="form-control <?php echo (!empty($data['endereco_err'])) ? 'is-invalid' : ''; ?>" 
                  type="text" 
                  name="idade_minima" 
                  id="idade_minima"
                  value="<?php echo $data['idade_minima']; ?>"          
                  >
                  <span class="invalid-feedback"><?php echo $data['idade_minima_err']; ?></span>        
            </div>
        </div>   

            <!--COMPLETOS ATÉ-->
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="endereco">Completos até: <sup>*</sup></label>
                <input 
                  class="form-control <?php echo (!empty($data['endereco_err'])) ? 'is-invalid' : ''; ?>" 
                  type="date" 
                  name="endereco" 
                  id="endereco"
                  value="<?php echo $data['endereco']; ?>"          
                  >
                  <span class="invalid-feedback"><?php echo $data['endereco_err']; ?></span>        
            </div>
        </div>

             <!--IDADE MÁXIMA-->
        <div class="form-row">
            <div class="form-group">
                <label for="endereco">Idade Máxima: <sup>*</sup></label>
                <input style="width:70px;" 
                  class="form-control <?php echo (!empty($data['endereco_err'])) ? 'is-invalid' : ''; ?>" 
                  type="text" 
                  name="endereco" 
                  id="endereco"
                  value="<?php echo $data['endereco']; ?>"          
                  >
                  <span class="invalid-feedback"><?php echo $data['endereco_err']; ?></span>        
            </div> 
        </div>    

        </fieldset>


       
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo URLROOT; ?>/atendimentos" class="btn btn-light"><i class="fa fa-backward"></i>Voltar</a>
        
        </form>
        

    </div><!--col-md-12-->
</div><!--div class="row align-items-center mb-3-->    
<?php require APPROOT . '/views/inc/footer.php'; ?>

