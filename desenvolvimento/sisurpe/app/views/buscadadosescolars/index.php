<?php require APPROOT . '/views/inc/header.php'; ?>
<script>
  function limpar(){
        document.getElementById('ano').value = "";
        document.getElementById('escola_id').value = "NULL";
        document.getElementById('tam_moletom').value = "NULL";
        document.getElementById('tam_moletom').value = "NULL";
        document.getElementById('tam_camiseta').value = "NULL";
        document.getElementById('tam_calca').value = "NULL";
        document.getElementById('tam_bermuda').value = "NULL";
        document.getElementById('tam_calcado').value = "NULL";
        document.getElementById('tam_meia').value = "NULL";
        document.getElementById('etapa_id').value = "NULL";
        document.getElementById('turno').value = "NULL";
        
        document.getElementById('ano').focus(); 
    }    
    
    document.getElementById('ano').focus(); 

</script>

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
        <!--div class="col-lg-3-->
        </div>

        <!-- COLUNA ETAPA -->
      <div class="col-lg-4">
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
        <div class="form-group col-md-3">
          <label for="turno">Turno</label>
          <select
            class="form-control"      
            name="turno"
            id="turno">
              <option value="NULL" <?php echo (($_POST['turno'])=="NULL") ? 'selected' : ''; ?> >Selecione</option>
              <option value="M" <?php echo (($_POST['turno'])=="M") ? 'selected' : ''; ?> >Matutino</option>
              <option value="V" <?php echo (($_POST['turno'])=="V") ? 'selected' : ''; ?> >Vespertino</option>
              <option value="N" <?php echo (($_POST['turno'])=="N") ? 'selected' : ''; ?> >Noturno</option>
          </select>         
        </div>  
  <!--<div class="row"> -->  
  </div>

  <hr>

  <div class="row">
        <div class="col-md-3">
          <label for="tam_moletom">Moletom</label>
            <select
              class="form-control"
              name="tam_moletom"
              id="tam_moletom"          
              placeholder="Tamanho do Moletom">
              <option value="NULL">Selecione o Tamanho</option>
              <?php                            
                echo(imptamanhounif($_POST['tam_moletom']));
              ?>
            </select>
        </div>
        

        <div class="col-md-3">                            
            <label for="tam_calca">Calça</label>
              <select
                class="form-control"
                name="tam_calca"
                id="tam_calca"          
                placeholder="Tamanho da Calça">
                <option value="NULL">Selecione o Tamanho</option>
                <?php
                  echo(imptamanhounif($_POST['tam_calca']));
                ?>
              </select>
        </div> 

 
      
      <div class="col-md-3">                               
        <label for="tam_camiseta">Camiseta</label>
          <select
            class="form-control"
            name="tam_camiseta"
            id="tam_camiseta"          
            placeholder="Tamanho da Camiseta">
            <option value="NULL">Selecione o Tamanho</option>
            <?php
              echo(imptamanhounif($_POST['tam_camiseta']));
            ?>
          </select>
      </div>
   <!--div class="row"-->      
   </div>

   <div class="row">
      <div class="col-md-3">      
        <label for="tam_bermuda">Bermuda</label>
        <select
          class="form-control"
          name="tam_bermuda"
          id="tam_bermuda"          
          placeholder="Tamanho da Bermuda">
          <option value="NULL">Selecione o Tamanho</option>
          <?php
            echo(imptamanhounif($_POST['tam_bermuda']));
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
                     
                    

      <div class="col-md-3">             
        <label for="tam_meia">Meia</label>
        <select
          class="form-control"
          name="tam_meia"
          id="tam_meia"          
          placeholder="Tamanho da Meia">
          <option value="NULL">Selecione o Tamanho</option>
          <?php
            echo(imptamanhounif($_POST['tam_meia']));
          ?>
        </select>
      </div>
  <!--div class="row"-->
  </div> 

<hr>

  <div class="row">       
       
       
        <!-- LINHA PARA O BOTÃO ATUALIZAR -->
        
            <div class="col" style="padding-left:0; margin-top:15px;">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="submit" class="btn btn-primary mb-2" value="Atualizar">                   
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
      <th scope="col">Etapa</th>  
      <th scope="col">Turno</th>       
      <th scope="col">Moletom</th> 
      <th scope="col">Camiseta</th>
      <th scope="col">Calça</th>
      <th scope="col">Bermuda</th>
      <th scope="col">Calçado</th>
      <th scope="col">Meia</th>
      <th scope="col"></th> 
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $row) : ?> 
    <tr>  
      <td><?php echo $row['nome_aluno']; ?></td>
      <td><?php echo date('d-m-Y', strtotime($row['nascimento'])); ?></td>
      <td><?php echo $row['etapa']; ?></td> 
      <td><?php echo $row['turno']; ?></td>
      <td><?php echo $row['moletom']; ?></td>
      <td><?php echo $row['camiseta']; ?></td>
      <td><?php echo $row['calca']; ?></td>
      <td><?php echo $row['bermuda']; ?></td>
      <td><?php echo $row['calcado']; ?></td>
      <td><?php echo $row['meia']; ?></td>
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