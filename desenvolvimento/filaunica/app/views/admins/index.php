

<?php require APPROOT . '/views/inc/header.php'; ?>


<script>
    
    function limpar(){
        document.getElementById('buscanome').value = "";
        document.getElementById('buscaetapa').value = "Todos";
        document.getElementById('buscastatus').value = "Todos";
        focofield("buscanome");
    }    
    
    window.onload = function(){focofield("buscanome");}

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


<?php 


// A CONEXÃO COM O BANCO DE DADOS É FEITO NA CONSTRUCT DO LIBRARIES/PAGINATOR
// PROCURE POR "AQUI EU ALTEREI FIZ A CONEXÃO COM O BANCO DE DADOS QUE ESTÁ NO DATABASE" 

/*
1 A BIBLIOTÉCA PAGINATION QUE ESTÁ EM libraries/Pagination E É CARREGADA AUTOMATICAMENTE PELO sql_autoload_register assim como as outras libraries Core, Database etc
2 Eu extendi a classe Pagination da biblioteca libraries/Pagination para a database Pagination extends Database assim eu consigo utilizar os mesmos parâmetros de conexão da classe database
- dúvida procure em libraries/Pagination "AQUI EU ALTEREI FIZ A CONEXÃO COM O BANCO DE DADOS QUE ESTÁ NO DATABASE"
3 Cria o controller com o código em comentário vai lá no controller Exemplo_paginacao.php index() que vc vai ver
4 Cria o model com um metodo para buscar os dados no banco de dados getfila($page, $options) E PRINCIPALMENTE ***EXTENDS PARA PAGINATION***
5 Atribua o resultado desse método a variável $paginate $paginate = $data['paginate'];
- a variável $data['paginate'] vem do resultado do método getfila
6 Para passar parâmetros na consulta sql tipo status = Aguardando
- no controller em options coloca assim  'named_params' => array(':status' => 'Aguardando') 
7 PARA POSSIBILITAR CONSULTA COM 'named_params' => array(':status' => $status) tem que colocar no input
e no controller abaixo do if(isset($_GET['page'])) como SESSION É SÓ IR LÁ QUE VC VAI ENTENDER  

*/

?>
<!-- FORMULÁRIO COM OS CAMPOS DE PESQUISA -->
<form id="filtrar" action="<?php echo URLROOT; ?>/admins/index" method="post" enctype="multipart/form-data">
    <!-- LINHA E COLUNAS PARA OS CAMPOS DE BUSCA -->
    <div class="row">     
        
        <!-- COLUNA 1 NOME-->
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
                onkeydown="upperCaseF(this)"   
                ><span class="invalid-feedback">
                    <?php // echo $data['nome_err']; ?>
                </span>
        </div>


         <!-- COLUNA 2 ETAPA -->
         <div class="col-lg-3">
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
        
        
        <!-- COLUNA 3 SITUAÇÃO-->
        <div class="col-lg-3">
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
                                        <?php // AQUI TIVE QUE COLOCAR COM SESSION POR CONTA DA PAGINAÇÃO
                                        if(isset($_POST['buscastatus'])){
                                                echo $_POST['buscastatus'] == $value ? 'selected':'';
                                            }
                                        ?>
                        >
                            <?php echo $value;?>
                        </option>
                    <?php endforeach; ?>  
            </select> 
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


    <!-- DIV LINHA PARA OS INPUTS E BOTÃO ATUALIZAR -->
    </div>

                                        


</form>

</div><!--fecha div container lá do header-->
<?


// aqui eu passo o resultado da paginação vem lá do controller

$paginate = $data['paginate'];
$result = $data['results'];
//var_dump($result);

//die();

?>
<br>
<!-- MONTAR A TABELA -->
<table class="container-fluid table table-striped table-sm" style="font-size: 12px;">
  <thead>
    <tr>
      <th scope="col">Posição</th> 
      <th scope="col">Nome da Criança</th>
      <th scope="col">Nascimento</th>
      <th scope="col">Etapa</th>
      <th scope="col">Responsável</th>
      <th scope="col">Protocolo</th>  
      <th scope="col">Registro</th>
      <th scope="col">Status</th> 
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $registro) : ?> 
    <tr class="<?php 
                if($registro['status'] == "Aguardando")
                echo "table-primary";
                if($registro['status'] == "Cancelado")
                echo "table-danger";
                if($registro['status'] == "Matriculado")
                echo "table-success";                        
                ?>"
        id="linha_<?php echo $registro['id'];?>"               
    >  
        <td style="text-align:center; width:20px;"><?php echo $registro['posicao']; ?></td> 
        <td style="width:300px;"><?php echo $registro['nomecrianca']; ?></td> 
        <td style="width:50px;"><?php echo $registro['nascimento']; ?></td>  
        <td style="width:80px;"><?php echo $registro['etapa']; ?></td> 
        <td style="width:300px;"><?php echo $registro['responsavel']; ?></td>
        <td style="width:100px;"><?php echo $registro['protocolo']; ?></td>  
        <td style="width:120px;"><?php echo $registro['registro']; ?></td>     
        <td>
            <select style="font-size:11px;" class="form-control form-control-sm"
                    name="statuslista" 
                    id="<?php echo  $registro['id'];?>" 
                    class="form-control" 
                    onChange="
                            document.getElementById('id_reg_fila').value = <?php echo $registro['id']; ?>;
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
            <input type="hidden" id="id_reg_fila" name="id_reg_fila" value="<?php echo $registro['id']; ?>">
            <!--JOGO O VALOR DO STATUS DO SELECT ATRAVÉS DO EVENTO onChange para status_reg_fila PARA DEPOIS CHAMAR NO AJAX--> 
            <input type="hidden" id="status_reg_fila" name="status_reg_fila" value="<?php echo $registro['status']; ?>"> 
            <input type="hidden" id="txthist" name="txthist" value="">  

        </td>
    
        <td style="width:250px;">
            <input 
                class="form-control form-control-sm" 
                type="text" 
                id="historico_<?php echo  $registro['id'];?>" 
                name="historico_<?php echo  $registro['id'];?>">                               
        </td>

        
        <!--BOTÃO DE GRAVAR-->            
        <td style="text-align:right;">
            <button 
                type="button" 
                class="btn btn-success btn-sm gravar"
                onClick="
                        document.getElementById('id_reg_fila').value = <?php echo $registro['id']; ?>,   
                        document.getElementById('status_reg_fila').value = document.getElementById('<?php echo $registro['id'];?>').value,
                        document.getElementById('txthist').value = document.getElementById('historico_<?php echo  $registro['id'];?>').value;
                        "
            >                    
            Gravar
            </button>
        </td>
        
        <!--BOTÃO VER HISTÓRICO-->                
        <td style="text-align:left;">
            <a
                class="btn btn-secondary btn-sm ver"  
                href="<?php echo URLROOT; ?>/admins/historico/<?php echo  $registro['id'];?>">Ver
            </a>
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
    echo '<p style="clear: left; padding-top: 10px;">Total de Registros: '.$paginate->total_results.'</p>';

    /*
     * Echo out the total number of pages
     */
    echo '<p>Total de Paginas: '.$paginate->total_pages.'</p>';

    echo '<p style="clear: left; padding-top: 10px; padding-bottom: 10px;">-----------------------------------</p>';

?>

<!-- AQUI NÃO COLOCO O FOOTER DO INC POIS PRECISO FECHAR O div do container antes da tabela -->  
</body>
</html>

