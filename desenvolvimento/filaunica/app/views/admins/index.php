

<?php require APPROOT . '/views/inc/header.php'; ?>

<?php  

//$situacoes = $this->situacaoModel->getSituacoes(); 
//die(var_dump($situacoes));


?>



<script>
    
    function limpar(){
        document.getElementById('buscanome').value = "";
        document.getElementById('buscaprotocolo').value = "";
        document.getElementById('buscaetapa').value = "Todos";
        document.getElementById('buscasituacao').value = "Todos";
        focofield("buscanome");
    }    
    
    window.onload = function(){
        focofield("buscanome");
    }     

        
    //PARA ABRIR EM UMA NOVA ABA CRIO ESSA FUNÇÃO NEWTAB QUE É CHAMADA NO EVENTO ONCLICK DO BOTÃO IMPRIMIR
    function newtab(){
      document.getElementById('filtrar').setAttribute('target', '_blank');
    }
</script>


<!-- LINHA PARA A MENSÁGEM DO JQUERY -->
<div class="container">
    <?php flash('register_success');?>
</div>



<!-- FORMULÁRIO COM OS CAMPOS DE PESQUISA -->
<form id="filtrar" action="<?php echo URLROOT; ?>/admins/index" method="post" enctype="multipart/form-data">
    <!-- LINHA E COLUNAS PARA OS CAMPOS DE BUSCA -->
    <div class="row">     
        
        <!-- COLUNA 1 PROTOCOLO-->
        <div class="col-lg-2">
            <label for="buscaprotocolo">
                Buscar Protocolo
            </label>
            <input 
                type="number" 
                name="buscaprotocolo" 
                id="buscaprotocolo" 
                maxlength="60"
                class="form-control"
                value="<?php if(isset($_POST['buscaprotocolo'])){htmlout($_POST['buscaprotocolo']);} ?>"
                onkeydown="upperCaseF(this)"   
                ><span class="invalid-feedback">
                    <?php // echo $data['nome_err']; ?>
                </span>
        </div>


        <!-- COLUNA 2 NOME-->
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


        <!-- COLUNA 3 ETAPA -->
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
        
        
        
        <!-- COLUNA 4 SITUAÇÃO-->
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
                
                <!--4ª Linha do card-->
                <div class="row">
                    <div class="col-sm-8">
                        <?php if($registro['situacao_id'] == 2 || $registro['situacao_id'] == 5){
                            echo "Escola em que a criança foi matriculada/convocada: <b>" . $registro['opcao_matricula'] . "</b>";}
                            ?>                      
                    </div>  

                    <div class="col-sm-4">
                        <?php if($registro['situacao_id'] == 2 || $registro['situacao_id'] == 5){
                            echo "Turno da matricula/convocação: " ."<b>" . $registro['turno_matricula'] . "</b>";}
                            ?>                      
                    </div>                   
                </div>

                <div class="row">
                    <div class="col-sm-12">Última informação do histórico: <?php echo $registro['ultimo_historico']; ?></div>
                </div>
                
                
                <hr>

                <!--BOTÕES-->

                <!-- LINHA PARA OS BOTÕES -->
                <div class="row" style="margin-top:30px;">
                    <div class="col-md-12 text-center">                        
                        <a href="<?php echo URLROOT; ?>/admins/edit/<?php echo  $registro['id'];?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="<?php echo URLROOT; ?>/admins/historico/<?php echo  $registro['id'];?>" class="btn btn-warning btn-sm">Histórico</a>
                    </div>  
                <!-- FIM LINHA BOTÕES -->
                </div> 

            </div><!--<div class="card-body">-->

        
        </div><!-- <div class="card">-->
        
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

