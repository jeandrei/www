

<!-- HEADER DA PAGINA -->
<?php require APPROOT . '/views/inc/header.php'; ?>


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
                    var responseObj = JSON.parse(retorno_php);                    
                    $("#messageBox")
                        .removeClass()
                        .addClass("confirmbox "+responseObj.classe)                        
                        .html(responseObj.mensagem) 
                        .fadeIn(2000).fadeOut(2000);
                    }                    
                });
            });  


            /* JQUERY GRAVA MUNICIPIO */                      
            $('#gravarmunicipio').click(function() {                
                var municipio = $("#municipio").val(); 
                $.ajax({
                    url: '<?php echo URLROOT; ?>/jquerys/newMunicipio',
                    method:'POST',                   
                    data:{
                        municipio:municipio                        
                    },                   
                    success: function(retorno_php){ 
                    var responseObj = JSON.parse(retorno_php);                    
                    $("#messageBox")
                        .removeClass()
                        .addClass("confirmbox "+responseObj.classe)                        
                        .html(responseObj.mensagem) 
                        .fadeIn(2000).fadeOut(2000);
                    }                    
                });
            });                      
        
        
        
        
        
        
        
        
        });


</script>


<h1>Exemplos com jquery</h1>

<div class="messagebox" role="alert" id="messageBox" style="display:none"></div>





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
                    >
            </div>

            <div class="col-lg-4" style="margin-top:30px;">
                <div class="form-group mx-sm-3 mb-2">
                    <!-- BOTÃO ATUALIZAR o id gravarestado tem que ser o mesmo lá em cima no jquery -->                            
                    <input type="submit" class="btn btn-primary mb-2 gravar" id="gravarestado" value="Gravar">   
                </div>                                                
            </div>

        </div>    
    <!--FIM  LINHA E COLUNAS PARA INSERIR ESTADO -->
    </div>






     <!-- LINHA E COLUNAS PARA INSERIR MUNICIPIO -->
     <div class="municipio" style="margin-bottom:20px;">
        <div class="row">
            
            <!-- COLUNA 1 MUNICIPIO-->
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
                    >
            </div>

            <div class="col-lg-4" style="margin-top:30px;">
                <div class="form-group mx-sm-3 mb-2">
                    <!-- BOTÃO ATUALIZAR o id gravarestado tem que ser o mesmo lá em cima no jquery -->                            
                    <input type="submit" class="btn btn-primary mb-2 gravar" id="gravarmunicipio" value="Gravar">   
                </div>                                                
            </div>

        </div>    
    <!--FIM  LINHA E COLUNAS PARA INSERIR MUNICIPIO -->
    </div>


                                                         



<?php require APPROOT . '/views/inc/footer.php'; ?>



