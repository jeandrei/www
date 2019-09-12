<?php 
    class Filas extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado Fila.php e incluir
            $this->filaModel = $this->model('Fila');
        }

        public function cadastrar(){
            //pega todos os bairros
            $bairros = $this->filaModel->getBairros();
            //pega todas as escolas
            $escolas = $this->filaModel->getEscolas();          
            
                       

            // Check for POST            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'bairros' => $bairros,
                    'escolas' => $escolas,
                    'responsavel' => html($_POST['responsavel']),
                    'cpf' => html($_POST['cpf']), 
                    'email' => html($_POST['email']), 
                    'telefone' => html($_POST['telefone']),
                    'celular' => html($_POST['celular']),
                    'bairro' => html($_POST['bairro']),
                    'rua' => html($_POST['rua']),
                    'numero' => html($_POST['numero']),
                    'complemento' => html($_POST['complemento']),
                    'nome' => html($_POST['nome']),
                    'nascimento' => trim($_POST['nascimento']),
                    'certidao' => html($_POST['certidao']),
                    'opcao1' => html($_POST['opcao1']),
                    'turno1' => html($_POST['turno1']),
                    'opcao2' => html($_POST['opcao2']),
                    'turno2' => html($_POST['turno2']),
                    'opcao3' => html($_POST['opcao3']),
                    'turno3' => html($_POST['turno3']),        
                    'obs'  => html($_POST['obs']),
                    'responsavel_err' => '',
                    'cpf_err' => '',
                    'email_err' => '',
                    'telefone_err' => '',
                    'celular_err' => '',
                    'bairro_err' => '',
                    'rua_err' => '',
                    'rua_err' => '',
                    'nome_err' => '',
                    'nascimento_err' => '',
                    'certidao_err' => '',
                    'opcao1_err' => ''
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
                if(empty($data['telefone'])){
                    $data['telefone_err'] = 'Por favor informe o telefone'; 
                }
                elseif(!validacelular($data['telefone'])){
                    $data['telefone_err'] = 'Telefone inválido';
                }else{
                    $data['telefone_err'] = '';       
                }
                
                //valida telefone 2
                if((!empty($data['celular'])) && (!validacelular($data['celular']))){
                    $data['celular_err'] = 'Telefone inválido';        
                }else{
                    $data['celular_err'] = '';
                }

                //valida nome
                if(empty($data['nome'])){
                    $data['nome_err'] = 'Por favor informe o nome da criança';
                }
                else{
                    if ($this->filaModel->nomeCadastrado($data['nome'],$data['nascimento']))
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
                elseif(!$this->filaModel->validaNascimento($data['nascimento'])){
                    $data['nascimento_err'] = 'Data inválida';       
                }else{
                    $data['nascimento_err'] = '';
                }    

                //valida etapa
                if(!empty($data['nascimento'])){
                    if($this->filaModel->getEtapa($data['nascimento'])){
                        $data['etapa_id'] = $this->filaModel->getEtapa($data['nascimento']);
                    }else
                    {
                        $data['nascimento_err'] = 'A data informada não corresponde a nenhuma etapa da fila.';
                        $data['flash_err'] = 'Ops! A data de nascimento não corresponde a nenhuma etapa da Fila Única';                    
                        //colocar essa menságem de erro NO FLASH $error
                    }
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
            
                
            
                if(empty($data['opcao1'])){
                    $data['opcao1_err'] = 'Por favor informe ao menos uma opção';
                }
                
                if(empty($data['turno1'])){
                    $data['turno1_err'] = 'Por favor informe o turno';        
                } 
                
                
                //UPLOAD DE ARQUIVOS CHAMA A FUNÇÃO upload_file que está no arquivo helper
                    $comp_res = upload_file2('comprovante_residencia',$data['responsavel'],'COMP_RESIDENCIA');  
                    
                    if(empty($comp_res['error'])){                                          
                        $data['comp_res_dados'] = $comp_res['data'];
                        $data['comp_res_nome'] =  $comp_res['nome'] . "." . $comp_res['extensao'];
                        $data['comp_res_tipo'] = $comp_res['tipo'];
                        $data['comprovante_residencia_err'] = '';                      
                    } else {
                        $data['comprovante_residencia_err'] =  $comp_res['error'];
                    }
            
                
            
                
                    $cert_nasc = upload_file2('certidaonascimento',$_POST['responsavel'],'CERT_NASCIMENTO'); 
                    if(empty($cert_nasc['error'])){                  
                        $data['cert_nasc_dados'] = $cert_nasc ['data'];
                        $data['cert_nasc_nome'] =  $cert_nasc['nome'] . "." . $cert_nasc['extensao'];
                        $data['cert_nasc_tipo'] = $cert_nasc['tipo'];
                        $data['certidaonascimento_err'] = '';                                       
                    } else {
                        $data['certidaonascimento_err'] = $cert_nasc['error'];
                    }
                
                
                
                if ((isset($comp_res['error'])) || (isset($cert_nasc['error'])))
                {                   
                    $data['flash_err'] = 'Ops! Arquivos inválidos.';
                    
                } 

                //verifica para submeter
                // Make sure no errors
                if(     
                    empty($data['responsavel_err']) && 
                    empty($data['telefone_err']) && 
                    empty($data['celular_err']) && 
                    empty($data['nome_err']) && 
                    empty($data['nascimento_err']) && 
                    empty($data['email_err']) && 
                    empty($data['cpf_err']) && 
                    empty($data['bairro_err']) && 
                    empty($data['rua_err']) && 
                    empty($data['opcao1_err']) && 
                    empty($data['turno1_err']) && 
                    empty($data['comprovante_residencia_err']) && 
                    empty($data['certidaonascimento_err'])
                   // empty($data['idade_maxima_err']) &&
                   // empty($data['comp_residencia_name_err']) &&                   
                ){
                
                $data['protocolo'] = $this->filaModel->generateProtocol();
                $this->filaModel->register($data);
                $this->view('filas/cadastrar', $data);
                

                } else {
                    $this->view('filas/cadastrar', $data);
                }// Make sure no errors

                
               
               
                
            }else{
                $data = [
                    'bairros' => $bairros,
                    'escolas' => $escolas,
                    'responsavel' => '',
                    'cpf' => '', 
                    'email' => '', 
                    'telefone' => '',
                    'celular' => '',
                    'bairro' => '',
                    'rua' => '',
                    'numero' => '',
                    'complemento' => '',
                    'nome' => '',
                    'nascimento' => '',
                    'etapa_id' => '',
                    'certidao' => '',
                    'opcao1' => '',
                    'turno1' => '',
                    'opcao2' => '',
                    'turno2' => '',
                    'opcao3' => '',
                    'turno3' => '',        
                    'obs'  => '',
                    'responsavel_err' => '',
                    'cpf_err' => '',
                    'email_err' => '',
                    'telefone_err' => '',
                    'celular_err' => '',
                    'bairro_err' => '',
                    'rua_err' => '',
                    'rua_err' => '',
                    'nome_err' => '',
                    'nascimento_err' => '',
                    'certidao_err' => '',
                    'opcao1_err' => '',
                    'comprovante_residencia_err' => '',
                    'certidaonascimento_err' => ''
                ];
                $this->view('filas/cadastrar', $data);
            }
                       
            
        }

        public function consultar(){
            echo "Consultar";
        }

        public function listachamada(){
            echo "Lista de chamada";
        }
}