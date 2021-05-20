<!-- HEADER DA PAGINA -->
<?php include 'header.php'; ?>


<!-- COLOCO UM BACKGROUND CINZA E CRIAMOS UM CONTAINDER COM MARGEN SUPERIOR DE 90PX -->
<body style="background-color:#DCDCDC">
    <div class="container" style="margin-top: 90px;">  


<?php
    // FUNÇÃO DO HELPERS PARA EMITIR MENSÁGENS
    echo flash('fila-erro');
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
        <a href="<?php echo URLROOT; ?>/index" id="voltar" class="btn btn-default btn-block" style="background-color:#FFFAF0">
            <i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar
        </a>
        
    </div>
</div>




<!--************************DAQUI PARA BAIXO INICIA AS ABAS**********************************-->

<!--DIV 1 PARA ACOMODAR AS ABAS-->
<div class="row" style="background-color:#FFFAF0">        
    
    <form id="cadastrar" action="<?php echo URLROOT; ?>/filas/cadastrar" method="post" enctype="multipart/form-data">  

                <!--DIV 2 CONTEÚDO DENTRO DAS ABAS-->
                <div class="col-lg-14" id="result"> 
                    
                            

                            <!--DIV 3 PARA AJUSTAR ESPAÇO NA PARTE SUPERIOR -->
                            <div class="tab-content" style="padding-top: 20px;" style="background-color:blue">
                            
                                          
                                                
                                                        <!--LINHA PARA OS BLOCOS-->
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
                                                                                                                    <span class="obrigatorio">*</span>Nome completo do responsável:
                                                                                                                </label>
                                                                                                                <input 
                                                                                                                    type="text" 
                                                                                                                    name="responsavel" 
                                                                                                                    id="responsavel"
                                                                                                                    class="form-control <?php echo (!empty($data['responsavel_err'])) ? 'is-invalid' : ''; ?>" 
                                                                                                                    value="<?php htmlout($data['responsavel']); ?>"
                                                                                                                    onkeydown="upperCaseF(this)"                                            
                                                                                                                >
                                                                                                                    <span class="invalid-feedback">
                                                                                                                        <?php echo $data['responsavel_err']; ?>
                                                                                                                    </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <!--NOME DO RESPONSÁVEL-->
                                                                                                    </div>
                                                                                                    


                                                                                                    <!--CPF E EMAIL NA MESMA LINHA A VALIDAÇÃO DO CPF PELO JQUERY FUNCIONA POIS FOI APLICADO A CLASSE CPF A FUNÇÃO ESTÁ NO MAIN.JS-->
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
                                                                                                                class="form-control cpf <?php echo (!empty($data['cpf_err'])) ? 'is-invalid' : ''; ?>" 
                                                                                                                value="<?php htmlout($data['cpf']); ?>"
                                                                                                                maxlength="14"
                                                                                                            >
                                                                                                                <span class="invalid-feedback">
                                                                                                                    <?php echo $data['cpf_err']; ?>
                                                                                                                </span>
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
                                                                                                                class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                value="<?php htmlout($data['email']); ?>"
                                                                                                            >
                                                                                                            <span class="invalid-feedback">
                                                                                                                <?php echo $data['email_err']; ?>
                                                                                                            </span>
                                                                                                        </div>
                                                                                                    <!--CPF E EMAIL NA MESMA LINHA-->
                                                                                                    </div>

                                                                                                    <!--LINHA NOVA PARA OS CELULARES-->
                                                                                                    <div class="row">
                                                                                                        <!--CELULAR 1-->
                                                                                                        <div class="col-lg-6">
                                                                                                            <label for="telefone">
                                                                                                                Telefone para contato:
                                                                                                            </label>
                                                                                                            <input 
                                                                                                                type="text" 
                                                                                                                name="telefone" 
                                                                                                                id="telefone" 
                                                                                                                maxlength="15"
                                                                                                                class="form-control telefone <?php echo (!empty($data['telefone_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                value="<?php htmlout($data['telefone']); ?>"
                                                                                                                >
                                                                                                                <span class="invalid-feedback">
                                                                                                                    <?php echo $data['telefone_err']; ?>
                                                                                                                </span>
                                                                                                        </div>

                                                                                                        <!--CELULAR 2-->
                                                                                                        <div class="col-lg-6">
                                                                                                            <label for="celular">
                                                                                                                Celular para contato:
                                                                                                            </label>
                                                                                                            <input 
                                                                                                                type="text" 
                                                                                                                name="celular" 
                                                                                                                id="celular" 
                                                                                                                maxlength="15"
                                                                                                                class="form-control celular <?php echo (!empty($data['celular_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                value="<?php htmlout($data['celular']); ?>"
                                                                                                            >
                                                                                                            <span class="invalid-feedback">
                                                                                                                <?php echo $data['celular_err']; ?>
                                                                                                            </span>
                                                                                                        </div>
                                                                                                        <!--LINHA NOVA PARA OS CELULARES-->
                                                                                                    </div>

                                                                                                    <!--NOVA LINHA PARA BAIRRO E RUA-->
                                                                                                    <div class="row">
                                                                                                            <div class="col-lg-6">
                                                                                                                <label for="bairro">
                                                                                                                    <span class="obrigatorio">*</span>Bairro:
                                                                                                                </label>
                                                                                                                <select 
                                                                                                                    name="bairro" 
                                                                                                                    id="bairro" 
                                                                                                                    class="form-control <?php echo (!empty($data['bairro_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                    >  
                                                                                                                    <option value="">Selecione o Bairro</option>
                                                                                                                        <?php                                                    
                                                                                                                        foreach($data['bairros'] as $bairro) : ?> 
                                                                                                                            <option value="<?php echo $bairro->id; ?>"
                                                                                                                                        <?php echo $data['bairro'] == $bairro->id ? 'selected':'';?>                                                                                                                                   
                                                                                                                            >
                                                                                                                                <?php echo $bairro->nome;?>
                                                                                                                            </option>
                                                                                                                        <?php endforeach; ?>  
                                                                                                                </select>
                                                                                                                <span class="invalid-feedback">
                                                                                                                    <?php echo $data['bairro_err']; ?>
                                                                                                                </span>
                                                                                                            </div>

                                                                                                            <div class="col-lg-6">
                                                                                                                <label for="rua">
                                                                                                                    <span class="obrigatorio">*</span>Rua:
                                                                                                                </label>
                                                                                                                <input 
                                                                                                                    type="text" 
                                                                                                                    name="rua" 
                                                                                                                    id="rua"
                                                                                                                    class="form-control <?php echo (!empty($data['rua_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                    value="<?php htmlout($data['rua']); ?>"
                                                                                                                    onkeydown="upperCaseF(this)" 
                                                                                                                    >
                                                                                                                    <span class="invalid-feedback">
                                                                                                                        <?php echo $data['rua_err']; ?>
                                                                                                                    </span>
                                                                                                            </div>
                                                                                                                                        
                                                                                                        <!--NOVA LINHA PARA BAIRRO E RUA-->
                                                                                                        </div>


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
                                                                                                                class="form-control onlynumbers <?php echo (!empty($data['number_err'])) ? 'is-invalid' : ''; ?>"                                                                                                                
                                                                                                                value="<?php htmlout($data['numero']); ?>"
                                                                                                                >
                                                                                                                <span class="invalid-feedback">
                                                                                                                    <?php echo $data['rua_err']; ?>
                                                                                                                </span>
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
                                                                                                                value="<?php htmlout($data['complemento']); ?>"
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
                                                                                                                    <span class="obrigatorio">*</span>Nome completo da criança :
                                                                                                                </label>
                                                                                                                <input 
                                                                                                                    type="text" 
                                                                                                                    name="nome" 
                                                                                                                    id="nome" 
                                                                                                                    class="form-control <?php echo (!empty($data['nome_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                    value="<?php htmlout($data['nome']); ?>"
                                                                                                                    onkeydown="upperCaseF(this)" 
                                                                                                                    >
                                                                                                                    <span class="invalid-feedback">
                                                                                                                        <?php echo $data['nome_err']; ?>
                                                                                                                    </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <!--NOME DA CRIANÇA-->
                                                                                                    </div>


                                                                                                    <!--NASCIMENTO E CERTIDÃO-->
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-5">
                                                                                                            <div class="form-group">
                                                                                                                <label for="nascimento">
                                                                                                                    <span class="obrigatorio">*</span>Data de nascimento:
                                                                                                                </label>
                                                                                                                <input 
                                                                                                                    type="date" 
                                                                                                                    name="nascimento" 
                                                                                                                    id="nascimento"
                                                                                                                    class="form-control <?php echo (!empty($data['nascimento_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                    value="<?php htmlout($data['nascimento']); ?>"
                                                                                                                    maxlength="10"
                                                                                                                    >
                                                                                                                    <span class="invalid-feedback">
                                                                                                                        <?php echo $data['nascimento_err']; ?>
                                                                                                                    </span>
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
                                                                                                                    class="form-control <?php echo (!empty($data['certidao_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                    value="<?php htmlout($data['certidao']); ?>"
                                                                                                                >
                                                                                                                <span class="invalid-feedback">
                                                                                                                    <?php echo $data['certidao_err']; ?>
                                                                                                                </span>
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
                                                                                                        <p>Quando chegar a vez da criança, a equipe da Secretaria da Educação entrará em contato para oferecer a vaga independente das opções escolhidas.</p>
                                                                                                           <p>Selecione abaixo ao menos a <strong>primeira</strong> opção.</p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <!--INFORMATIVO DE OPÇÕES DE ESCOLHA-->
                                                                                                </div>

                                                                                               
                                                                                                <!--ESCOLA E TURNO OPÇÃO 1-->
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12">
                                                                                                        <label for="opcao1" class="help-block">
                                                                                                            <span class="obrigatorio">*</span><strong>Primeira opção:</strong>
                                                                                                        </label>
                                                                                                        <select 
                                                                                                            name="opcao1" 
                                                                                                            id="opcao1" 
                                                                                                            class="form-control <?php echo (!empty($data['opcao1_err'])) ? 'is-invalid' : ''; ?>"                                       
                                                                                                        >
                                                                                                                <option value="">Selecione a Escola</option>
                                                                                                                <?php                                                    
                                                                                                                    foreach($data['escolas'] as $escola) : ?> 
                                                                                                                        <option value="<?php echo $escola->id; ?>"
                                                                                                                                    <?php echo $data['opcao1'] == $escola->id ? 'selected':'';?>                                                                                                                                   
                                                                                                                        >
                                                                                                                            <?php echo $escola->nome;?>
                                                                                                                        </option>
                                                                                                                    <?php endforeach; ?>      
                                                                                                                    
                                                                                                        </select>                                           
                                                                                                        <span class="invalid-feedback">
                                                                                                                <?php echo $data['opcao1_err']; ?>
                                                                                                        </span>
                                                                                                    </div>                                                                                                    
                                                                                                <!--ESCOLA E TURNO OPÇÃO 1-->
                                                                                                </div>





                                                                                                <!--ESCOLA E TURNO OPÇÃO 2-->
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12">
                                                                                                        <label for="opcao2" class="help-block">
                                                                                                            Segunda opção:
                                                                                                        </label>
                                                                                                        <select 
                                                                                                            name="opcao2" 
                                                                                                            id="opcao2" 
                                                                                                            class="form-control"                                        
                                                                                                        >
                                                                                                                <option value="">Selecione a Escola</option>
                                                                                                                <?php                                                    
                                                                                                                    foreach($data['escolas'] as $escola) : ?> 
                                                                                                                        <option value="<?php echo $escola->id; ?>"
                                                                                                                                    <?php echo $data['opcao2'] == $escola->id ? 'selected':'';?>                                                                                                                                   
                                                                                                                        >
                                                                                                                            <?php echo $escola->nome;?>
                                                                                                                        </option>
                                                                                                                    <?php endforeach; ?>      
                                                                                                                    
                                                                                                        </select>                                           
                                                                                                        <span id="opcao2_err" class="text-danger"></span>
                                                                                                    </div>
                                                                                                    
                                                                                                <!--ESCOLA E TURNO OPÇÃO 2-->
                                                                                                </div>



                                                                                                <!--ESCOLA E TURNO OPÇÃO 3-->
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12">
                                                                                                        <label for="opcao3" class="help-block">
                                                                                                            Terceira opção:
                                                                                                        </label>
                                                                                                        <select 
                                                                                                            name="opcao3" 
                                                                                                            id="opcao3" 
                                                                                                            class="form-control"                                        
                                                                                                        >
                                                                                                                <option value="">Selecione a Escola</option>
                                                                                                                <?php                                                    
                                                                                                                    foreach($data['escolas'] as $escola) : ?> 
                                                                                                                        <option value="<?php echo $escola->id; ?>"
                                                                                                                                    <?php echo $data['opcao3'] == $escola->id ? 'selected':'';?>                                                                                                                                   
                                                                                                                        >
                                                                                                                            <?php echo $escola->nome;?>
                                                                                                                        </option>
                                                                                                                    <?php endforeach; ?>      
                                                                                                                    
                                                                                                        </select>                                           
                                                                                                        <span id="opcao3_err" class="text-danger"></span>
                                                                                                    </div>                                                                                                    
                                                                                                <!--ESCOLA E TURNO OPÇÃO 3-->
                                                                                                </div>


                                                                                                <!--TURNO DESEJADO-->
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12">
                                                                                                        <label for="opcao_turno" class="help-block">
                                                                                                            <span class="obrigatorio">*</span>Turno desejado:
                                                                                                        </label>
                                                                                                        <select 
                                                                                                            name="opcao_turno" 
                                                                                                            id="opcao_turno" 
                                                                                                            class="form-control <?php echo (!empty($data['opcao_turno_err'])) ? 'is-invalid' : ''; ?>"                                       
                                                                                                        >
                                                                                                                <option value="">Selecione o turno desejado</option>
                                                                                                                <option value="1" <?php echo $data['opcao_turno'] == '1' ? 'selected':'';?>>Matutino</option>
                                                                                                                <option value="2" <?php echo $data['opcao_turno'] == '2' ? 'selected':'';?>>Vespertino</option>                                                                                                                   
                                                                                                                    
                                                                                                        </select>                                           
                                                                                                        <span class="invalid-feedback">
                                                                                                                <?php echo $data['opcao_turno_err'];?>
                                                                                                        </span>
                                                                                                        </div>                                                                                                 
                                                                                                <!--TURNO DESEJADO-->
                                                                                                </div>





                                                                                                 <!--OBSERVACAO-->
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="obs">
                                                                                                                Observação
                                                                                                            </label>
                                                                                                            <textarea 
                                                                                                                class="form-control" 
                                                                                                                id="obs"  
                                                                                                                name="obs"                                                                          
                                                                                                            ><?php if(!empty($_POST['obs'])){
                                                                                                                    htmlout($data['obs']);
                                                                                                                }?></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <!--OBSERVACAO-->
                                                                                                </div>

                                                                                    <!--FIM BLOCO AZUL DA DIREITA-->
                                                                                    </blockquote>

                                                                        <!--FECHA BLOCO DA DIREITA-->
                                                                        </div>

                                                        <!--FECHA DIV LINHA PARA OS BLOCOS-->
                                                        </div>                                                           

                                                
                                                        <!--BOTÃO ENVIAR DADOS-->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <input 
                                                                    type="submit" 
                                                                    class="btn btn-success btn-block btn-lg" 
                                                                    value="Enviar dados" 
                                                                    name="btn_enviar"                            
                                                                >                        
                                                        <!--BOTÃO ENVIAR DADOS-->
                                                        </div>


                                                         

                            <!--FECHA DIV 3-->
                            </div>
                        
                <!--FECHA DIV 2-->
                </div>
    </form>

<!--FECHA DIV 1 ACOMODAR ABAS-->
</div>



<?php include 'footer.php'; ?> 




<script>
$("#proximo").on("click",function(){
  if(!$("#cadastrar").valid())
 $("#cadastrar#etapaUm").click();
});


//TAMANHO É EM KBYTES LOGO PARA 2MB 2*1024 = 2048*1024 BYTES = 2097152 
 $(document).ready(function(){
        $('#cadastrar').validate({
            rules : {			
                responsavel : {
                    required : true,
                    minlength : 6
                },                 
                bairro : {
                    required : true                    
                },     
                rua : {
                    required : true                    
                },
                nome : {
                    required : true                    
                },         
                nascimento : {
                    required : true                    
                },     
                opcao1 : {
                    required : true                    
                },     
                opcao_turno : {
                    required : true                    
                }                
            },

            messages : {			
                responsavel : {
                    required : 'Por favor informe o responsável.',
                    minlength : 'Nome inválido, mínimo 6 Caracteres'
                },                
                bairro : {
                    required : 'Por favor informe o bairro'                 
                },     
                rua : {
                    required : 'Por favor informe a rua'                    
                },
                nome : {
                    required : 'Por favor informe o nome da criança'                       
                },       
                nascimento : {
                    required : 'Por favor informe o nascimento'                  
                },     
                opcao1 : {
                    required : 'Por favor informe ao menos uma opção de escola'                    
                },     
                opcao_turno : {
                    required : 'Por favor informe o turno desejado'                    
                }                            
            }
        });
});
</script> 