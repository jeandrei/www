<?php require APPROOT . '/views/inc/header.php';
      require APPROOT . '/helpers/functions.php';
?>

<!--FUNÇÃO QUE SETA O FOCO AO CARREGAR O FORMULÁRIO-->
<script>
window.onload = function(){focofield("nome");}
</script>

<hr>
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">INSCRIÇÃO DE ALUNO</h3>
    <div class="card-body">

<?php //die(var_dump($data['filas']));?>

        <form action="<?php echo URLROOT; ?>/estabelecimentos/add" method="post">    

        <legend>Dados do Aluno</legend>
        <fieldset>

        <!--ENDEREÇO-->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="nome">Nome:</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="nome" 
                  id="nome"                         
                  placeholder="<?php echo $data['aluno']->nome; ?>" readonly> 
            </div>    
        </div>                    


        <!--ENDEREÇO-->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="endereco">Endereço:</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="endereco" 
                  id="endereco"                         
                  placeholder="<?php echo $data['aluno']->endereco; ?>" readonly> 
            </div>    
        </div> 

         <!--NASCIMENTO-->
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="nascimento">Nascimento:</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="nascimento" 
                  id="nascimento"                         
                  placeholder="<?php echo $data['aluno']->nascimento; ?>" readonly> 
            </div>    
        </div>

        <!--ATENDIMENTO-->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="filas">Selecione o atendimento:</label>                             
                <select 
                    class="form-control <?php echo (!empty($data['filas_id_err'])) ? 'is-invalid' : ''; ?>"
                    name="filas" 
                    id="filas"
                >

                    <option value="NULL">Selecione o atendiemnto</option>
                    <?php foreach($data['filas'] as $fila) : ?> 
                        <option value="<?php echo $fila->id;?>">
                            <?php echo $fila->atendimento;?>
                        </option>
                    <?php endforeach; ?>  
                
                </select>   
                <span class="invalid-feedback"><?php echo $data['atendimentos_id_err']; ?></span>
            </div>
        </div>
        

        <!--ESTABELECIMENTO OPÇÃO 1-->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="estabelecimento1">1º Opção de Estabelecimento:</label>                             
                <select 
                    class="form-control <?php echo (!empty($data['estabelecimento1_id_err'])) ? 'is-invalid' : ''; ?>"
                    name="estabelecimento1" 
                    id="estabelecimento1"
                >

                    <option value="NULL">Selecione o estabelecimento</option>
                    <?php foreach($data['estabelecimentos'] as $estabelecimento) : ?> 
                        <option value="<?php echo $estabelecimento->id;?>">
                            <?php echo $estabelecimento->nome;?>
                        </option>
                    <?php endforeach; ?>  
                
                </select>   
                <span class="invalid-feedback"><?php echo $data['estabelecimento1_id_err']; ?></span>
            </div>
        </div>

        
        <!--ESTABELECIMENTO OPÇÃO 2-->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="estabelecimento2">2º Opção de Estabelecimento:</label>                             
                <select 
                    class="form-control <?php echo (!empty($data['estabelecimento2_id_err'])) ? 'is-invalid' : ''; ?>"
                    name="estabelecimento2" 
                    id="estabelecimento2"
                >

                    <option value="NULL">Selecione o estabelecimento</option>
                    <?php foreach($data['estabelecimentos'] as $estabelecimento) : ?> 
                        <option value="<?php echo $estabelecimento->id;?>">
                            <?php echo $estabelecimento->nome;?>
                        </option>
                    <?php endforeach; ?>  
                
                </select>   
                <span class="invalid-feedback"><?php echo $data['estabelecimento2_id_err']; ?></span>
            </div>
        </div>

        <!--ESTABELECIMENTO OPÇÃO 3-->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="estabelecimento3">3º Opção de Estabelecimento:</label>                             
                <select 
                    class="form-control <?php echo (!empty($data['estabelecimento3_id_err'])) ? 'is-invalid' : ''; ?>"
                    name="estabelecimento3" 
                    id="estabelecimento3"
                >

                    <option value="NULL">Selecione o estabelecimento</option>
                    <?php foreach($data['estabelecimentos'] as $estabelecimento) : ?> 
                        <option value="<?php echo $estabelecimento->id;?>">
                            <?php echo $estabelecimento->nome;?>
                        </option>
                    <?php endforeach; ?>  
                
                </select>   
                <span class="invalid-feedback"><?php echo $data['estabelecimento3_id_err']; ?></span>
            </div>
        </div>




        </fieldset>


       
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo URLROOT; ?>/alunos" class="btn btn-light"><i class="fa fa-backward"></i>Voltar</a>
        
        </form>
        

    </div><!--card-body-->
</div><!--class="card"-->    
<?php require APPROOT . '/views/inc/footer.php'; ?>

