<?php 
// URL ROOT
require_once 'inc/db.inc.php';
require_once 'inc/helpers.inc.php';


function upload_file(){
    var_dump($_FILES);
    $temp_name = $_FILES['comprovante_residencia']['tmp_name'];

}

	

upload_file();



//VALIDAÇÃO
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = [
        'responsavel' => trim($_POST['responsavel']),
        'cpf' => trim($_POST['cpf']), 
        'email' => trim($_POST['email']), 
        'telefone1' => trim($_POST['telefone1']),
        'telefone2' => trim($_POST['telefone2']),
        'bairro' => trim($_POST['bairro']),
        'rua' => trim($_POST['rua']),
        'numero' => trim($_POST['numero']),
        'complemento' => trim($_POST['complemento']),
        'nome' => trim($_POST['nome']),
        'nascimento' => trim($_POST['nascimento']),
        'certidao' => trim($_POST['certidao']),
        'setor1' => trim($_POST['setor1']),
        'turno1' => trim($_POST['turno1']),
        'setor2' => trim($_POST['setor2']),
        'turno2' => trim($_POST['turno2']),
        'setor3' => trim($_POST['setor3']),
        'turno3' => trim($_POST['turno3']),
        'portador' => ($_POST['portador']),
        'obs'  => trim($_POST['obs'])        
        ];

        
        
   
        // CONEXÃO COM O BANCO

    
    //valida responsável
    if(empty($data['responsavel'])){
        $data['responsavel_err'] = 'Por favor informe o responsável';
    }else{
        $data['responsavel_err'] = '' ;
    }
    //valida telefone 1
    if(empty($data['telefone1'])){
        $data['telefone1_err'] = 'Por favor informe o telefone';
    }
    elseif(!validacelular($data['telefone1'])){
        $data['telefone1_err'] = 'Telefone inválido';   
    }else{
        $data['telefone1_err'] = '';
    }
    

    //valida telefone 2
    if((!empty($data['telefone2'])) && (!validacelular($data['telefone2']))){
        $data['telefone2_err'] = 'Telefone inválido';
    }else{
        $data['telefone2_err'] = '';
    }

    //valida nome
    if(empty($data['nome'])){
        $data['nome_err'] = 'Por favor informe o nome da criança';
    }
    else{
        $data['nome_err'] = '';
    }

    //valida nascimento
    if(empty($data['nascimento'])){        
        $data['nascimento_err'] = 'Por favor informe a data de nascimento';
    }                    
    elseif(!validanascimento($data['nascimento'])){
        $data['nascimento_err'] = 'Data inválida';
    }else{
        $data['nome_err'] = '';
    }
 
        
    

    //valida email
    if((!empty($data['email'])) && (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))){
        $data['email_err'] = 'Email inválido';
    }else{
        $data['email_err'] = '';
    }

    //valida cpf
    if((!empty($data['cpf'])) && (!validaCPF($data['cpf']))){
        $data['cpf_err'] = 'CPF inválido';    
    }else{
        $data['cpf_err'] = '';
    }

    //valida arquivos anexo
    if(!empty($data['comp_residencia_name'])){        
        $data['comp_residencia_name_err'] = 'Por favor anexe o comprovante de residência';
    }
    else{
        $data['comp_residencia_name_err'] = '';
    }                  


    //verifica para submeter
    // Make sure no errors
    if( empty($data['responsavel_err']) &&                               
    empty($data['telefone1_err']) && 
    empty($data['telefone2_err']) && 
    empty($data['nome_err']) && 
    empty($data['email_err']) && 
    empty($data['cpf_err']) &&   
    empty($data['idade_maxima_err']) 
    
    ){
        die("tudo certo");
    // Validated
    /*if($this->postModel->updateAtendimento($data)){
        flash('post_message', 'Registro atualizado com sucesso!');
        redirect('atendimentos');
    } else {
        die('Ops! Algo deu errado.');
    }
    } else {
        // Load view with errors
        $this->view('atendimentos/edit', $data);*/
    } 

    

}//post





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
   
   <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">

  <!--jquery-->
  <script src="<?php echo URLROOT; ?>/js/jquery-3.3.1.min.js"></script> 

   <!--jquery mask-->
   <script src="<?php echo URLROOT; ?>/js/jquery.mask.js" data-autoinit="true"></script>
   

  <!--Botstrap main-->
  <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>

  <!--Javascript funções-->
  <script src="<?php echo URLROOT; ?>/js/main.js"></script>

  <!--FUNÇÃO QUE SETA O FOCO AO CARREGAR O FORMULÁRIO-->
    <script>
        window.onload = function(){focofield("responsavel");}
    </script>
  


</head>
<body style="background-color:#DCDCDC">
<div class="container" style="margin-top: 90px;">
<span id="MsgModal"></span>
    
    <!--PARTE ACIMA DO BOTÃO VOLTAR-->
    <div class="row">
    
        <div class="col-lg-12">
            <blockquote style="border-left: 10px solid #0D54AA; margin: 1.5em 10px;padding: 0.5em 10px;">
                <i class="fa fa-child" aria-hidden="true"></i>
                <img style="width:30px; height:30px;margin:15px 10px 10px 0px;" src="<?php echo URLROOT; ?>/img/people-group-team.png">
                <span style="font-size:25px;">Fila Única</span>
            </blockquote>
        </div>    
    </div><!--row-->

     <!--BOTÃO VOLTAR-->
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-lg-2">
            <button class="btn btn-default btn-block" style="background-color:#FFFAF0" onclick="window.history.go(-1); return false;">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                Voltar
            </button>
        </div>
    </div>

    <div class="row" style="background-color:#FFFAF0">
    <form action="index.php" method="post">  
        <!--abas-->
        <div class="col-lg-14" id="result">
            
            <ul class="nav nav-tabs" role="tablist" id="myTabs">

                <li role="presentation" class="nav-item">
                    <a class="nav-link active" href="#identificacao" aria-controls="identificacao" role="tab" data-toggle="tab">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        1º Etapa
                    </a>
                </li>

                <li role="presentation" class="nav-item">
                    <a class="nav-link" href="#childrem" aria-controls="childrem" role="tab" data-toggle="tab">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        2º Etapa
                    </a>
                </li>

            </ul>
        <!--abas-->
        <div class="tab-content" style="padding-top: 20px;">

             <!--1ª ETAPA-->
            <div role="tabpanel" class="tab-pane active" id="identificacao">

                <div class="row">
                    
                    <!--INICIO BLOCO DA ESQUERDA-->
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
                                            class="form-control <?php echo (!empty($data['responsavel_err'])) ? 'is-invalid' : ''; ?>"
                                            value="<?php htmlout($data['responsavel']); ?>"
                                            onkeydown="upperCaseF(this)"                                            
                                            >
                                        <span class="invalid-feedback"><?php echo $data['responsavel_err']; ?></span>
                                    </div>
                                </div>
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
                                <span class="invalid-feedback"><?php echo $data['cpf_err']; ?></span>
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
                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                </div>

                            </div><!-- class="row"-->






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
                                        class="form-control telefone <?php echo (!empty($data['telefone1_err'])) ? 'is-invalid' : ''; ?>"
                                        value="<?php htmlout($data['telefone1']); ?>"
                                        >
                                <span class="invalid-feedback"><?php echo $data['telefone1_err']; ?></span>
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
                                        class="form-control telefone <?php echo (!empty($data['telefone2_err'])) ? 'is-invalid' : ''; ?>"
                                        value="<?php htmlout($data['telefone2']); ?>"
                                    >
                                    <span class="invalid-feedback"><?php echo $data['telefone2_err']; ?></span>
                                </div>

                            </div><!--<div class="row">-->





                            <!--NOVA LINHA PARA BAIRRO E RUA-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="bairro">
                                        Bairro:
                                    </label>
                                    <select 
                                        name="bairro" 
                                        id="bairro" 
                                        class="form-control"
                                        >
                                        
                                        <option value="NULL">Selecione o Bairro</option>
                                            <?php 
                                            $bairros = getBairros($pdo);
                                            foreach($bairros as $bairro) : ?> 
                                                <option value="<?php echo $bairro['id']; ?>"
                                                               <?php echo $data['bairro'] == $bairro['id'] ? 'selected':'';?>
                                                >
                                                    <?php echo $bairro['nome'];?>
                                                </option>
                                            <?php endforeach; ?>  
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="rua">
                                        Rua:
                                    </label>
                                    <input 
                                        type="text" 
                                        name="rua" 
                                        id="rua"
                                        class="form-control"
                                        value="<?php htmlout($data['rua']); ?>"
                                        onkeydown="upperCaseF(this)" 
                                        >
                                </div>                               
                            
                            </div><!--<div class="row">-->

                               
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
                                        value="<?php htmlout($data['numero']); ?>"
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
                                        value="<?php htmlout($data['complemento']); ?>"
                                        onkeydown="upperCaseF(this)" 
                                    >
                                </div>
                             <!--FIM LINHA PARA NÚMERO E COMPLEMENTO-->   
                            </div>
                                    


                        <!--FIM DO BLOCO VERDE-->
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
                                            class="form-control <?php echo (!empty($data['nome_err'])) ? 'is-invalid' : ''; ?>"
                                            value="<?php htmlout($data['nome']); ?>"
                                            onkeydown="upperCaseF(this)" 
                                            >
                                    <span class="invalid-feedback"><?php echo $data['nome_err']; ?></span>
                                    </div>
                                </div>
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
                                            class="form-control <?php echo (!empty($data['nascimento_err'])) ? 'is-invalid' : ''; ?>" 
                                            value="<?php htmlout($data['nascimento']); ?>"
                                            maxlength="10"
                                            >
                                    <span class="invalid-feedback"><?php echo $data['nascimento_err']; ?></span>
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
                                            value="<?php htmlout($data['certidao']); ?>"
                                        >
                                    </div>
                                </div>
                            </div>



                             <!--TEM DEFICIÊNCIA-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="alert alert-warning" role="alert">
                                        <div class="checkbox checkbox-primary checkbox-inline">
                                            <input id="checkbox_portador" type="checkbox" name="portador"   value="1" <?php echo (!empty($data['portador'])) ? 'checked="checked"' : ''; ?>>
                                            <label for="checkbox_portador">
                                                <strong>Criança com deficiência ?</strong>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <!--FIM BLOCO AMARELO-->
                        </blockquote>  
                    </div><!--col-lg-6 FIM BLOCO DA ESQUERDA-->

                    <!--BLOCO DA DIREITA-->
                    <div class="col-lg-6">
                        <!--BLOCO AZUL-->
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
                            </div>



                            <!--ESCOLA E TURNO OPÇÃO 1-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="setor1" class="help-block">
                                        *Escola:
                                    </label>
                                    <select 
                                        name="setor1" 
                                        id="setor1" 
                                        class="form-control <?php echo (!empty($data['setor1_err'])) ? 'is-invalid' : ''; ?>"                                        
                                    >
                                            <option value="NULL">Selecione a Escola</option>
                                            <?php 
                                            $escolas = getEscolas($pdo);
                                            foreach($escolas as $escola) : ?> 
                                                <option value="<?php echo $escola['id']; ?>"
                                                               <?php echo $data['setor1'] == $escola['id'] ? 'selected':'';?>
                                                >
                                                    <?php echo $escola['nome'];?>
                                                </option>
                                            <?php endforeach; ?>  
                                    </select>
                                    <label class="help-block">Campo obrigatório</label>
                                <span class="invalid-feedback"><?php echo $data['setor1_err']; ?></span>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="turno1" class="help-block">
                                            *Turno
                                        </label>
                                        <select 
                                            class="form-control <?php echo (!empty($data['turno1_err'])) ? 'is-invalid' : ''; ?>"
                                            id="turno1"
                                            name="turno1"
                                        >
                                            <option></option>
                                            <option value="1" <?php echo $data['turno1'] == '1' ? 'selected':'';?>>Matutino</option>
                                            <option value="2" <?php echo $data['turno1'] == '2' ? 'selected':'';?>>Vespertino</option>
                                            <option value="3" <?php echo $data['turno1'] == '3' ? 'selected':'';?>>Integral</option>
                                        </select>
                                        <span class="invalid-feedback"><?php echo $data['turno1_err']; ?></span>                                         
                                    </div>
                                </div>
                            </div>



                             <!--ESCOLA E TURNO OPÇÃO 2-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="setor2">
                                        Escola :
                                    </label>
                                    <select 
                                        name="setor2" 
                                        id="setor2" 
                                        class="form-control"
                                    >
                                            <option value="NULL">Selecione a Escola</option>
                                            <?php 
                                            $escolas = getEscolas($pdo);
                                            foreach($escolas as $escola) : ?> 
                                                <option value="<?php echo $escola['id']; ?>"
                                                               <?php echo $data['setor2'] == $escola['id'] ? 'selected':'';?>
                                                >
                                                    <?php echo $escola['nome'];?>
                                                </option>
                                            <?php endforeach; ?>  
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="turno2">
                                            Turno
                                        </label>
                                        <select 
                                            class="form-control" 
                                            id="turno2"
                                            name="turno2"
                                        >
                                            <option></option>
                                            <option value="1" <?php echo $data['turno2'] == '1' ? 'selected':'';?>>Matutino</option>
                                            <option value="2" <?php echo $data['turno2'] == '2' ? 'selected':'';?>>Vespertino</option>
                                            <option value="3" <?php echo $data['turno2'] == '3' ? 'selected':'';?>>Integral</option>                                                
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <!--ESCOLA E TURNO OPÇÃO 3-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="setor3">
                                        Escola :
                                    </label>
                                    <select 
                                        name="setor3" 
                                        id="setor3" 
                                        class="form-control"
                                    >
                                            <option value="NULL">Selecione a Escola</option>
                                            <?php 
                                            $escolas = getEscolas($pdo);
                                            foreach($escolas as $escola) : ?> 
                                                <option value="<?php echo $escola['id']; ?>"
                                                               <?php echo $data['setor3'] == $escola['id'] ? 'selected':'';?>
                                                >
                                                    <?php echo $escola['nome'];?>
                                                </option>
                                            <?php endforeach; ?>  
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="turno3">
                                            Turno
                                        </label>
                                        <select 
                                            class="form-control" 
                                            id="turno3"
                                            name="turno3"
                                        >
                                            <option></option>
                                            <option value="1" <?php echo $data['turno3'] == '1' ? 'selected':'';?>>Matutino</option>
                                            <option value="2" <?php echo $data['turno3'] == '2' ? 'selected':'';?>>Vespertino</option>
                                            <option value="3" <?php echo $data['turno3'] == '3' ? 'selected':'';?>>Integral</option>                                            
                                        </select>
                                    </div>
                                </div>
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
                                        >
                                        <?php
                                            if(!empty($_POST['obs'])){
                                                htmlout($data['obs']);
                                            }
                                        ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>




                         <!--FIM BLOCO AZUL-->
                        </blockquote>
                     <!--FIM BLOCO DA DIREITA-->
                    </div><!--<div class="col-lg-6"> fim bloco da direita-->


                </div><!--class="row"-->
                

                <!--BOTÃO PRÓXIMO-->
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btnNext btn btn-primary btn-block" style="color:white;">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            Proximo
                        </a>
                    </div>
                </div>

            <!--FIM 1ª ETAPA-->
            </div><!--role="tabpanel"-->






             <!--2ª ETAPA-->
            <div role="tabpanel" class="tab-pane" id="childrem">
                <!--LINHA COMPROVANTES-->
                <div class="row">


                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                Em um <strong>único</strong> arquivo deve ser enviado o comprovante de
                                residência,
                                com o formato sendo aceito apenas <strong>jpg, png e pdf</strong>, e no máximo arquivo com <strong>20 MB</strong>.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comprovante_residencia">
                                Comprovante de residência
                                <div style="color:red; font-size:25px;">
                                <span><?php echo $data['comp_residencia_name_err']; ?></span>
                                </div>
                                
                            </label><br>
                            <input id="comprovante_residencia" name="comprovante_residencia" type="file" class="form-control <?php echo (!empty($data['comp_residencia_name_err'])) ? 'is-invalid' : ''; ?>">
                            <label id="kv-error-2"></label>
                        </div>
                        
                    
                    </div>
                    
                                        

                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                Em um <strong>único</strong> arquivo deve ser enviado a certidão de
                                nascimento,
                                com o formato sendo aceito apenas <strong>jpg, png e pdf</strong>, e no máximo arquivo com <strong>20 MB</strong>.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="certidaonascimento">
                                Comprovante de nascimento da criança
                            </label><br>
                            <input id="certidaonascimento" name="certidaonascimento" type="file">
                        </div>
                    </div>         
                    

                 <!--FIM LINHA COMPROVANTES-->
                </div>
                
                <!--BOTÃO ENVIAR DADOS-->
                <div class="row">
                    <div class="col-lg-12">
                        <input type="submit" class="btn btn-success btn-block btn-lg" value="Enviar dados" name="btn_enviar">                        
                    </div>
                </div>


            <!--FIM 2ª ETAPA-->
            </div>





        </div><!--class="tab-content"-->
    </form>
    </div><!--<div class=row>"-->
















    </div><!--class="col-lg-12" id="result"-->
    </div><!--<div class="row">-->






</div><!--container-->


</body>
</html>
