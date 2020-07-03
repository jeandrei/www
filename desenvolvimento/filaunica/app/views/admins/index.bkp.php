<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>Lista de Espera</h1>

<script>
      //espera a página carregar completamente
        $(document).ready(function(){  
           //seleciona o objeto select da página    
           $('.gravar').click(function() {                
                //atribui os valores do id e do status as variáveis
                var idRegistro=$("#id_reg_fila").val();
                var statusRegistro=$("#status_reg_fila").val();  
                var txthist=$("#txthist").val();                
                    //monta a url chamando o método updateStatus no controller e passa através do GET o id e o Status  
                    $.get("<?php echo URLROOT; ?>/admins/gravar?id=" + idRegistro + "&status=" + statusRegistro + "&historico=" + txthist, function(data){ 
                        $('#msg').show();
                        //$('#msg').css('color', '#CC0000');
                        $('#msg').html('Dados gravados com sucesso.');
                        setTimeout("$('#msg').fadeOut(); ", 3000); 

                         //aqui eu altero a classe da linha da tabela
                         // o id da linha é formado por linha_ e o id
                         // então na linha 5 o nome é linha_5
                         // lá no tr da tabela id="linha_
                         if(statusRegistro == "Aguardando"){
                            //$("#linha_" + idRegistro).addClass("table-primary");
                            document.getElementById("linha_" + idRegistro).className = "table-primary"; 
                        }  

                        if(statusRegistro == "Matriculado"){
                            //$("#linha_" + idRegistro).addClass("table-success"); 
                            document.getElementById("linha_" + idRegistro).className = "table-success";
                        } 

                        if(statusRegistro == "Cancelado"){
                            //$("#linha_" + idRegistro).addClass("table-danger"); 
                            document.getElementById("linha_" + idRegistro).className = "table-danger";
                        }                                       
                });
            });
        });


</script>


<div class="container">
    <form id="filtrar" action="<?php echo URLROOT; ?>/admins/index" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="form-group mx-sm-3 mb-2"> 

            
                    <!--LINHA PARA OS CAMPOS DE BUSCA-->
                    <div class="row">
                                
                                
                                <!--NOME 1-->
                                <div class="col-lg-4">
                                    <label for="buscanome">
                                        Buscar por Nome
                                    </label>
                                    <input 
                                        type="text" 
                                        name="buscanome" 
                                        id="buscanome" 
                                        maxlength="60"
                                        class="form-control"
                                        value="<?php if(isset($_POST['buscanome'])){htmlout($_POST['buscanome']);} ?>"
                                        ><span class="invalid-feedback">
                                            <?php // echo $data['nome_err']; ?>
                                        </span>
                                </div>



                                <!--ETAPA-->
                                <div class="col-lg-4">
                                    <label for="buscaetapa">
                                        Busca por Etapa
                                    </label>                               
                                    <!-- 1 BOTÃO BUSCA POR ETAPA VAI JOGAR PARA controlers/Admins.php-->
                                    <select 
                                                    name="buscaetapa" 
                                                    id="buscaetapa" 
                                                    class="form-control"                                        
                                                >
                                                        <option value="Todos">Todos</option>
                                                        <?php 
                                                        $etapas = $this->adminModel->getEtapas();                     
                                                        foreach($etapas as $etapa) : ?> 
                                                            <option value="<?php echo $etapa['id']; ?>"
                                                                        <?php if(isset($_POST['buscaetapa'])){
                                                                        echo $_POST['buscaetapa'] == $etapa['id'] ? 'selected':'';
                                                                        }
                                                                        ?>
                                                            >
                                                                <?php echo $etapa['descricao'];?>
                                                            </option>
                                                        <?php endforeach; ?>  
                                    </select>
                                </div>




                                <!--Situação-->
                                <div class="col-lg-4">
                                    <label for="buscastatus">
                                        Busca por Situação
                                    </label> 
                                    <!--BOTÃO BUSCA SITUAÇÃO-->
                                    <select 
                                                    name="buscastatus" 
                                                    id="buscastatus" 
                                                    class="form-control"                                        
                                                >
                                                        <option value="Todos">Todos</option>
                                                        <?php 
                                                        $status = array('Aguardando','Matriculado','Cancelado');                    
                                                        foreach($status as $row => $value) : ?> 
                                                            <option value="<?php echo $value; ?>" 
                                                                            <?php if(isset($_POST['buscastatus'])){
                                                                                    echo $_POST['buscastatus'] == $value ? 'selected':'';
                                                                                }
                                                                            ?>
                                                            >
                                                                <?php echo $value;?>
                                                            </option>
                                                        <?php endforeach; ?>  
                                    </select>   
                                </div>   

                    </div><!--FIM DIV CAMPOS DE BUSCA-->                    
                    
                     

                </div>
            </div>
        </div>
       
        <!-- BOTÃO DE ATUALIZAR -->                                                                      
        <div class="row">
            <div class="col">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="submit" class="btn btn-primary mb-2" value="Atualizar">
                    <span class="badge align-middle text-danger" name="busca_err" id="busca_err"></span> 
                </div>
            </div>
        </div>    
                                                                          

    </form>
</div>

<?php  if(isset($data['err'])){die($data['err']);}?>



<!-- SPAM PARA MOSTRAR A MENSAGEM DE DADOS GRAVADOS COM SUCESSO-->
<div class="text-center small">
    <span id="msg" name="msg" style="border:20px; font-weight:bold;"></span>
</div>



<!--TABELA COM OS DADOS-->   
<div class="text-center small">
  <table class="table table-sm" style="font-size: 11px;">
    <thead>
      <tr>  
        <th scope="col">Posição</th>        
        <th scope="col">Nome da Criança</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Etapa</th>          
        <th scope="col">Responsável</th> 
        <th scope="col">Protocolo</th>
        <th scope="col">Registro</th>        
        <th scope="col">Status</th>
        <th scope="col">Tramitação</th>
      </tr>
    </thead>
          
    <tbody>        
        <?php foreach ($data as $registro): ?>
            <tr class="<?php 
                            if($registro['status'] == "Aguardando")
                            echo "table-primary";
                            if($registro['status'] == "Cancelado")
                            echo "table-danger";
                            if($registro['status'] == "Matriculado")
                            echo "table-success";                        
                        ?>"
                id="linha_<?php echo $registro['fila_id'];?>"               
              >
                <td><?php echo $registro['posicao']; ?></td>
                <td><?php echo $registro['nome']; ?></td>
                <td><?php echo $registro['nascimento']; ?></td>
                <td><?php echo $registro['etapa']; ?></td>
                <td><?php echo $registro['responsavel']; ?></td>
                <td><?php echo $registro['protocolo']; ?></td>
                <td><?php echo $registro['registro']; ?></td>                
                <td>
                  <select style="font-size:11px;" class="form-control form-control-sm"
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
                        <input type="hidden" id="id_reg_fila" name="id_reg_fila" value="<?php echo $registro['fila_id']; ?>">
                        <!--JOGO O VALOR DO STATUS DO SELECT ATRAVÉS DO EVENTO onChange para status_reg_fila PARA DEPOIS CHAMAR NO AJAX--> 
                        <input type="hidden" id="status_reg_fila" name="status_reg_fila" value="<?php echo $registro['status']; ?>"> 
                        <input type="hidden" id="txthist" name="txthist" value="">  

                </td>

                <td>
                    <input 
                        class="form-control form-control-sm" 
                        type="text" 
                        id="historico_<?php echo  $registro['fila_id'];?>" 
                        name="historico_<?php echo  $registro['fila_id'];?>">                               
                </td>

                <!--BOTÃO DE GRAVAR-->            
                <td>
                    <button 
                        type="button" 
                        class="btn btn-success btn-sm gravar"
                        onClick="
                                  document.getElementById('id_reg_fila').value = <?php echo $registro['fila_id']; ?>,   
                                  document.getElementById('status_reg_fila').value = document.getElementById('<?php echo $registro['fila_id'];?>').value,
                                  document.getElementById('txthist').value = document.getElementById('historico_<?php echo  $registro['fila_id'];?>').value;
                                  "
                    >                    
                     Gravar
                    </button>
                </td>
                
                <!--BOTÃO VER HISTÓRICO-->                
                <td>
                    <a
                        class="btn btn-secondary btn-sm ver"  
                        href="<?php echo URLROOT; ?>/admins/historico/<?php echo  $registro['fila_id'];?>">Ver
                    </a>
                </td>

            </tr>            
        <?php endforeach; ?>
    </tbody>
  </table>  


    <!--PAGINAÇÃO-->
    <ul class="pagination list-inline justify-content-center">
 

    <?php
    // PASSO O LIMITE DE REGISTROS POR PÁGINAS DEFINIDO EM controlers/admins.php
    $limit = $_GET['limitePag'];
    
    //VERIFICO NOVAMENTE SE OS DADOS ESTÃO PASSANDO PELO POST OU PELO GET
    if (isset($_POST['buscanome'])){
        $buscaNome = $_POST['buscanome'];
    } else if (isset($_GET['nome'])){
        $buscaNome = $_GET['nome'];
    } else {
        $buscaNome = "Todos";
    }

    if (isset($_POST['buscaetapa'])){
        $buscaEtapa = $_POST['buscaetapa'];
    } else if (isset($_GET['etapa'])){
        $buscaEtapa = $_GET['etapa'];
    } else {
        $buscaEtapa = "Todos";
    }

    if (isset($_POST['buscastatus'])){
        $buscaStatus = $_POST['buscastatus'];
    } else if (isset($_GET['status'])){
        $buscaStatus = $_GET['status'];
    } else {
        $buscaStatus = "Todos";
    }
    
  
    //TIVE QUE DECLARAR A VARIÁVEL SE NÃO FICA DANDO VARIÁVEL INDEFINIDA
    $pagLink = "";
    
   
    
    
    if(isset($data)){
            $total_records = $_GET['count'];       
            $total_pages = ceil($total_records / $limit);              
                 
            for ($i=1; $i<=$total_pages; $i++) {
                        // SE O CONTADOR FOR IGUAL AO NÚMERO DA PAGINA PASSADA PELO GET ATRIBUI O VALOR ACTIVE A VARIÁVEL ACTIVE
                        // E COLOCA NA CLASSE class=page-item
                        if(isset($_GET['page']) && $i == $_GET['page']){$active = 'active';}else{ $active = "";}                          
                        // AQUI PARA CADA PÁGINA MONTA UM LINK PASSANDO OS VALORES PELO GET DAÍ ESSES VALORES SÃO PASSADOS PARA A FUNÇÃO
                        // QUE FAZ A BUSCA NO BANCO DE DADOS COM O PARÂMETRO DE ONDE INÍCIAR COM OS REGISTROS E ONDE TERMINAR
                        $pagLink .= "<li class='page-item $active'><a class='page-link' href=" . URLROOT . "/admins/index?page=".$i ."&nome=". $buscaNome . "&etapa=". $buscaEtapa ."&status=". $buscaStatus .">".$i."</a></li>";  

            }      
            echo $pagLink . "</div>"; 
    } 
    ?>  

    </ul>                


<?php require APPROOT . '/views/inc/footer.php'; ?>