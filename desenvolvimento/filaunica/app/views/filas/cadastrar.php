<?php
    // TEM QUE SER EM UM HEADER E FOOTER DIFERENTE POIS SE NÃO VAI TRAZER O NAVBAR JUNTO
    include 'header.php';
?>


<?php
//função emite erro 
if(!empty($data['flash_err'])){
flash('alert-danger',$data['flash_err'],'alert alert-danger');
echo flash('alert-danger');}
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
    
    <form id="cadastrar" action="<?php echo URLROOT; ?>/filas/cadastrar" method="post" enctype="multipart/form-data">  

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
                                                                                                            <label for="telefone1">
                                                                                                                <span class="obrigatorio">*</span>Telefone para contato:
                                                                                                            </label>
                                                                                                            <input 
                                                                                                                type="text" 
                                                                                                                name="telefone1" 
                                                                                                                id="telefone1" 
                                                                                                                maxlength="15"
                                                                                                                class="form-control telefone <?php echo (!empty($data['telefone1_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                value="<?php htmlout($data['telefone1']); ?>"
                                                                                                                >
                                                                                                                <span class="invalid-feedback">
                                                                                                                    <?php echo $data['telefone1_err']; ?>
                                                                                                                </span>
                                                                                                        </div>

                                                                                                        <!--CELULAR 2-->
                                                                                                        <div class="col-lg-6">
                                                                                                            <label for="telefone2">
                                                                                                                Celular para contato:
                                                                                                            </label>
                                                                                                            <input 
                                                                                                                type="text" 
                                                                                                                name="telefone2" 
                                                                                                                id="telefone2" 
                                                                                                                maxlength="15"
                                                                                                                class="form-control telefone <?php echo (!empty($data['telefone2_err'])) ? 'is-invalid' : ''; ?>"
                                                                                                                value="<?php htmlout($data['telefone2']); ?>"
                                                                                                            >
                                                                                                            <span class="invalid-feedback">
                                                                                                                <?php echo $data['telefone2_err']; ?>
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
                                                                                                            Você pode escolher até três escolas
                                                                                                            de preferência sendo obrigatório <strong>escolher pelo menos
                                                                                                                uma.</strong>
                                                                                                            Será chamados de acordo com a disponibilidade das escolas abaixo e sua
                                                                                                            posição na fila.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <!--INFORMATIVO DE OPÇÕES DE ESCOLHA-->
                                                                                                </div>

                                                                                                <!--ESCOLA E TURNO OPÇÃO 1-->
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <label for="opcao1" class="help-block">
                                                                                                            <span class="obrigatorio">*</span>Escola:
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

                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="turno1" class="help-block">
                                                                                                                <span class="obrigatorio">*</span>Turno
                                                                                                            </label>
                                                                                                            <select 
                                                                                                                class="form-control "
                                                                                                                id="turno1"
                                                                                                                name="turno1"
                                                                                                            >
                                                                                                            <option value="">Selecione o turno</option>
                                                                                                                <option value="1" <?php echo $data['turno1'] == '1' ? 'selected':'';?>>Matutino</option>
                                                                                                                <option value="2" <?php echo $data['turno1'] == '2' ? 'selected':'';?>>Vespertino</option>
                                                                                                                <option value="3" <?php echo $data['turno1'] == '3' ? 'selected':'';?>>Integral</option>
                                                                                                            </select>
                                                                                                            <span class="invalid-feedback">
                                                                                                                <?php echo $data['turno1_err']; ?>
                                                                                                            </span>                                      
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <!--ESCOLA E TURNO OPÇÃO 1-->
                                                                                                </div>

                                                                                                <!--ESCOLA E TURNO OPÇÃO 2-->
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <label for="opcao2" class="help-block">
                                                                                                            Escola:
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
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="turno2" class="help-block">
                                                                                                                Turno
                                                                                                            </label>
                                                                                                            <select 
                                                                                                                class="form-control"
                                                                                                                id="turno2"
                                                                                                                name="turno2"
                                                                                                            >
                                                                                                            <option value="">Selecione o turno</option>
                                                                                                                <option value="1" <?php echo $data['turno2'] == '1' ? 'selected':'';?>>Matutino</option>
                                                                                                                <option value="2" <?php echo $data['turno2'] == '2' ? 'selected':'';?>>Vespertino</option>
                                                                                                                <option value="3" <?php echo $data['turno2'] == '3' ? 'selected':'';?>>Integral</option>
                                                                                                            </select>                                                                                                                                             
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <!--ESCOLA E TURNO OPÇÃO 2-->
                                                                                                </div>

                                                                                                <!--ESCOLA E TURNO OPÇÃO 3-->
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <label for="opcao3" class="help-block">
                                                                                                            Escola:
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
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="turno3" class="help-block">
                                                                                                                Turno
                                                                                                            </label>
                                                                                                            <select 
                                                                                                                class="form-control"
                                                                                                                id="turno3"
                                                                                                                name="turno3"
                                                                                                            >
                                                                                                            <option value="">Selecione o turno</option>
                                                                                                                <option value="1" <?php echo $data['turno3'] == '1' ? 'selected':'';?>>Matutino</option>
                                                                                                                <option value="2" <?php echo $data['turno3'] == '2' ? 'selected':'';?>>Vespertino</option>
                                                                                                                <option value="3" <?php echo $data['turno3'] == '3' ? 'selected':'';?>>Integral</option>
                                                                                                            </select>                                                                                                                                                
                                                                                                        </div>
                                                                                                    </div>
                                                                                                <!--ESCOLA E TURNO OPÇÃO 3-->
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
                                                        <div class="row" style="margin:5px;"> 
                                                                
                                                                        <!--*************COMPROVANTE DE RESIDÊNCIA************-->
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <div class="alert alert-warning" role="alert">
                                                                                    Em um <strong>único</strong> arquivo deve ser enviado o comprovante de
                                                                                    residência,
                                                                                    com o formato sendo aceito apenas <strong>jpg, png e pdf</strong>, e no máximo arquivo com <strong>20 MB</strong>.
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="custom-file">
                                                                                <label for="comprovante_residencia">
                                                                                    Comprovante de residência  
                                                                                </label><br>
                                                                                <div class="form-group">
                                                                                    <div class="custom-file">
                                                                                        <input 
                                                                                        type="file" 
                                                                                        class="custom-file-input" 
                                                                                        id="comprovante_residencia"
                                                                                        name="comprovante_residencia"                                                                                        
                                                                                        onchange="return fileValidation('comprovante_residencia','res_erro');"
                                                                                        >
                                                                                        <label class="custom-file-label" for="comprovante_residencia">Selecione o arquivo</label>
                                                                                        
                                                                                    </div> 
                                                                                </div>                      
                                                                            </div>  

                                                                            <div class="form-group" style="margin-top: 40px;">
                                                                                <div class="alert-danger" role="alert">
                                                                                    <div style="margin: 20px;">
                                                                                        <strong><?php echo $data['comprovante_residencia_err'];?></strong>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                           
                                                                        <!--*************COMPROVANTE DE RESIDÊNCIA************-->
                                                                        </div>
                                                                        
                                                                        


                                                                        <!--*************CERTIDAO DE NASCIMENTO************-->
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <div class="alert alert-warning" role="alert">
                                                                                    Em um <strong>único</strong> arquivo deve ser enviado o comprovante de
                                                                                    residência,
                                                                                    com o formato sendo aceito apenas <strong>jpg, png e pdf</strong>, e no máximo arquivo com <strong>20 MB</strong>.
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="custom-file">
                                                                                <label for="certidaonascimento">
                                                                                    Certidão de Nascimento  
                                                                                </label><br>
                                                                                <div class="form-group">
                                                                                    <div class="custom-file">
                                                                                        <input 
                                                                                        type="file" 
                                                                                        class="custom-file-input" 
                                                                                        id="certidaonascimento"
                                                                                        name="certidaonascimento"
                                                                                        onchange="return fileValidation('certidaonascimento','nasc_erro');"
                                                                                        >
                                                                                        <label class="custom-file-label" for="certidaonascimento">Selecione o arquivo</label>
                                                                                    </div> 
                                                                                </div>                      
                                                                            </div>  

                                                                            <div class="form-group" style="margin-top: 40px;">
                                                                                <div class="alert-danger" role="alert">
                                                                                    <div style="margin: 20px;">
                                                                                        <strong><?php echo $data['certidaonascimento_err'];?></strong>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                           
                                                                        <!--*************CERTIDÃO DE NASCIMENTO************-->
                                                                        </div>
                                                                            
                                                        <!--FECHA DIV 6 LINHA COMPROVANTES-->
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

