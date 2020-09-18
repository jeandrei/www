<?php require APPROOT . '/views/inc/header.php'; ?>

<script>  
  function limpar(){
          document.getElementById('name').value = "";   
          document.getElementById('name').focus(); 
      }  
   

//espera a página carregar completamente
$(document).ready(function(){  
    $('.gravar').click(function() {
      var id=$("#id").val();
      var type=$("#type").val();
      console.log(id);
      console.log(type);
      
                
    }); 
});






</script>

<h1><?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p>

<?php
  $paginate = $data['paginate'];
  $result = $data['results'];  
?>


<form id="filtrar" action="<?php echo URLROOT; ?>/adminusers/index" method="post" enctype="multipart/form-data">
  <div class="row">
    <!-- COLUNA 1 name-->
    <div class="col-lg-4">
            <label for="name">
                Buscar por name
            </label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                maxlength="60"
                class="form-control"
                value="<?php if(isset($_POST['name'])){htmlout($_POST['name']);} ?>"
                onkeydown="upperCaseF(this)"   
                >
      <!--<div class="col-lg-4">-->
      </div>
      
        <!-- LINHA PARA O BOTÃO ATUALIZAR -->
        <div class="row" style="margin-top:30px;">
            <div class="col" style="padding-left:0;">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="submit" class="btn btn-primary mb-2" value="Atualizar">                   
                    <input type="button" class="btn btn-primary mb-2" value="Limpar" onClick="limpar()"> 
                </div>                                                
            </div>
            
        <!-- FIM LINHA BOTÃO ATUALIZAR -->
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
      <th scope="col">Email</th>           
      <th scope="col">Criado em</th> 
      <th scope="col">Tipo</th>
      <th scope="col"></th> 
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $row) : ?> 
            <tr>   
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                      <td><?php echo $row['type']; ?></td>
                      <td>
                        <select class="form-control form-control-sm"
                                    name="usertype" 
                                    id="<?php echo  $row['id'];?>" 
                                    class="form-control" 
                                    onChange="
                                            document.getElementById('id').value = <?php echo $row['id']; ?>;
                                            document.getElementById('type').value = this.value;
                                            ">                   
                                    <?php 
                                    $tipos = array('admin','sec','user');                    
                                    foreach($tipos as $tipo => $value) : ?> 
                                        <option value="<?php echo $value; ?>" 
                                                    <?php echo $value == $row['type'] ? 'selected':'';?>
                                        >
                                            <?php echo $value;?>
                                        </option>
                                    <?php endforeach; ?>  
                            </select>
                            

                          <!--JOGO O VALOR DA ID QUE ESTÁ NO SELECT ATRAVÉS DO EVENTO onChange para id PARA DEPOIS CHAMAR NO AJAX-->
                          <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                          <!--JOGO O VALOR DO type DO SELECT ATRAVÉS DO EVENTO onChange para type PARA DEPOIS CHAMAR NO AJAX--> 
                          <input type="hidden" id="type" name="type" value="<?php echo $row['type']; ?>">
                      </td>
                      
                     
                      <!--BOTÃO DE GRAVAR-->            
                      <td style="text-align:right;">
                          <button 
                              type="button" 
                              class="btn btn-success btn-lg fa fa-floppy-o gravar"
                              onClick="document.getElementById('id').value = <?php echo $row['id']; ?>,
                                       document.getElementById('type').value = '<?php echo $row['type']; ?>';"> 
                          </button>
                      </td>
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
    echo '<p style="clear: left; padding-top: 10px;">Total de rows: '.$paginate->total_results.'</p>';

    /*
     * Echo out the total number of pages
     */
    echo '<p>Total de Paginas: '.$paginate->total_pages.'</p>';

    echo '<p style="clear: left; padding-top: 10px; padding-bottom: 10px;">-----------------------------------</p>';
  
?>
<?php require APPROOT . '/views/inc/footer.php'; ?>