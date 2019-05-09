<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITENAME; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
   
   <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">

  <!--jquery-->
  <script src="<?php echo URLROOT; ?>/js/jquery-3.3.1.min.js"></script> 

   <!--jquery mask-->
   <script src="<?php echo URLROOT; ?>/js/jquery.mask.js" data-autoinit="true"></script>
   

  <!--Botstrap main-->
  <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>

  <!--Javascript funções-->
  <script src="<?php echo URLROOT; ?>/js/main.js"></script>

  <script>
      //espera a página carregar completamente
      $(document).ready(function(){  
           //seleciona o objeto select da página    
           $(document).on('change','select', function(){ 
            //atribui os valores dos ids dos objetos para as variáveis
            var idRegistro=$("#id_reg_fila").val();
            var statusRegistro=$("#status_reg_fila").val();   
            $.ajax({
                    //arquivo que será transmitido os valores
                    url:'update_status.php',
                    //o método que será utilizado
                    method:'POST',
                    //as variáveis que serão enviadas
                    data:{
                      idRegistro:idRegistro,
                      statusRegistro:statusRegistro
                    },
                    //se um erro ocorrer vai traser o echo do update_status se quiser que seja quando der certo mudar para success
                    error:function(response){
                        alert(response);
                    }
                });
           });
        });


       
function validabusca(){
	var etapa = document.getElementById('etapa').value;
	var status = document.getElementById('select_status').value;	
	
	if(etapa == ""){			
		document.getElementById('busca_err').innerHTML = "Por favor selecione uma etapa";	
		return false;
	}	

  if(status == ""){			
		document.getElementById('busca_err').innerHTML = "Por favor selecione um status";	
		return false;
	}


}//validation	



    </script>
 

  <style>
    .Aguardando {	
    color: #4169E1;
   }
   .Matriculado {	
    color: #008000;
   }
   .Cancelado {	
    color: #B22222;
   }
  </style>
   
</head>

<img src="../img/LOGO.png" class="img-fluid" alt="Responsive image">

<hr>
<p class="font-weight-light text-center font-weight-bold">Fila Única de Penha/SC</p>
<hr>


<form class="form-inline" action="?act=search" method="post" enctype="multipart/form-data" onsubmit="return validabusca()"> 

  <div class="form-group mb-2">
    <label for="etapa" class="sr-only">Selecione os dados de busca</label>
    <input type="text" readonly class="form-control-plaintext" id="Etapa" value="Dados da busca:">
  </div>
  
      <div class="form-group mx-sm-3 mb-2">
        <label for="etapas" class="sr-only">Selecione os dados de busca</label>
        <select 
                      name="etapa" 
                      id="etapa" 
                      class="form-control"                                        
                  >
                          <option value="">Selecione a Etapa</option>
                          <?php 
                          $etapas = getEtapas($pdo);                     
                          foreach($etapas as $etapa) : ?> 
                              <option value="<?php echo $etapa['id']; ?>"
                                          <?php echo $pag_etapa == $etapa['id'] ? 'selected':'';?>
                              >
                                  <?php echo $etapa['descricao'];?>
                              </option>
                          <?php endforeach; ?>  
          </select>
      </div>

      <div class="form-group mx-sm-3 mb-2">
          <select 
                          name="select_status" 
                          id="select_status" 
                          class="form-control"                                                                
                      >
                      <option value="">Selecione o status</option>                   
                      <?php 
                      $status = array('Todos','Aguardando','Matriculado','Cancelado');                    
                      foreach($status as $row => $value) : ?> 
                          <option value="<?php echo $value; ?>"
                                      <?php echo $value == $pag_status ? 'selected':'';?>
                          >
                              <?php echo $value;?>
                          </option>
                      <?php endforeach; ?>  
                      </select> 
        </div>   
       
  
  <input type="submit" class="btn btn-primary mb-2" value="Atualizar">
  <span class="badge align-middle text-danger" name="busca_err" id="busca_err"></span> 


    <div class="text-center">
        <table class="table table-sm">
          <thead>
            <tr>  
              <th scope="col">Posição</th>        
              <th scope="col">Nome da Criança</th>
              <th scope="col">Data de Nascimento</th>
              <th scope="col">Etapa</th>          
              <th scope="col">Responsável</th> 
              <th scope="col">Protocolo</th>
              <th scope="col">Registro</th>
              <th scope="col">Comp Residência</th>
              <th scope="col">Comp Nascimento</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>

      
        <?php foreach ($fila as $registro): ?>
            <tr class="<?php echo $registro['status'];?>"> 
                <td><?php 
                  if($registro['status'] == "Aguardando" && $_POST['select_status'] <> "Todos" ){                    
                    echo $registro['posicao'];
                    }
                    else
                    {
                      echo "-";
                    }
                    ?> 
                
                </td>         
                <td><?php echo $registro['nome'];?>  </td>  
                <td><?php echo date('d/m/Y', strtotime($registro['nascimento']));?> </td>  
                <td><?php echo $registro['etapa'];?> </td>  
                <td><?php echo $registro['responsavel'];?> </td>  
                <td><?php echo $registro['protocolo'];?> </td>  
                <td><?php echo date('d/m/Y H:i:s', strtotime($registro['registro']));?>  </td>  
                <td><a download="<?php echo $registro['comprovante_res_nome'];?>" target="_blank" href='abrir_arquivo.php?tipo=res&id=<?php echo $registro['fila_id'];?>'>abrir</a></td>   
                <td><a download="<?php echo $registro['comprovante_nasc_nome'];?>" target="_blank" href='abrir_arquivo.php?tipo=nasc&id=<?php echo $registro['fila_id'];?>'>abrir</a></td>  
                <td>  
                      <select 
                          name="statuslista" 
                          id="<?php echo  $registro['fila_id'];?>" 
                          class="form-control" 
                          onChange="
                                    document.getElementById('id_reg_fila').value = <?php echo $registro['fila_id']; ?>;
                                    document.getElementById('status_reg_fila').value = this.value;
                                    "                                                               
                      >                   
                      <?php 
                      $status = array('Aguardando','Matriculado','Cancelado');                    
                      foreach($status as $row => $value) : ?> 
                          <option value="<?php echo $value; ?>" 
                                      <?php echo $value == $registro['status'] ? 'selected':'';?>
                          >
                              <?php echo $value;?>
                          </option>
                      <?php endforeach; ?>  
                      </select>
                      <!--JOGO O VALOR DA ID QUE ESTÁ NO SELECT ATRAVÉS DO EVENTO onChange para id_reg_fila PARA DEPOIS CHAMAR NO AJAX-->
                      <input type="hidden" id="id_reg_fila" name="id_reg_fila" value="">
                      <!--JOGO O VALOR DO STATUS DO SELECT ATRAVÉS DO EVENTO onChange para status_reg_fila PARA DEPOIS CHAMAR NO AJAX--> 
                      <input type="hidden" id="status_reg_fila" name="status_reg_fila" value="">     
                </td>        
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>    
              <a class="btn btn-secondary" href="<?php echo URLROOT; ?>">Voltar</a>
      </div> 
</form>
    <span class="badge align-middle"> <?php echo $error; ?></span>  

    <?php        
      $total_records = $row[100];  
      $total_pages = 10;
      $pagLink = "<div class='pagination'>";  
      for ($i=1; $i<=$total_pages; $i++) {  
                  $pagLink .= "<a href='index.php?page=".$i."&etapa=".$pag_etapa."&status=".$pag_status."'>".$i."</a>";  
      };  
      echo $pagLink . "</div>";  
      ?>

</body>
</html>