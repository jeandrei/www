<?php
    // TEM QUE SER EM UM HEADER E FOOTER DIFERENTE POIS SE NÃO VAI TRAZER O NAVBAR JUNTO
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
                    <a class="nav-link active" href="#etapaUm" aria-controls="etapaUm" role="tab" data-toggle="tab">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        1ª Etapa
                    </a>
                </li>
                <!--REFERENTE A ABA 2ª ETAPA SÓ A PARTE SUPERIOR-->
                <li role="presentation" class="nav-item">
                    <a class="nav-link" href="#etapaDois" aria-controls="etapaDois" role="tab" data-toggle="tab">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        2ª Etapa
                    </a>
                </li>
            
            <!--FECHA UL DAS ABAS-->
            </ul>

            <!--DIV 3 PARA AJUSTAR ESPAÇO NA PARTE SUPERIOR DA ABA ENTRE O CAMPO NOME E A ABA ETAPA-->
            <div class="tab-content" style="padding-top: 20px;" style="background-color:blue">
            
                <!--********************************DIV 4 1ª ETAPA********************************-->
                <div role="tabpanel" class="tab-pane active" id="etapaUm">

                    <div class="row">
                    
                        <!--****************************INICIO BLOCO DA ESQUERDA***********************-->
                        <div class="col-lg-6">
                        
                             <!--INICIO DO BLOCO VERDE-->
                             <blockquote style="border-left: 10px solid #008a00; margin: 1.5em 10px;padding: 0.5em 10px;">
                               
                                <!--NOME DO RESPONSÁVEL-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="responsavel">
                                                *Nome completo do responsável:
                                            </label>
                                            <input 
                                                type="text" 
                                                name="responsavel" 
                                                id="responsavel"
                                                class="form-control "
                                                value=""
                                                onkeydown="upperCaseF(this)"                                            
                                                >
                                            <span id="responsavel_err" class="text-danger"></span> 
                                        </div>
                                    </div>
                                <!--NOME DO RESPONSÁVEL-->
                                </div>
                                


                                <!--CPF E EMAIL NA MESMA LINHA-->
                                <div class="row">
                                    <!--CPF-->
                                    <div class="col-lg-4">
                                        <label for="cpf">
                                            CPF do responsável:
                                        </label>
                                        <input 
                                            type="text" 
                                            name="cpf" 
                                            id="cpf" 
                                            class="form-control cpf "
                                            value=""
                                            maxlength="14"
                                        >
                                        <span id="cpf_err" class="text-danger"></span>
                                    </div>

                                    <!--EIMAIL-->
                                    <div class="col-lg-8">
                                        <label for="email">
                                            E-mail:
                                        </label>
                                        <input 
                                            type="text" 
                                            name="email" 
                                            id="email" 
                                            class="form-control "
                                            value=""
                                        >
                                        <span id="email_err" class="text-danger"></span>
                                    </div>
                                <!--CPF E EMAIL NA MESMA LINHA-->
                                </div>

                                <!--LINHA NOVA PARA OS CELULARES-->
                                <div class="row">
                                    <!--CELULAR 1-->
                                    <div class="col-lg-6">
                                        <label for="telefone1">
                                            1 - *Celular para contato:
                                        </label>
                                        <input 
                                            type="text" 
                                            name="telefone1" 
                                            id="telefone1" 
                                            maxlength="15"
                                            class="form-control telefone "
                                            value=""
                                            >
                                            <span id="telefone1_err" class="text-danger"></span>
                                    </div>

                                    <!--CELULAR 2-->
                                    <div class="col-lg-6">
                                        <label for="telefone2">
                                            2 - Celular para contato:
                                        </label>
                                        <input 
                                            type="text" 
                                            name="telefone2" 
                                            id="telefone2" 
                                            maxlength="15"
                                            class="form-control telefone "
                                            value=""
                                        >
                                        <span id="telefone2_err" class="text-danger"></span>
                                    </div>
                                    <!--LINHA NOVA PARA OS CELULARES-->
                                </div>

                                <!--AQUI VAI O SELECT DE BAIRRO E RUA-->


                                <!--NOVA LINHA PARA NÚMERO E COMPLEMENTO-->                            
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="numero">
                                            Número:
                                        </label>
                                        <input 
                                            type="number" 
                                            name="numero" 
                                            id="numero" 
                                            class="form-control onlynumbers"
                                            value=""
                                            >
                                    </div>

                                    <div class="col-lg-8">
                                        <label for="complemento">
                                            Complemento:
                                        </label>
                                        <input 
                                            type="text" 
                                            name="complemento" 
                                            id="complemento" 
                                            class="form-control"
                                            value=""
                                            onkeydown="upperCaseF(this)" 
                                        >
                                    </div>
                                <!--FIM LINHA PARA NÚMERO E COMPLEMENTO-->   
                                </div> 

                             
                             <!--FECHA BLOCO VERDE-->                            
                             </blockquote>

                             <!--BLOCO AMARELO-->
                            <blockquote style="border-left: 10px solid #F4C20B; margin: 1.5em 10px;padding: 0.5em 10px;">
                            
                                <!--NOME DA CRIANÇA-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="nome">
                                                *Nome completo da criança :
                                            </label>
                                            <input 
                                                type="text" 
                                                name="nome" 
                                                id="nome" 
                                                class="form-control "
                                                value=""
                                                onkeydown="upperCaseF(this)" 
                                                >
                                        <span id="nome_err" class="text-danger"></span>
                                        </div>
                                    </div>
                                <!--NOME DA CRIANÇA-->
                                </div>


                                <!--NASCIMENTO E CERTIDÃO-->
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="nascimento">
                                                *Data de nascimento:
                                            </label>
                                            <input 
                                                type="date" 
                                                name="nascimento" 
                                                id="nascimento"
                                                class="form-control " 
                                                value=""
                                                maxlength="10"
                                                >
                                        <span id="nascimento_err" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <label for="certidao">
                                                Certidão de nascimento:
                                            </label>
                                            <input 
                                                type="text" 
                                                name="certidao" 
                                                id="certidao" 
                                                class="form-control"
                                                value=""
                                            >
                                        </div>
                                    </div>
                                <!--NASCIMENTO E CERTIDÃO-->
                                </div>


                                <!--TEM DEFICIÊNCIA-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="alert alert-warning" role="alert">
                                            <div class="checkbox checkbox-primary checkbox-inline">
                                                <input id="portador" type="checkbox" name="portador" value="1" >
                                                <label for="portador">
                                                    <strong>Criança com deficiência ?</strong>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <!--TEM DEFICIÊNCIA-->
                                </div>

                            <!--FIM BLOCO AMARELO-->
                            </blockquote>


                        <!--FECHA BLOCO ESQUERDA-->
                        </div>

                        <!--*****************************INICIO BLOCO DA DIREITA****************************-->
                        <div class="col-lg-6">

                            <!--BLOCO AZUL DA DIREITA-->
                            <blockquote style="border-left: 10px solid #0c85d0; margin: 1.5em 10px;padding: 0.5em 10px;">
                                

                                <!--INFORMATIVO DE OPÇÕES DE ESCOLHA-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-info" role="alert">
                                            Você pode escolher até três escolas
                                            de preferência sendo obrigatório <strong>escolher pelo menos
                                                uma.</strong>
                                            Será chamados de acordo com a disponibilidade das escolas abaixo e sua
                                            posição na fila.
                                        </div>
                                    </div>
                                <!--INFORMATIVO DE OPÇÕES DE ESCOLHA-->
                                </div>


                            <!--FIM BLOCO AZUL DA DIREITA-->
                            </blockquote>

                        <!--FECHA BLOCO DA DIREITA-->
                        </div>

                    <!--FECHA DIV ROW-->
                    </div>


                    <!--BOTÃO PRÓXIMO-->
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="next-step btn btn-primary btn-block" style="color:white;">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                Proximo
                            </a>
                        </div>
                    <!--BOTÃO PRÓXIMO-->
                    </div>


                <!--FECHA DIV 4 1ª ETAPA tabpanel-->
                </div>

                <!--DIV 5 2º ETAPA-->
                <div role="tabpanel" class="tab-pane" id="etapaDois">
                    <!-- DIV 6 LINHA COMPROVANTES-->
                    <div class="row">   
                        
                    <!--FECHA DIV 6 LINHA COMPROVANTES-->
                    </div>

                <!--FECHA DIV 5 2º ETAPA-->
                </div>
            <!--FECHA DIV 3-->
            </div>
                
        <!--FECHA DIV 2-->
        </div>

    </form>

<!--FECHA DIV 1 ACOMODAR ABAS-->
</div>





<?php 
    include 'footer.php';
?>