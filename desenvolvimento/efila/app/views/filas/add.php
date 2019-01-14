<?php require APPROOT . '/views/inc/header.php';
      require APPROOT . '/helpers/functions.php';
     
?>

<script>
$( document ).ready(function() {
        $("#estabelecimento").on("change",function(){
            var idEstab = $("#estabelecimento").val();
            $.ajax({
                url: 'pega_atendimentos.php',
                type: 'POST',
                data:{id:idEstab},
                beforeSend: function(){
                    $("#atendimento").css({'display':'block'});
                    $("#atendimento").html("Carregando...");
                },
                success: function(data){
                    $("#atendimento").css({'display':'block'});
                    $("#atendimento").html(data);
                },
                error: function(data){
                    $("#atendimento").css({'display':'block'});
                    $("#atendimento").html("Houve um erro ao carregar");
                }

            });
            
            
        });
    });
</script>

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

        <form action="<?php echo URLROOT; ?>/filas/add" method="post">    

        <legend>Dados do fila</legend>
        <fieldset>

        <!--LISTBOX $estabelecimento->id VEM DE CONTROLER FUNÇÃO ADD QUE PEGA OS DADOS
        DA FUNÇÃO getEstabelecimentos DO MODEL fila
        -->
        
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="estabelecimento">Estabelecimento:</label>                             
                <select 
                    class="form-control <?php echo (!empty($data['descricao_err'])) ? 'is-invalid' : ''; ?>"
                    name="estabelecimento" 
                    id="estabelecimento"
                >

                    <option value="NULL">Selecione o estabelecimento</option>
                    <?php foreach($data['estabelecimentos'] as $estabelecimento) : ?> 
                        <option value="<?php echo $estabelecimento->id;?>">
                            <?php echo $estabelecimento->nome;?>
                        </option>
                    <?php endforeach; ?>  
                
                </select>   
                <span class="invalid-feedback"><?php echo $data['estebelecimento_err']; ?></span>
            </div>
        </div>
       
       
       
       
       <div>
        <select id="atendimento" style="display:none;"></select>
    </div>
        

       
        

        <!--DATA INICIAL-->
        <div class="form-row">
            <div class="form-group col-md-8">
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
            <div class="form-group col-md-8">
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
        <a href="<?php echo URLROOT; ?>/filas" class="btn btn-light"><i class="fa fa-backward"></i>Voltar</a>
        


        </form>
        

    </div><!--<div class="card-body">-->    
</div><!--<div class="card">-->   
<hr> 
<?php require APPROOT . '/views/inc/footer.php'; ?>

