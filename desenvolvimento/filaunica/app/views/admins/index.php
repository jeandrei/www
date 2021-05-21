

<?php require APPROOT . '/views/inc/header.php'; ?>

<?php  

//$situacoes = $this->situacaoModel->getSituacoes(); 
//die(var_dump($situacoes));


?>



<script>
    
    function limpar(){
        document.getElementById('buscanome').value = "";
        document.getElementById('buscaetapa').value = "Todos";
        document.getElementById('buscasituacao').value = "Todos";
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
                         
                    }                    
                });
            });
        });

        
    //PARA ABRIR EM UMA NOVA ABA CRIO ESSA FUNÇÃO NEWTAB QUE É CHAMADA NO EVENTO ONCLICK DO BOTÃO IMPRIMIR
    function newtab(){
      document.getElementById('filtrar').setAttribute('target', '_blank');
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
            <label for="buscasituacao">
                Busca por Status
            </label> 
            <!--BOTÃO BUSCA SITUAÇÃO-->  

            <select 
                name="buscasituacao" 
                id="buscasituacao" 
                class="form-control"                                        
            >
                    <option value="Todos">Todos</option>
                    <?php 
                    $situacoes = $this->situacaoModel->getSituacoes();                     
                    foreach($situacoes as $row) : ?> 
                        <option value="<?php echo $row->id; ?>"
                                    <?php if(isset($_POST['buscasituacao'])){
                                    echo $_POST['buscasituacao'] == $row->id ? 'selected':'';
                                    }
                                    ?>
                        >
                            <?php echo $row->descricao;?>
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
                    <input type="submit" name="botao" class="btn btn-primary mb-2" value="Imprimir" onClick="newtab()">
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

//die(var_dump($result));

// la no controller admins se o resultado da pesquisa não trazer nehuma linha
// eu retorno false daí se retornar false é que não tem dados para emitir 
// interrompo o código
if($data['results'] == false){ die('<div class="container alert alert-warning">Sem dados para emitir</div>');} 

?>
<br>
<!-- AQUI VOU MONTAR OS CARDS -->
    <?php foreach ($result as $registro): ?>
        <div class="card">
            
            <div 
                class="card-header"
                id="linha_<?php echo $registro['id'];?>"
                style="background-color:<? echo $this->situacaoModel->getCorSituacaoById($registro['situacao_id']);?>">     
                
                    <div class="row">
                        <div class="col-sm-10">
                            Posição: <b><?php echo $registro['posicao']; ?></b> | Protocolo: <?php echo $registro['protocolo']; ?> | Registro: <?php echo $registro['registro']; ?> | Status: <?php echo $registro['situacao'];?>
                        </div>                                        
                    </div> 

            </div>


            <div class="card-body">
                
                
                <h5 class="card-title"><?php echo $registro['nomecrianca']; ?> | Idade: <?php echo CalculaIdade($registro['nascimento']);?>  </h5>   
                
                <!--1ª Linha do card-->
                <div class="row">
                    <div class="col-sm-2">
                        Nascimento: <?php echo $registro['nascimento']; ?>
                    </div>
                    <div class="col-sm-2">
                        Etapa: <?php echo $registro['etapa']; ?>
                    </div>
                    <div class="col-sm-2">
                        Turno: <?php echo $registro['opcao_turno']; ?>
                    </div>
                    
                </div>

                <!--2ª Linha do card-->
                <div class="row">
                    <div class="col-sm-4">
                        Responsável: <?php echo $registro['responsavel']; ?>
                    </div>
                    <div class="col-sm-2">
                        Telefone: <?php echo $registro['telefone']; ?>
                    </div>
                    <div class="col-sm-2">
                        Celular: <?php echo $registro['celular']; ?>
                    </div>                
                </div>                  
                
                <!--3ª Linha do card-->
                <div class="row">
                    <div class="col-sm-4">
                        Opção 1: <?php echo $registro['opcao1_id']; ?>                        
                    </div>
                    <div class="col-sm-4">
                        Opção 2: <?php echo $registro['opcao2_id']; ?>
                    </div>
                    <div class="col-sm-4">
                        Opção 3: <?php echo $registro['opcao3_id']; ?>
                    </div>
                </div>
                
                <hr>

                <!--BOTÕES-->

                <!-- LINHA PARA O BOTÃO ATUALIZAR E SELECT -->
                <div class="row" style="margin-top:30px;">

                    <!--COLUNA SELECT-->
                    <div class="col-2" style="padding-left:0;">
                            <div class="form-group mx-sm-3 mb-2">
                                <select class="form-control form-control-sm"
                                    name="statuslista" 
                                    id="<?php echo  $registro['id'];?>" 
                                    class="form-control" 
                                    onChange="
                                            document.getElementById('id_reg_fila').value = <?php echo $registro['id']; ?>;
                                            document.getElementById('status_reg_fila').value = this.value;
                                            ">                   
                                    <?php 
                                    $situacoes = $this->situacaoModel->getSituacoes();                   
                                    foreach($situacoes as $row) : ?> 
                                        <option value="<?php echo $row->id; ?>" 
                                                    <?php echo $row->id == $registro['situacao_id'] ? 'selected':'';?>
                                        >
                                            <?php echo $row->descricao;?>
                                        </option>
                                    <?php endforeach; ?>  
                                    </select>
                                    <!--JOGO O VALOR DA ID QUE ESTÁ NO SELECT ATRAVÉS DO EVENTO onChange para id_reg_fila PARA DEPOIS CHAMAR NO AJAX-->
                                    <input type="hidden" id="id_reg_fila" name="id_reg_fila" value="<?php echo $registro['id']; ?>">
                                    <!--JOGO O VALOR DO STATUS DO SELECT ATRAVÉS DO EVENTO onChange para status_reg_fila PARA DEPOIS CHAMAR NO AJAX--> 
                                    <input type="hidden" id="status_reg_fila" name="status_reg_fila" value="<?php echo $registro['situacao_id']; ?>"> 
                                    <input type="hidden" id="txthist" name="txthist" value="">
                            </div>
                    </div>                    


                     <!--COLUNA TEXTO HISTÓRICO-->
                     Histórico:
                     <div class="col-6" style="padding-left:0;">
                        <div class="form-group mx-sm-3 mb-2">
                            <input 
                                class="form-control form-control-sm" 
                                type="text" 
                                id="historico_<?php echo  $registro['id'];?>" 
                                name="historico_<?php echo  $registro['id'];?>"> 
                        </div>
                    </div>

                    <!--COLUNA BOTÕES-->
                    <div class="col-2" style="padding-left:0;">
                        <div class="form-group mx-sm-3 mb-2">
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

                            <a href="<?php echo URLROOT; ?>/admins/historico/<?php echo  $registro['id'];?>" class="btn btn-primary btn-sm">Histórico</a>
                        </div>                                                
                    </div>
                    
                <!-- FIM LINHA BOTÃO ATUALIZAR E SELECT -->
                </div>                     
                
            
            
            </div>
       
       
        </div>
        
    <?php endforeach; ?>
<!-- FIM DOS CARDS -->

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

