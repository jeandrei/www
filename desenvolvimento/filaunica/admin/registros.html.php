<?php
require ($_SERVER["DOCUMENT_ROOT"] . '/filaunica/inc/header.inc.php');
?>

<body>
  
  
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


        function validabuscanome(){
          var nome = document.getElementById('buscanome').value;	
          
          if(nome == ""){			
            document.getElementById('busca_nome_err').innerHTML = "Por favor informe um nome";	
            return false;    
          }	  
        }//validation	

    </script>  
   


<div class="container">
    <div class="row">
        <div class="col"><img src="../img/LOGO.png" class="img-fluid" alt="Responsive image"></div>  
        <div class="col text-right"><a class="link" href="users/index.php">Gerenciar Usuários</a><?php include 'inc/logout.inc.html.php';?></div>          
    </div>    
</div>


<hr>
<p class="font-weight-light text-center font-weight-bold">Fila Única de Penha/SC</p>
<hr>



<form action="?act=search" method="post" enctype="multipart/form-data" onsubmit="return validabusca()"> 

<!--INICIO DA PRIMEIRA LINHA DE DADOS DE BUSCA-->
<div class="form-row">

        <div class="form-group mb-2">       
          <input type="text" readonly class="form-control-plaintext text-right" id="Etapa" value=" Dados da busca:">
        </div>
        
            <!--BOTÃO SELECIONAR ETAPA-->
            <div class="form-group mx-sm-3 mb-2">              
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



            <!--BOTÃO SELECIONAR STATUS-->
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
</div>
</form>


<!--INICIO DA SEGUNDA LINHA DE DADOS DE BUSCA-->
<form action="?act=searchname" method="post" enctype="multipart/form-data" onsubmit="return validabuscanome()"> 
<div class="form-row">
    <div class="form-group mb-2">       
      <input type="text" readonly class="form-control-plaintext text-right" id="Etapa" value=" Busca por nome:">      
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <input type="text" class="form-control" id="buscanome" name="buscanome" placeholder="Nome do aluno">
    </div>
    <input type="submit" id="btn_buscanome" name="buscapornome" class="btn btn-primary mb-2" value="Buscar por nome">
    <span class="badge align-middle text-danger" name="busca_nome_err" id="busca_nome_err"></span> 
</div>
</div>
    
    
<!--TABELA COM OS DADOS-->   
<div class="text-center small">
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
            <tr class="<?php 
                            if($registro['status'] == "Aguardando")
                            echo "table-primary";
                            if($registro['status'] == "Cancelado")
                            echo "table-danger";
                            if($registro['status'] == "Matriculado")
                            echo "table-success";                        
                        ?>"> 
                
                <td><?php                     
                    if(buscaProtocolo($pdo,$registro['protocolo']))
                    {
                      $result = buscaProtocolo($pdo,$registro['protocolo']);
                      if($result['status'] == "Aguardando"){
                        $posicao =   buscaPosicaoFila($pdo, $registro['protocolo']);
                      }
                      else
                      {
                        $posicao['posicao'] = '-';
                      }
                    
                    }
                    echo $posicao['posicao']            ;
                    ?>                 
                </td>         
                
                <td>
                  <?php echo $registro['nome'];?>  
                </td>  
                
                <td>
                  <?php echo date('d/m/Y', strtotime($registro['nascimento']));?> 
                </td>  
                
                <td>
                  <?php echo $registro['etapa'];?> 
                </td>  
                
                <td>
                  <?php echo $registro['responsavel'];?> 
                </td>  
                
                <td>
                  <?php echo $registro['protocolo'];?> 
                </td>  
                
                <td>
                  <?php echo date('d/m/Y H:i:s', strtotime($registro['registro']));?>
                </td>  
                
                <td>
                  <a download="<?php echo $registro['comprovante_res_nome'];?>" target="_blank" href='abrir_arquivo.php?tipo=res&id=<?php echo $registro['fila_id'];?>'>abrir</a>
                </td>   
                
                <td>
                  <a download="<?php echo $registro['comprovante_nasc_nome'];?>" target="_blank" href='abrir_arquivo.php?tipo=nasc&id=<?php echo $registro['fila_id'];?>'>abrir</a>
                </td>  
                
                <td>  
                  <select class="form-control form-control-sm"
                      name="statuslista" 
                      id="<?php echo  $registro['fila_id'];?>" 
                      class="form-control" 
                      onChange="
                                document.getElementById('id_reg_fila').value = <?php echo $registro['fila_id']; ?>;
                                document.getElementById('status_reg_fila').value = this.value;
                                ">                   
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
                  </select>    
                </td>        
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>                  
</div> 

    

   
<!--PAGINAÇÃO-->
<ul class="pagination list-inline justify-content-center">

  <?php                        
  //count($count) retorna o número de registros trazido na consulta
  if(isset($count)){
        $total_records = count($count);       
        $total_pages = ceil($total_records / $limit);          
        for ($i=1; $i<=$total_pages; $i++) {
                    // SE O CONTADOR FOR IGUAL AO NÚMERO DA PAGINA PASSADA PELO GET ATRIBUI O VALOR ACTIVE A VARIÁVEL ACTIVE
                    // E COLOCA NA CLASSE class=page-item
                    if($i == $_GET['page']){$active = 'active';}else{ $active = "";}  
                    $pagLink .= "<li class='page-item $active'><a class='page-link' href='index.php?page=".$i."&etapa=".$pag_etapa."&status=".$pag_status."'>".$i."</a></li>";  
        };  
        echo $pagLink . "</div>"; 
  } 
  ?>  

</ul>
  




<!--BOTÃO VOLTAR-->
<div class="row">
    <div class="mx-auto">
    <a class="btn btn-secondary list-inline justify-content-center" href="<?php echo URLROOT; ?>">Voltar</a>
    </div>
</div>
</body>


<?php
require ($_SERVER["DOCUMENT_ROOT"] . '/filaunica/inc/footer.inc.php');
?>