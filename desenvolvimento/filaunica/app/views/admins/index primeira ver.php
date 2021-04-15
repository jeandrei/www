

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
                var id=$("#id_reg_fila").val();
                var status=$("#status_reg_fila").val();  
                var txthist=$("#txthist").val();                           
                    //monta a url chamando o método updateStatus no controller e passa através do GET o id e o Status  
                    $.ajax({
                    /* aqui em url passamos a url do controler e o método que iremos utilizar nesse caso controller jquerys método newEstado */
                    /* a newEstado vai receber pelo POST o valor do input estado e por sua vez vai chamar no model addEstado($_POST['estado'])   */
                    url: '<?php echo URLROOT; ?>/admins/gravar',
                    /* aqui o método que utilizamos nesse caso POST */
                    method:'POST',
                    /* aqui as variáveis que queremos passar para o arquivo php neste caso controller/método */
                    data:{
                        id:id,
                        status: status,
                        txthist: txthist                     
                    },                                       
                    /* aqui se obtiver sucesso imprimimos que os dados foram armazenados com sucesso */                   
                    success: function(retorno_php){ 
                    /* para poder retornar um array tranformo os dados que retornam do php em um objeto json agora para chamar a variável que vem do php */
                    /* faz assim responseObj.variavel ex console.log(responseObj.mensagem); */
                    /* retorno_php vem de controllers/jquerys/newEstado() */
                    var responseObj = JSON.parse(retorno_php);                    
                    $("#messageBox")
                        .removeClass()
                        /* aqui em addClass adiciono a classe que vem do php se sucesso ou danger */
                        /* pode adicionar mais classes se precisar ficaria assim .addClass("confirmbox "+responseObj.classe) */
                        .addClass(responseObj.classe) 
                        /* aqui a mensagem que vem la do php responseObj.mensagem */                       
                        .html(responseObj.mensagem) 
                        .fadeIn(2000).fadeOut(2000);

                        //aqui eu altero a classe da linha da tabela
                        // o id da linha é formado por linha_ e o id
                        // então na linha 5 o nome é linha_5
                        // lá no tr da tabela id="linha_                       
                        if(status == "Aguardando"){
                            //$("#linha_" + idRegistro).addClass("table-primary");
                            document.getElementById("linha_" + id).className = "table-primary"; 
                        } 

                        if(status == "Matriculado"){
                            //$("#linha_" + idRegistro).addClass("table-success"); 
                            document.getElementById("linha_" + id).className = "table-success";
                        } 

                        if(status == "Cancelado"){
                            //$("#linha_" + idRegistro).addClass("table-danger"); 
                            document.getElementById("linha_" + id).className = "table-danger";
                        }   
                    }                    
                });
            });
        });

        function ShowContact(responsavel,telefone, celular) {   
                msg = '';                
                
                if(typeof responsavel != 'undefined') {
                msg = msg + 'Responsável: '+responsavel +'\r\n';
                }

                if(typeof telefone != 'undefined') {
                msg = msg + 'Telefone: '+telefone +'\r\n';
                }

                if(typeof celular != 'undefined') {
                msg = msg + 'Celular: '+celular;
                }
               alert (msg.toUpperCase());              
            }
     



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


<!-- LINHA PARA A MENSÁGEM DO JQUERY -->
<div class="container">
    <div class="row" style="height: 50px;  margin-bottom: 25px;">
        <div class="col-12">
            <div role="alert" id="messageBox" style="display:none"></div>
        </div>
    </div>
</div>



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
                    $etapas = $this->etapaModel->getEtapas();                     
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


// Arquivos da paginação
// controller/Admins/index passando a paginação assim $paginate = $this->adminModel->getFilaBusca($page, $options);
// e o resultado da pesquisa pelo foreach $data['results']
// $paginate essa variável tem que ser a mesma lá embaixo na paginação
// getFilaBusca($page, $options) está lá no model ele retorna a busca com a paginação
// lá no controller em  $options = array( passamos os parâmetros de busca

$paginate = $data['paginate'];
$result = $data['results'];

// la no controller admins se o resultado da pesquisa não trazer nehuma linha
// eu retorno false daí se retornar false é que não tem dados para emitir 
// interrompo o código
if($data['results'] == false){ die('<div class="container alert alert-warning">Sem dados para emitir</div>');} 

?>
<br>
<!-- MONTAR A TABELA -->
<table class="container-fluid table table-sm" style="font-size: 12px;">
  <thead>
    <tr>
      <th scope="col">Posição</th> 
      <th scope="col">Nome da Criança</th>
      <th scope="col">Nascimento</th>
      <th scope="col">Etapa</th>     
      <th scope="col">Protocolo</th>  
      <th scope="col">Registro</th>   
      <th scope="col">Contato</th> 
      <th scope="col">Status</th> 
      <th scope="col">Hisóticos</th>
      <th scope="col"></th> 
      <th scope="col"></th> 
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
        <td><?php echo $registro['posicao']; ?></td> 
        <td><?php echo $registro['nomecrianca']; ?></td> 
        <td><?php echo $registro['nascimento']; ?></td>  
        <td><?php echo $registro['etapa']; ?></td>
        <td><?php echo $registro['protocolo']; ?></td>  
        <td><?php echo $registro['registro']; ?></td>   
        <td><button type = "button" class="btn btn-secondary btn-lg fa fa-eye ver" value = "Contato" onclick = "ShowContact(
                                                                                                                '<?php echo $registro['responsavel']; ?>',
                                                                                                                '<?php echo $registro['telefone']; ?>',
                                                                                                                '<?php echo $registro['celular']; ?>'
                                                                                                            );"
            />
        </td>          
        <td>
            <select class="form-control form-control-sm"
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
                class="btn btn-success btn-lg fa fa-floppy-o gravar"
                onClick="
                        document.getElementById('id_reg_fila').value = <?php echo $registro['id']; ?>,   
                        document.getElementById('status_reg_fila').value = document.getElementById('<?php echo $registro['id'];?>').value,
                        document.getElementById('txthist').value = document.getElementById('historico_<?php echo  $registro['id'];?>').value;
                        "
            >                    
            
            </button>
        </td>
        
        <!--BOTÃO VER HISTÓRICO-->                
        <td style="text-align:left;">
            <a
                class="btn btn-secondary btn-lg fa fa-eye ver"  
                href="<?php echo URLROOT; ?>/admins/historico/<?php echo  $registro['id'];?>">
            </a>
        </td>



    </tr>
    <?php endforeach; ?>    
  </tbody>
</table>



<?php
    // no index a parte da paginação é só essa    
    echo '<p>'.$paginate->links_html.'</p>';   
    echo '<p style="clear: left; padding-top: 10px;">Total de Registros: '.$paginate->total_results.'</p>';   
    echo '<p>Total de Paginas: '.$paginate->total_pages.'</p>';
    echo '<p style="clear: left; padding-top: 10px; padding-bottom: 10px;">-----------------------------------</p>';
?>


<!-- AQUI NÃO COLOCO O FOOTER DO INC POIS PRECISO FECHAR O div do container antes da tabela -->  
</body>
</html>

