<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p>

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

<!-- CONTEÚDO DO BOOTSTRAP -->
<p>O layout do bootstrap é básicamente container, row e col</p>
    <p>Primeiro criamos o container</p>
    <p>Depois a linha row</p>
    <p>E por último a coluna col esta tem um grid com um total de 12 colunas</p>
    <p>Onde a somatória das colunas tem que ser igual a 12</p>
    <p>As colunas estão em pontilhado</p>
    <div class="container my-container">
        <div class="row">
            <div class="col-4 my-col"><!-- usando 4 das 12 colunas -->
                Linha com 4 das 12 colunas disponíveis
            </div>
            <div class="col-8 my-col"><!-- usando 8 das 12 colunas 4+8=12 -->
                Linha com 8 das 12 colunas disponíveis
            </div>
        </div>
        <div class="row my-row">
            <div class="col my-col">
                Linha com as 12 colunas disponíveis
            </div>
        </div>
    </div>



    <p>Para ajustar o layout conforme o tamanho da tela</p>
    <p>md-4 para tamanhos médios o telas grandes utilizar 4 colunas das 12</p>
    <p>lg para telas grandes</p>
    <p>xl para telas extra grandes</p>
    <p>sm para telas pequenas</p>
    <p>para telas bem pequenas é o padrão não coloca anda</p>
    <p>redimensione a tela para ficar menor e vai ver o resultado</p>
    <p>observe que pode ser definido para cada situação de tela</p>
    <p>col-md-4  col-sm-6 my-col</p>
    <p>aqui estou dizendo que em tamanho médio usar 4 colunas e em tamanho pequeno utilizar 6</p>

    <div class="container my-container">
        <div class="row">
            <div class="col-md-4  col-sm-6 my-col"><!-- usando 4 das 12 colunas -->
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col"><!-- usando 8 das 12 colunas 4+8=12 -->
                Row 1 Col 2
            </div>
        </div>
        <div class="row my-row">
            <div class="col my-col">
                Row 2 Col 1
            </div>
        </div>
    </div>





    <p>quando temos espaço em branco entre as 12 colunas</p>
    <p> 4 + 8 = 8 fica um espaço em branco</p>
    <p>colocando tudo centralizado justify-content-center</p>
    <div class="container my-container">
        <div class="row">
            <div class="col-md-4  col-sm-6 my-col"><!-- usando 4 das 12 colunas -->
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col"><!-- usando 8 das 12 colunas 4+8=12 -->
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-center my-row">
            <div class="col-4 my-col">
                center
            </div>
            <div class="col-4 my-col">
                center
            </div>   
        </div> 
    </div>




    <p>quando temos espaço em branco entre as 12 colunas</p>
    <p> 4 + 8 = 8 fica um espaço em branco</p>
    <p>colocando tudo centralizado justify-content-end</p>
    <div class="container my-container">
        <div class="row">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-end my-row">
            <div class="col-4 my-col">
                end
            </div>
            <div class="col-4 my-col">
                end
            </div>   
        </div> 
    </div>




    <p>quando temos espaço em branco entre as 12 colunas</p>
    <p> 4 + 8 = 8 fica um espaço em branco</p>
    <p>colocando tudo centralizado justify-content-around</p>
    <div class="container my-container">
        <div class="row">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-around my-row">
            <div class="col-4 my-col">
                around
            </div>
            <div class="col-4 my-col">
                around
            </div>   
        </div> 
    </div>

    <p>quando temos espaço em branco entre as 12 colunas</p>
    <p> 4 + 8 = 8 fica um espaço em branco</p>
    <p>colocando tudo centralizado justify-content-between</p>
    <div class="container my-container">
        <div class="row">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-between my-row">
            <div class="col-4 my-col">
                between
            </div>
            <div class="col-4 my-col">
                between
            </div>   
        </div> 
    </div>

    <p>alinhamento vertical</p>
    <p>align-items-start coloca o conteúdo na parte de cima</p>
    <div class="container my-container">
        <div class="row" style="height: 300px;">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-between align-items-start my-row" style="height: 300px;">
            <div class="col-4 my-col">
                START
            </div>
            <div class="col-4 my-col">
                START
            </div>   
        </div> 
    </div>


    <p>alinhamento vertical</p>
    <p>align-items-center coloca o conteúdo no centro vertical</p>
    <div class="container my-container">
        <div class="row" style="height: 300px;">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-between align-items-center my-row" style="height: 300px;">
            <div class="col-4 my-col">
                CENTER
            </div>
            <div class="col-4 my-col">
                CENTER
            </div>   
        </div> 
    </div>


    <p>alinhamento vertical</p>
    <p>align-items-stretch é o default então não precisa colocar</p>
    <div class="container my-container">
        <div class="row" style="height: 300px;">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-between align-items-stretch my-row" style="height: 300px;">
            <div class="col-4 my-col">
                STRETCH
            </div>
            <div class="col-4 my-col">
                STRETCH
            </div>   
        </div> 
    </div>


    <p>alinhamento vertical</p>
    <p>aplicando apenas para uma coluna align-self-start</p>
    <div class="container my-container">
        <div class="row" style="height: 300px;">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-between align-items-stretch my-row" style="height: 300px;">
            <div class="col-4 my-col">
                STRETCH
            </div>
            <div class="col-4 my-col align-self-start">
                START
            </div>   
        </div> 
    </div>



    
    <p>alterando a ordem é bom se no caso precisa mudar a posição dos blocos dependendo do dispositivo</p>
    <p>order order-12 order-2 o bloco 2 fica na frente do 12</p>
    <div class="container my-container">
        <div class="row" style="height: 300px;">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-between align-items-stretch my-row" style="height: 300px;">
            <div class="col-4 my-col order-12">
                STRETCH
            </div>
            <div class="col-4 my-col align-self-start order-2">
                START
            </div>   
        </div> 
    </div>


    <p>alterar a ordem apenas em telas medias order order-md-12 order-md-2 o bloco 2 fica na frente do 12</p>
    <div class="container my-container">
        <div class="row" style="height: 300px;">
            <div class="col-md-4  col-sm-6 my-col">
                Row 1 Col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 Col 2
            </div>
        </div>
        <div class="row justify-content-between align-items-stretch my-row" style="height: 300px;">
            <div class="col-4 my-col order-md-12">
                STRETCH
            </div>
            <div class="col-4 my-col align-self-start order-md-2">
                START
            </div>   
        </div> 
    </div>
<!-- FIM CONTEÚDO DO BOOTSTRAP -->


<?php require APPROOT . '/views/inc/footer.php'; ?>

