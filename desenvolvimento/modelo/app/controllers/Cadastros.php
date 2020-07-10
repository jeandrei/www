<?php 
    class Cadastros extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado Fila.php e incluir
            $this->filaModel = $this->model('Cadastro');
        }

        public function index(){
           
                       
                       
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
                    'opcao2' => html($_POST['opcao2']), 
                    'opcao3' => html($_POST['opcao3']),                    
                    'opcao_turno' => html($_POST['opcao_turno']),                           
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
                    'opcao_turno_err' => ''
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
                        flash('fila-erro','Ops! A data de nascimento não corresponde a nenhuma etapa da Fila Única','alert alert-danger');                        
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
                
                if(empty($data['opcao_turno'])){
                    $data['opcao_turno_err'] = 'Por favor informe o turno desejado';        
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
                    empty($data['opcao_turno_err'])                    
                ){
                
                $data['protocolo'] = $this->filaModel->generateProtocol();
                
                if($data['unidade1'] = $this->filaModel->getEscolasById($data['opcao1']))
                {
                    $data['unidade1'] = $this->filaModel->getEscolasById($data['opcao1']);    
                } 

                if($data['unidade2'] = $this->filaModel->getEscolasById($data['opcao2']))
                {
                    $data['unidade2'] = $this->filaModel->getEscolasById($data['opcao2']);    
                } 

                if($data['unidade3'] = $this->filaModel->getEscolasById($data['opcao3']))
                {
                    $data['unidade3'] = $this->filaModel->getEscolasById($data['opcao3']);    
                } 

                
                //gravo no banco de dados para depois pegar os dados do protocolo 
                $this->filaModel->register($data);               

                //busco a posição que ficou na fila
                $data['posicao'] = $this->filaModel->buscaPosicaoFila($data['protocolo']);

                //pego o id da etapa a partir da data de nascimento
                $id_etapa = $this->filaModel->getEtapa($data['nascimento']);   
                
                //a partir do id da etapa pego a descrição
                $data['desc_etapa'] = $this->filaModel->getDescricaoEtapa($id_etapa);

                // chamo o formulário de sucesso
                $this->view('cadastros/index', $data);

                
                

                } else {
                    $this->view('cadastros/index', $data);
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
                    'opcao2' => '',                    
                    'opcao3' => '',
                    'opcao_turno' => '',        
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
                    'opcao1_err' => ''
                ];
                $this->view('cadastros/index', $data);
            }
                       
            
        }

    

    }