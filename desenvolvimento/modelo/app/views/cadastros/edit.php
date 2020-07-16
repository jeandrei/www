<!-- HEADER DA PAGINA -->
<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
    // FUNÇÃO DO HELPERS PARA EMITIR MENSÁGENS
    echo flash('cadastro-error');
    
?> 

    <a href="<?php echo URLROOT; ?>/cadastros/index" class="btn btn-light mt-3"><i class="fa fa-backward"></i>Back</a>  

  
    <form id="cadastrar" action="<?php echo URLROOT; ?>/cadastros/edit/<?php echo $data['id'];?>" method="post" enctype="multipart/form-data">  
                                                                                    
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


        <!--LINHA NOVA PARA OS TELEFONES-->
        <div class="row">
            <!--CELULAR 1-->
            <div class="col-lg-6">
                <label for="telefone">
                    <span class="obrigatorio">*</span>Telefone para contato:
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
                    class="form-control telefone <?php echo (!empty($data['celular_err'])) ? 'is-invalid' : ''; ?>"
                    value="<?php htmlout($data['celular']); ?>"
                >
                <span class="invalid-feedback">
                    <?php echo $data['celular_err']; ?>
                </span>
            </div>
            <!--LINHA NOVA PARA OS TELEFONES-->
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


        <!--NOVA LINHA PARA NÚMERO -->                            
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
        </div>

                
        
        <!--NOME DA CRIANÇA E NASCIMENTO-->
        <div class="row">
            <div class="col-lg-8">
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

            <!--NASCIMENTO -->            
            <div class="col-lg-4">
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
        <!-- FIM NOME E NASCIMENTO -->
        </div>

        
        
        <!--TEM DEFICIÊNCIA-->
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="alert alert-warning" role="alert">
                    <div class="checkbox checkbox-primary checkbox-inline">
                        <input id="portador" type="checkbox" name="portador" value="1" <?php echo (($data['portador']) == 1) ? 'checked' : ''; ?>>
                        <label for="portador">
                            <strong>Criança com deficiência ?</strong>
                        </label>
                    </div>
                    </div>
                </div>
            </div>
        <!--TEM DEFICIÊNCIA-->
        </div>

                                            
    <!--INFORMATIVO DE OPÇÕES DE ESCOLHA-->
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info" role="alert">
                Aqui voce pode adicionar textos informativos
                fica com um visual bem bonito <strong>utilizando a tag strong.</strong>
                Tem outras cores ,alert-primary, alert-secondary, alert alert-success, alert-danger, alert-warning,
                alert-info, alert-light.                 
            </div>
        </div>
    <!--INFORMATIVO DE OPÇÕES DE ESCOLHA-->
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
                ><?php if(!empty($_POST['obs']) || !empty($data['obs'])){
                        htmlout($data['obs']);
                    }?></textarea>
            </div>
        </div>
    <!--OBSERVACAO-->
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


                                                         



<?php require APPROOT . '/views/inc/footer.php'; ?>




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
                telefone : {
                    required : true                    
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
                }     
            },

            messages : {			
                responsavel : {
                    required : 'Por favor informe o responsável.',
                    minlength : 'Nome inválido, mínimo 6 Caracteres'
                },
                telefone : {
                    required : 'Por favor informe o telefone'
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
                }                 
            }
        });
});
</script> 