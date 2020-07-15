<?php 
    class Cadastros extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado Fila.php e incluir
            $this->filaModel = $this->model('Cadastro');
        }

        public function index(){           
           
            
            $data = [
                'title' => 'Registros',
                'description' => 'Registros do banco de dados',
                'registros' => $this->filaModel->getRegistros()
            ];    
            
            $this->view('cadastros/index', $data);

        }

        public function new(){
           
                       
                       
            //pega todos os bairros
            $bairros = $this->filaModel->getBairros();
            //pega todas as escolas
           // $escolas = $this->filaModel->getEscolas();          
            
                       

            // Check for POST            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'bairros' => $bairros,                   
                    'responsavel' => html($_POST['responsavel']),
                    'cpf' => html($_POST['cpf']), 
                    'email' => html($_POST['email']), 
                    'telefone' => html($_POST['telefone']),
                    'celular' => html($_POST['celular']),
                    'bairro' => html($_POST['bairro']),
                    'rua' => html($_POST['rua']),
                    'numero' => html($_POST['numero']),                    
                    'nome' => html($_POST['nome']),
                    'nascimento' => trim($_POST['nascimento']),                                               
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

               
                //valida email
                if((!empty($data['email'])) && (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))){
                    $data['email_err'] = 'Email inválido';        
                }else{
                    $data['email_err'] = '';
                }

                //valida cpf 
                //se o cpf não estiver vazio e não passar pela validação da função digo que o cpf é inválido
                if(!empty($data['cpf'])){
                   if (!validaCPF($data['cpf'])){
                    $data['cpf_err'] = 'CPF inválido'; 
                   } else {
                        if($this->filaModel->getCPF($data['cpf'])){
                            $data['cpf_err'] = 'CPF já cadastrado';
                        }
                   }
                }else{ // se passar pela validação verifico se já não tem esse cpf cadastrado
                  
                    $data['cpf_err'] = '';   
                                       
                }
                
                
                if(empty($data['bairro'])){       
                    $data['bairro_err'] = 'Por favor selecione um bairro';
                }

                if(empty($data['rua'])){       
                    $data['rua_err'] = 'Por favor informe a rua';
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
                    empty($data['rua_err'])                                     
                ){
                
                $data['protocolo'] = $this->filaModel->generateProtocol();
                
               
                
                //gravo no banco de dados
                $this->filaModel->register($data);       

                $this->view('cadastros/index', $data);

                
                

                } else {
                    flash('cadastros', 'Algo deu errado', 'alert alert-danger');
                    $this->view('cadastros/new', $data);
                }// Make sure no errors

                
               
               
                
            }else{
                $data = [
                    'bairros' => $bairros,                    
                    'responsavel' => '',
                    'cpf' => '', 
                    'email' => '', 
                    'telefone' => '',
                    'celular' => '',
                    'bairro' => '',
                    'rua' => '',
                    'numero' => '',                    
                    'nome' => '',
                    'nascimento' => '', 
                    'obs'  => '',
                    'responsavel_err' => '',
                    'cpf_err' => '',
                    'email_err' => '',
                    'telefone_err' => '',
                    'celular_err' => '',
                    'bairro_err' => '',
                    'rua_err' => '',                    
                    'nome_err' => '',
                    'nascimento_err' => '',                    
                    'opcao1_err' => ''
                ];
                $this->view('cadastros/new', $data);
            }
                       
            
        }



        public function delete($id){ 
           
            //PERMITE APENAS O ADMINISTRADOR REALIZAR A EXCLUSÃO
            if($_SESSION['user_type'] != "admin"){
                flash('cadastros', 'Apenas administradores podem excluir registros', 'alert alert-danger');
                redirect('index');
            }  

           
                     
            if($this->filaModel->delEtapaByid($id)){                
                flash('cadastros', 'Registro removido com sucesso!');                
            } else {
                flash('cadastros', 'Falha ao tentar remover o registro', 'alert alert-danger');
            }               
            
            
            $this->view('cadastros/index', $data);     
            
        }

    

    }