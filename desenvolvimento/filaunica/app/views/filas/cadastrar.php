<?php
    include 'header.php';
?>



<!--PARTE ACIMA IMAGEM GRUPO E BARRA AZUL-->
<div class="row">

    <div class="col-lg-12">
        <blockquote style="border-left: 10px solid #0D54AA; margin: 1.5em 10px;padding: 0.5em 10px;">            
            <img style="width:30px; height:30px;margin:15px 10px 10px 0px;" src="<?php echo URLROOT; ?>/img/people-group-team.png">
            <span style="font-size:25px;">Fila Única</span>
        </blockquote>
    </div>    
</div><!--row-->





<!--BOTÃO VOLTAR-->
<div class="row" style="margin-bottom: 10px;">
    <div class="col-lg-2">
        <button id="voltar" class="prev-step btn btn-default btn-block" style="background-color:#FFFAF0">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            Voltar
        </button>
    </div>
</div>




<!--************************DAQUI PARA BAIXO INICIA AS ABAS**********************************-->

<!--DIV 1 PARA ACOMODAR AS ABAS-->
<div class="row" style="background-color:#FFFAF0">
        
    <form action="?act=save" method="post" enctype="multipart/form-data" onsubmit="return validation()"> 

        <!--DIV 2 CONTEÚDO DENTRO DAS ABAS-->
        <div class="col-lg-14" id="result"> 
            
            <!--UL DAS ABAS-->
            <ul class="nav nav-tabs" role="tablist" id="myTabs">
                    
                <!--REFERENTE A ABA 1ª ETAPA SÓ A PARTE SUPERIOR-->
                <li id="aba1" role="presentation" class="nav-item">
                    <a class="nav-link active" href="#identificacao" aria-controls="identificacao" role="tab" data-toggle="tab">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        1ª Etapa
                    </a>
                </li>
                <!--REFERENTE A ABA 2ª ETAPA SÓ A PARTE SUPERIOR-->
                <li role="presentation" class="nav-item">
                    <a class="nav-link" href="#childrem" aria-controls="childrem" role="tab" data-toggle="tab">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        2ª Etapa
                    </a>
                </li>
            
            <!--FECHA UL DAS ABAS-->
            </ul>
                
        <!--FECHA DIV 2-->
        </div>

    </form>

<!--FECHA DIV 1 ACOMODAR ABAS-->
</div>





<?php 
    include 'footer.php';
?>