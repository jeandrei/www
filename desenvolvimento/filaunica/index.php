<?php 
// URL ROOT
require_once 'inc/db.inc.php';
require_once 'inc/helpers.inc.php';

flash('post_message');

/*$start_time = '2000-01-01';
$start_time = date_create_from_format('Y-m-d H:i:s', $start_time);
$current_date = new DateTime();
$diff = $start_time->diff($current_date);
$aa  = (string)$diff->format('%R%a');
echo gettype($aa);*/



//VALIDAÇÃO
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $data = [
        'responsavel' => html($_POST['responsavel']),
        'cpf' => html($_POST['cpf']), 
        'email' => html($_POST['email']), 
        'telefone1' => html($_POST['telefone1']),
        'telefone2' => html($_POST['telefone2']),
        'bairro' => html($_POST['bairro']),
        'rua' => html($_POST['rua']),
        'numero' => html($_POST['numero']),
        'complemento' => html($_POST['complemento']),
        'nome' => html($_POST['nome']),
        'nascimento' => trim($_POST['nascimento']),
        'certidao' => html($_POST['certidao']),
        'setor1' => html($_POST['setor1']),
        'turno1' => html($_POST['turno1']),
        'setor2' => html($_POST['setor2']),
        'turno2' => html($_POST['turno2']),
        'setor3' => html($_POST['setor3']),
        'turno3' => html($_POST['turno3']),        
        'obs'  => html($_POST['obs'])       
        ];
    //checkbox não manda valor no post se não for marcado
    //por isso tem que verificar se foi marcado
    //caso contrário o php vai acusar o erro
    //undefined index
    
    if(isset($_POST['portador'])){
        $data['portador'] = $_POST['portador'];
    }    
   
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
        if (verificaexistecrianca($pdo,$data['nome'],$data['nascimento']))
        {
            $data['nome_err'] = 'Já existe um cadastro com esse nome e data de nascimento!';            
        }else{
            $data['nome_err'] = '';   
        }
    }

    //valida nascimento
    if(empty($data['nascimento'])){        
        $data['nascimento_err'] = 'Por favor informe a data de nascimento';       
    }                    
    elseif(!validanascimento($data['nascimento'])){
        $data['nascimento_err'] = 'Data inválida';       
    }else{
        $data['nascimento_err'] = '';
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
    
    
    if(empty($data['bairro'])){       
        $data['bairro_err'] = 'Por favor selecione um bairro';
    }

    if(empty($data['rua'])){       
        $data['rua_err'] = 'Por favor informe a rua';
    }
   
    
   
    if(empty($data['setor1'])){
        $data['setor1_err'] = 'Por favor informe ao menos uma opção';
    }
    
    if(empty($data['turno1'])){
        $data['turno1_err'] = 'Por favor informe o turno';        
    }

    
   

    
    //valida arquivos deanexo   
    $comp_res = upload_file('comprovante_residencia',$_POST['responsavel'],'COMP_RESIDENCIA'); 
    $nome_comp_res =  $comp_res['nome'] . "." . $comp_res['extensao'];
    $cert_nasc = upload_file('certidaonascimento',$_POST['responsavel'],'CERT_NASCIMENTO');
    $nome_comp_nasc =  $cert_nasc['nome'] . "." . $cert_nasc['extensao'];
    
    if ((isset($comp_res['error'])) || (isset($cert_nasc['error'])))
    {
        $data['comp_residencia_name_err'] = ($comp_res['error']);
        $data['certidaonascimento_err'] = ($cert_nasc['error']);    
        
    } 

   
    //verifica para submeter
    // Make sure no errors
    if(     
        empty($data['responsavel_err']) &&                               
        empty($data['telefone1_err']) && 
        empty($data['telefone2_err']) && 
        empty($data['nome_err']) && 
        empty($data['email_err']) && 
        empty($data['cpf_err']) &&   
        empty($data['nascimento_err']) &&
        empty($data['idade_maxima_err']) &&
        empty($data['comp_residencia_name_err']) &&
        empty($data['bairro_err']) &&
        empty($data['rua_err']) &&
        empty($data['setor1_err']) &&
        empty($data['turno1_err']) &&
        empty($data['certidaonascimento_err'])    
    ){
        try 
        {
            //vai montar o progocolo pegando o último id do banco mais o ano exemplo 42019
            $sql = $pdo->prepare("SELECT max(id) FROM fila");
            $sql->execute();
            $result = $sql->fetch();
            $lastid = $result[0]; 
            $lastid = $lastid +1;
            $year = date('Y');           
            $protocolo = $lastid . $year; 

            $dias = dias($data['nascimento']);
            //if($)
            
            
            
            
           

            $sql = 'INSERT INTO fila SET
                    registro = CURDATE(),
                    responsavel = :responsavel,  
                    email = :email, 
                    celular1 = :celular1, 
                    celular2 = :celular2, 
                    bairro_id = :bairro_id, 
                    logradouro = :logradouro,
                    numero = :numero, 
                    complemento = :complemento, 
                    nomecrianca = :nomecrianca,
                    nascimento = :nascimento, 
                    certidaonascimento = :certidaonascimento,
                    opcao1_id = :opcao1_id,
                    opcao2_id = :opcao2_id,
                    opcao3_id = :opcao3_id,
                    turno1 = :turno1,
                    turno2 = :turno2,
                    turno3 = :turno3,
                    comprovanteres = :comprovanteres,
                    comprovante_res_nome = :comprovante_res_nome,
                    comprovantenasc = :comprovantenasc,
                    comprovante_nasc_nome = :comprovante_nasc_nome,
                    cpfresponsavel = :cpfresponsavel,
                    protocolo = :protocolo,
                    deficiencia = :deficiencia,
                    observacao = :observacao
                    ';   
                    
            $s = $pdo->prepare($sql);
            $s->bindValue(':responsavel', $data['responsavel']);
            $s->bindValue(':email', $data['email']);
            $s->bindValue(':celular1', $data['telefone1']);
            $s->bindValue(':celular2', $data['telefone2']);
            $s->bindValue(':bairro_id', $data['bairro']);
            $s->bindValue(':logradouro', $data['rua']);
            

            if(empty($data['numero'])){
                $s->bindValue(':numero', 0);
            }

            
            $s->bindValue(':complemento', $data['complemento']);
            $s->bindValue(':nomecrianca', $data['nome']);
            $s->bindValue(':nascimento', $data['nascimento']);
            $s->bindValue(':certidaonascimento', $data['certidao']);
            $s->bindValue(':opcao1_id', $data['setor1']);
            $s->bindValue(':opcao2_id', $data['setor2']);
            $s->bindValue(':opcao3_id', $data['setor3']);
            $s->bindValue(':turno1', $data['turno1']);
            $s->bindValue(':turno2', $data['turno2']);
            $s->bindValue(':turno3', $data['turno3']);
            $s->bindValue(':comprovanteres', $comp_res);
            $s->bindValue(':comprovante_res_nome', $nome_comp_res); 
            $s->bindValue(':comprovantenasc', $cert_nasc);
            $s->bindValue(':comprovante_nasc_nome', $nome_comp_nasc);
            $s->bindValue(':cpfresponsavel', $data['cpf']);
            $s->bindValue(':protocolo', $protocolo);
            if($data['portador'] == '1')
            {
                $s->bindValue(':deficiencia', '1');
            }else{
                $s->bindValue(':deficiencia', '0');
            }
            $s->bindValue(':observacao', $data['obs']);
         
           
            $s->execute() or die(print_r($s->errorInfo(), true));            
            
            include 'sucesso.html.php';
            exit();

            //$s->execute();		
        } catch (Exception $e) {          
            
            echo $e->getMessage();
            $error = 'Erro ao tentar gravar no banco de dados.';
            include 'error.html.php';
            exit();
        }
    include 'form.html.php';
    }
    else
    {
        include 'form.html.php';   
    } 
}//post
else{
    $data = [
        'responsavel' => '',
        'cpf' => '',
        'email' => '',
        'telefone1' => '',
        'telefone2' => '',
        'bairro' => '',
        'rua' => '',
        'numero' => '',
        'complemento' => '',
        'nome' => '',
        'nascimento' => '', 
        'certidao' => '',
        'setor1' => '',
        'turno1' => '',
        'setor2' => '',
        'turno2' => '',
        'setor3' => '',
        'turno3' => '',
        'portador' => '',
        'obs'  => ''         
        ];
    //die(var_dump($data));
    include 'form.html.php';
}//post


