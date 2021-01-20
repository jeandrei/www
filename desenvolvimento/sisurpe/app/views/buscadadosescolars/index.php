<?php require APPROOT . '/views/inc/header.php'; ?>
<?php echo URLROOT; ?>
<?php flash('mensagem');?>

<script>
  function limpar(){
        document.getElementById('ano').value = "";
        document.getElementById('escola_id').value = "NULL";
        document.getElementById('etapa_id').value = "NULL";
        document.getElementById('turno').value = "NULL";
        document.getElementById('kit_inverno').value = "NULL";
        document.getElementById('kit_verao').value = "NULL";        
        document.getElementById('tam_calcado').value = "NULL";
        document.getElementById('sexo').value = "NULL";
        
        document.getElementById('ano').focus(); 
    }    
       

    //PARA ABRIR EM UMA NOVA ABA CRIO ESSA FUNÇÃO NEWTAB QUE É CHAMADA NO EVENTO ONCLICK DO BOTÃO IMPRIMIR
    function newtab(){
      document.getElementById('filtrar').setAttribute('target', '_blank');
    }

    function notab(){
      document.getElementById('filtrar').setAttribute('target', '');
    }


     //espera a página carregar completamente
     $(document).ready(function(){  
           //seleciona o objeto select da página    
            $(document).on('change','select', function(){ 
                //atribui os valores do id e do status as variáveis
                var id_grupo=$("#id_grupo").val();
                var idRegistro=$("#aluno_id_linha").val();                 
                    //monta a url chamando o método updateStatus no controller e passa através do GET o id e o Status  
                    $.get("<?php echo URLROOT; ?>/anuals/updateGrupo?id_reg=" + idRegistro + "&id_grupo=" + id_grupo, function(data){                                          
                });
            });
        });







</script>


<!--JOGO O VALOR DA ID QUE ESTÁ NO SELECT ATRAVÉS DO EVENTO onChange para aluno_id PARA DEPOIS CHAMAR NO AJAX-->
<input type="hidden" id="id_cor" name="id_cor" value="">
<input type="hidden" id="aluno_id_linha" name="aluno_id_linha" value="">
 



<h1><?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p>

<?php
  $paginate = $data['paginate'];
  $result = $data['results'];
?>

<form id="filtrar" action="<?php echo URLROOT; ?>/buscadadosescolars/index" method="post" enctype="multipart/form-data">
  <div class="row"> 
      <!-- COLUNA 1 ANO-->
      <div class="col-lg-2">
              <label for="ano">
                 ANO
              </label>
              <input 
                  type="text" 
                  name="ano" 
                  id="ano" 
                  maxlength="60"
                  class="form-control"
                  value="<?php if(isset($_POST['ano'])){htmlout($_POST['ano']);} ?>"               
                  >
        <!--<div class="col-lg-4">-->
        </div>
  <!--<div class="row"> -->  
  </div>

<hr>

  <div class="row"> 
      <!-- COLUNA ESCOLA -->
      <div class="col-lg-4">
            <label for="escola_id">
                Escola
            </label>  
            <select 
                name="escola_id" 
                id="escola_id" 
                class="form-control"                                        
            >
                    <option value="NULL">Todos</option>
                    <?php                     
                    $escolas = $this->anualModel->getEscolas();                                     
                    foreach($escolas as $escola) : ?> 
                        <option value="<?php echo $escola->id; ?>"
                                    <?php if(isset($_POST['escola_id'])){
                                    echo $_POST['escola_id'] == $escola->id ? 'selected':'';
                                    }
                                    ?>
                        >
                            <?php echo $escola->nome;?>
                        </option>
                    <?php endforeach; ?>  
            </select>
      <!--div class="col-lg-4-->
      </div>

        <!-- COLUNA ETAPA -->
      <div class="col-lg-3">
            <label for="etapa_id">
                Etapa
            </label>  
            <select 
                name="etapa_id" 
                id="etapa_id" 
                class="form-control"                                        
            >
                    <option value="NULL">Todos</option>
                    <?php                     
                    $etapas = $this->anualModel->getEtapas();                                     
                    foreach($etapas as $etapa) : ?> 
                        <option value="<?php echo $etapa->id; ?>"
                                    <?php if(isset($_POST['etapa_id'])){
                                    echo $_POST['etapa_id'] == $etapa->id ? 'selected':'';
                                    }
                                    ?>
                        >
                            <?php echo $etapa->descricao;?>
                        </option>
                    <?php endforeach; ?>  
            </select>
      <!--div class="col-lg-3-->
      </div>

      <!-- TURNO -->                              
      <div class="form-group col-md-2">
        <label for="turno">Turno</label>
        <select
          class="form-control"      
          name="turno"
          id="turno">
            <option value="NULL" <?php echo (($_POST['turno'])=="NULL") ? 'selected' : ''; ?> >Todos</option>
            <option value="M" <?php echo (($_POST['turno'])=="M") ? 'selected' : ''; ?> >Matutino</option>
            <option value="V" <?php echo (($_POST['turno'])=="V") ? 'selected' : ''; ?> >Vespertino</option>
            <option value="N" <?php echo (($_POST['turno'])=="N") ? 'selected' : ''; ?> >Noturno</option>
        </select>         
      </div>  

      <!-- TIPO DE ATENDIMENTO -->                              
      <div class="form-group col-md-3">
        <label for="turno">Tipo de atendimento optado</label>
        <select
          class="form-control"      
          name="opcao_atendimento"
          id="opcao_atendimento">
            <option value="NULL" <?php echo (($_POST['opcao_atendimento'])=="NULL") ? 'selected' : ''; ?> >Todos</option>
            <option value="presencial" <?php echo (($_POST['opcao_atendimento'])=="presencial") ? 'selected' : ''; ?> >Presencial</option>
            <option value="remoto" <?php echo (($_POST['opcao_atendimento'])=="remoto") ? 'selected' : ''; ?> >Remoto</option>            
        </select>         
      </div>  
  
  <!--<div class="row"> -->  
  </div>

  <hr>

  <div class="row">
      <div class="col-md-3">
        <label for="kit_inverno">Kit de Inverno</label>
          <select
            class="form-control"
            name="kit_inverno"
            id="kit_inverno"          
            placeholder="Tamanho do Kit de Inverno">
            <option value="NULL">Selecione o Tamanho</option>
            <?php                            
              echo(imptamanhounif($_POST['kit_inverno']));
            ?>
          </select>
      </div>
      
      <div class="col-md-3">                            
          <label for="kit_verao">Kit de Verão</label>
            <select
              class="form-control"
              name="kit_verao"
              id="kit_verao"          
              placeholder="Tamanho do Kit de Verão">
              <option value="NULL">Selecione o Tamanho</option>
              <?php
                echo(imptamanhounif($_POST['kit_verao']));
              ?>
            </select>
      </div> 
    
      <div class="col-md-3"> 
        <label for="tam_calcado">Calçado</label>
          <select
            class="form-control"
            name="tam_calcado"
            id="tam_calcado"          
            placeholder="Tamanho do Calçado">
            <option value="NULL">Selecione o Tamanho</option>
            <?php
              echo(imptamanhounif($_POST['tam_calcado']));
            ?>
          </select>
      </div>  

      <!-- TURNO -->                              
      <div class="form-group col-md-3">
        <label for="turno">Sexo</label>
        <select
          class="form-control"      
          name="sexo"
          id="sexo">
            <option value="NULL" <?php echo (($_POST['sexo'])=="NULL") ? 'selected' : ''; ?> >Selecione</option>
            <option value="M" <?php echo (($_POST['sexo'])=="M") ? 'selected' : ''; ?> >Masculino</option>
            <option value="F" <?php echo (($_POST['sexo'])=="F") ? 'selected' : ''; ?> >Feminino</option>              
        </select>         
      </div>   
     
  <!--div class="row"-->
  </div> 

<hr>

  <div class="row">       
      <!-- LINHA PARA O BOTÃO ATUALIZAR -->    
      <div class="col" style="padding-left:0; margin-top:15px;">
          <div class="form-group mx-sm-3 mb-2">
              <input type="submit" name="botao" class="btn btn-primary mb-2" value="Atualizar" onClick="notab()">
              <input type="submit" name="botao" class="btn btn-primary mb-2" value="Imprimir" onClick="newtab()">                   
              <input type="button" class="btn btn-primary mb-2" value="Limpar" onClick="limpar()"> 
          </div>                                                
      </div>
  <!--div class="row"-->
  </div>

</form>

<br>
<!-- MONTAR A TABELA -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>      
      <th scope="col">Nascimento</th> 
      <th scope="col">Sexo</th> 
      <th scope="col">Etapa</th>  
      <th scope="col">Turno</th>       
      <th scope="col">Kit de Inverno</th> 
      <th scope="col">Kit de Verão</th>      
      <th scope="col">Calçado</th> 
      <th scope="col">Atendimento</th>     
      <th scope="col">Grupo</th>  
      <th scope="col"></th> 
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $row) : ?> 
    <tr>  
      <td><?php echo $row['nome_aluno']; ?></td>
      <td><?php echo date('d-m-Y', strtotime($row['nascimento'])); ?></td>
      <td><?php echo $row['sexo']; ?></td> 
      <td><?php echo $row['etapa']; ?></td> 
      <td><?php echo $row['turno']; ?></td>
      <td><?php echo $row['kit_inverno']; ?></td>
      <td><?php echo $row['kit_verao']; ?></td>    
      <td><?php echo $row['calcado']; ?></td>      
      <td><?php echo $row['opcao_atendimento']; ?></td>

      <td>
      <select class="form-control form-control-sm"
                    name="grupos" 
                    id="grupos"
                    class="form-control" 
                    onChange="
                            document.getElementById('id_cor').value = this.value;
                            //preciso passar o id do dados_anuais                                                      
                            "
                    > 
                                    
                  
                    <option value="NULL" <?php echo (($_POST['grupos'])=="NULL") ? 'selected' : ''; ?> >Selecione</option>
                    <?
                    $grupos = $this->anualModel->getGrupos(); 
                    foreach($grupos as $grupo) : ?> 
                        <option value="<?php echo $grupo->grupo_id; ?>" 
                                    <?php //echo $grupo->grupo_id == $row['grupos'] ? 'selected':'';?>
                        >
                            <?php echo $grupo->nome;?>
                        </option>
                    <?php endforeach; ?>  
            </select>
      </td>




      <td> </td>
    </tr>
    <?php endforeach; ?>    
  </tbody>
</table>
<?php  
    

    /*
     * Echo out the UL with the page links
     */
    echo '<p>'.$paginate->links_html.'</p>';

    /*
     * Echo out the total number of results
     */
    echo '<p style="clear: left; padding-top: 10px;">Total de Registros: '.$paginate->total_results.'</p>';

    /*
     * Echo out the total number of pages
     */
    echo '<p>Total de Paginas: '.$paginate->total_pages.'</p>';

    echo '<p style="clear: left; padding-top: 10px; padding-bottom: 10px;">-----------------------------------</p>';

   












?>














<?php require APPROOT . '/views/inc/footer.php'; ?>