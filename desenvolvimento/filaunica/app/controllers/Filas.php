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
                    'telefone1' => html($_POST['telefone1']),
                    'telefone2' => html($_POST['telefone2']),
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
                    'telefone1_err' => '',
                    'telefone2_err' => '',
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
                if($this->filaModel->getEtapa($data['nascimento'])){
                    $id_etapa = $this->filaModel->getEtapa($data['nascimento']);
                }else
                {
                    $data['nascimento_err'] = 'Data de nascimento inválida';
                    $data['flash_err'] = 'Ops! A data de nascimento não corresponde a nenhuma etapa da Fila Única';                    
                    //colocar essa menságem de erro NO FLASH $error
                }
               
               
                $this->view('filas/cadastrar', $data);
            }else{
                $data = [
                    'bairros' => $bairros,
                    'escolas' => $escolas,
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
                    'telefone1_err' => '',
                    'telefone2_err' => '',
                    'bairro_err' => '',
                    'rua_err' => '',
                    'rua_err' => '',
                    'nome_err' => '',
                    'nascimento_err' => '',
                    'certidao_err' => '',
                    'opcao1_err' => ''
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