<?php require APPROOT . '/views/inc/header.php'; ?>

<script>  
  function limpar(){
          document.getElementById('name').value = "";   
          document.getElementById('name').focus(); 
      }  
    document.getElementById('name').focus(); 




//espera a página carregar completamente
$(document).ready(function(){  
  console.log("teste");
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
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="type1" value="user" checked>
            <label class="form-check-label" for="type1">
              Usuário
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="type2" value="sec" checked>
            <label class="form-check-label" for="type2">
              Secretária
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="type3" value="admin">
            <label class="form-check-label" for="type3">
              Administrador
            </label>
          </div>
      </td>

      <td> <a href="<?php echo URLROOT; ?>/buscaalunos/ver/<?php echo $row['id']; ?>" class="fa btn btn-success btn-lg">Salvar</a></td>
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