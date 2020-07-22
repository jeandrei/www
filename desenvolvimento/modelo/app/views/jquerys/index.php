

<!-- HEADER DA PAGINA -->
<?php require APPROOT . '/views/inc/header.php'; ?>

<style>       
      .my-container{
        border: 1px solid green;
        margin-top: 25px;
        margin-bottom: 25px;
     }

     .my-row{
         border: 3px solid red;
     }

     .my-col{
         border: 3px dotted blue;
     }
</style>


<script>
      /* só insere a função quando a página for totalmente carregada $(document).ready(function()*/
      $(document).ready(function() {  

            /* JQUERY GRAVA ESTADO */
            /* #gravarestado pego o id do botão que quero executar a função nesse caso o botão com id gravarestado */          
            $('#gravarestado').click(function() {
                /* passo o valor do objeto #estado que é o input do estado e jogo para a variável estado */
                var estado = $("#estado").val();                               
                /* aqui a mágica acontece */
                $.ajax({
                    /* aqui em url passamos a url do controler e o método que iremos utilizar nesse caso controller jquerys método newEstado */
                    /* a newEstado vai receber pelo POST o valor do input estado e por sua vez vai chamar no model addEstado($_POST['estado'])   */
                    url: '<?php echo URLROOT; ?>/jquerys/newEstado',
                    /* aqui o método que utilizamos nesse caso POST */
                    method:'POST',
                    /* aqui as variáveis que queremos passar para o arquivo php neste caso controller/método */
                    data:{
                        estado:estado                        
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


            /* JQUERY GRAVA MUNICIPIO */                      
            $('#gravarmunicipio').click(function() {                
                var municipio = $("#municipio").val(); 
                var estado_id = $("#estadosCadastrados").val();                
                $.ajax({
                    url: '<?php echo URLROOT; ?>/jquerys/newMunicipio',
                    method:'POST',                   
                    data:{
                        municipio:municipio,
                        estado_id:estado_id
                    },                   
                    success: function(retorno_php){ 
                    var responseObj = JSON.parse(retorno_php);                    
                    $("#messageBox")
                        .removeClass()
                        .addClass(responseObj.classe)                        
                        .html(responseObj.mensagem) 
                        .fadeIn(2000).fadeOut(2000);
                    }                    
                });
            });   





            /* COMBO */
            //pega o objeto cuja id #estadoid no evento on change
            $("#estadoid").on("change",function(){
                //atribui o valor do objeto #estadoid a variável estado_id
                var estado_id = $("#estadoid").val();                
                //passa o valor da forma do nosso mvc /controller/metodo/id nesse caso /jquerys/getMunicipios/id
                // siga para controllers/jquerys/getMunicipios e veja o resto
                $.get("<?php echo URLROOT; ?>/jquerys/getMunicipios/" + estado_id, function(data){ 
                    //remove todos os valores do option primeiro para não acumular a cada mudança
                    $("#municipioid").find("option").remove();                         
                    //adiciona o que veio do método /jquerys/getMunicipios no objeto #atendimento
                    $("#municipioid").append(data);
                });

                                
            });//change function                          
        
        
        
        
        
        
        
        
        });


</script>


<h1>Exemplos com jquery</h1>

<!-- LINHA PARA A MENSÁGEM DO JQUERY -->
<div class="container">
    <div class="row" style="height: 50px;  margin-bottom: 25px;">
        <div class="col-12">
            <div role="alert" id="messageBox" style="display:none"></div>
        </div>
    </div>
</div>

    
    
    
<!-- LINHA E COLUNAS PARA INSERIR ESTADO -->
<div class="estado" style="margin-bottom:20px;">
    <div class="row">
        
        <!-- COLUNA 1 ESTADO-->
        <div class="col-lg-4">
            <label for="estado">
                Estado
            </label>
            <input 
                type="text" 
                name="estado" 
                id="estado" 
                maxlength="60"
                class="form-control"
                value="<?php if(isset($_POST['estado'])){htmlout($_POST['estado']);} ?>"
                onkeydown="upperCaseF(this)"  
                >
        </div>

        <div class="col-lg-4" style="margin-top:30px;">
            <div class="form-group mx-sm-3 mb-2">
                <!-- BOTÃO GRAVAR o id gravarestado tem que ser o mesmo lá em cima no jquery -->                            
                <input type="submit" class="btn btn-primary mb-2 gravar" id="gravarestado" value="Gravar">   
            </div>                                                
        </div>

    </div>    
<!--FIM  LINHA E COLUNAS PARA INSERIR ESTADO -->
</div>

   





<!-- LINHA E COLUNAS PARA INSERIR MUNICIPIO -->
<div class="municipio" style="margin-bottom:20px;">
    <div class="row">
        
        <!-- COLUNA 1 ESTADOS DO BANCO DE DADOS -->
        <div class="col-lg-4">
            <label for="estadosCadastrados">
                Estados cadastrados
            </label>                             
            
            <select 
                name="estadosCadastrados" 
                id="estadosCadastrados" 
                class="form-control"                                        
            >
                    <option value="NULL">Selecione o Estado</option>
                    <?php 
                    $estados = $this->jqueryModel->getEstados();                  
                    foreach($estados as $estado) : ?> 
                        <option value="<?php echo $estado->id; ?>"
                                    <?php if(isset($_POST['estadosCadastrados'])){
                                    echo $_POST['estadosCadastrados'] == $estado->id ? 'selected':'';
                                    }
                                    ?>
                        >
                            <?php echo $estado->estado;?>
                        </option>
                    <?php endforeach; ?>  
            </select>
        </div>
        
        <!-- COLUNA 2 MUNICIPIO-->
        <div class="col-lg-4">
            <label for="municipio">
                Municipio
            </label>
            <input 
                type="text" 
                name="municipio" 
                id="municipio" 
                maxlength="60"
                class="form-control"
                value="<?php if(isset($_POST['municipio'])){htmlout($_POST['municipio']);} ?>"
                onkeydown="upperCaseF(this)"  
                >
        </div>        

        <!--BOTÃO GRAVAR-->
        <div class="col-lg-4" style="margin-top:30px;">
            <div class="form-group mx-sm-3 mb-2">
                <!-- BOTÃO GRAVAR o id gravarmunicipio tem que ser o mesmo lá em cima no jquery -->                            
                <input type="submit" class="btn btn-primary mb-2 gravar" id="gravarmunicipio" value="Gravar">   
            </div>                                                
        </div>

    </div>    
<!--FIM  LINHA E COLUNAS PARA INSERIR MUNICIPIO -->
</div>


<h3>Combo estados e municipios</h3>


<!-- LINHA E COLUNAS PARA COMBO ESTADO MUNICÍPIO -->
<div class="municipio" style="margin-bottom:20px;">
    <div class="row">
        
        <!-- COLUNA 1 ESTADOS DO BANCO DE DADOS -->
        <div class="col-lg-4">
            <label for="estadoid">
                Estados cadastrados
            </label>                             
        
            <select 
                name="estadoid" 
                id="estadoid" 
                class="form-control"                                        
            >
                    <option value="NULL">Selecione o Estado</option>
                    <?php 
                    $estados = $this->jqueryModel->getEstados();                  
                    foreach($estados as $estado) : ?> 
                        <option value="<?php echo $estado->id; ?>"
                                    <?php if(isset($_POST['estadoid'])){
                                    echo $_POST['estadoid'] == $estado->id ? 'selected':'';
                                    }
                                    ?>
                        >
                            <?php echo $estado->estado;?>
                        </option>
                    <?php endforeach; ?>  
            </select>
        </div>
        
        <!-- COLUNA 2 MUNICIPIOS DO BANCO DE DADOS -->
        <div class="col-lg-4">
            <label for="municipioid">
                Municípios por estado
            </label>                             
            
            <select 
                name="municipioid" 
                id="municipioid" 
                class="form-control"                                        
            >
                    <option value="NULL">Primeiro selecione um estado</option>
                    <?php 
                    $municipios = $this->jqueryModel->getMunicipios();                  
                    foreach($municipios as $municipio) : ?> 
                        <option value="<?php echo $municipio->id; ?>"
                                    <?php if(isset($_POST['municipioid'])){
                                    echo $_POST['municipioid'] == $municipio->id ? 'selected':'';
                                    }
                                    ?>
                        >
                            <?php echo $municipio->municipio;?>
                        </option>
                    <?php endforeach; ?>  
            </select>
        </div>
        
        <!--BOTÃO GRAVAR-->                            
        <div class="col-lg-4" style="margin-top:30px;">
            <div class="form-group mx-sm-3 mb-2">
                <!-- BOTÃO ATUALIZAR o id gravarestado tem que ser o mesmo lá em cima no jquery -->                            
                <input type="submit" class="btn btn-primary mb-2 gravar" id="gravarestadomunicipio" value="Gravar">   
            </div>                                                
        </div>

    </div>    
<!--FIM  LINHA E COLUNAS PARA INSERIR MUNICIPIO -->
</div>


                                                         



<?php require APPROOT . '/views/inc/footer.php'; ?>



