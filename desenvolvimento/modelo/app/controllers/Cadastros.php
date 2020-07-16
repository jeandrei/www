<?php 
    class Cadastros extends Controller{
        


        
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado Fila.php e incluir
            $this->filaModel = $this->model('Cadastro');
        }

        
        
        
        public function index(){       
            $data = $this->filaModel->getRegistros();
            $this->view('cadastros/index', $data);
        }





        public function new(){  

            //pega todos os bairros
            $bairros = $this->filaModel->getBairros();
                                   

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
                    'complemento' => html($_POST['complemento']),
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
                if(!empty($data['cpf'])){
                    if(!validaCPF($data['cpf'])){
                        $data['cpf_err'] = 'CPF inválido';    
                    } 
                    if($this->filaModel->getCPF($data['cpf'])){
                        $data['cpf_err'] = 'CPF já cadastrado';       
                    }
                } else {
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
                
                         
               
                
                //gravo no banco de dados para depois pegar os dados do protocolo 
                $this->filaModel->register($data);  
                
                // chamo o formulário de sucesso
                $data = $this->filaModel->getRegistros();
                flash('mensagem', 'Registro realizado com sucesso', 'alert alert-success');
                $this->view('cadastros/index', $data);
                

                } else {
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
                    'complemento' => '',
                    'nome' => '',
                    'nascimento' => '',                    
                    'certidao' => '',                          
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
                    'nascimento_err' => ''                   
                ];
                $this->view('cadastros/new', $data);
            }
                       
            
        }



        public function delete($id){    
            //PERMITE APENAS O ADMINISTRADOR REALIZAR A EXCLUSÃO
            if($_SESSION['user_type'] != "admin"){
                flash('mensagem', 'Apenas administradores podem excluir registros', 'alert alert-danger');
                redirect('cadastros/index');                 
            }                       
            if($this->filaModel->delRegByid($id)){                
                flash('mensagem', 'Registro removido com sucesso!');                
            } else {
                flash('mensagem', 'Falha ao tentar remover o registro', 'alert alert-danger');
            }   
            $data = $this->filaModel->getRegistros();
            $this->view('cadastros/index', $data);  
        }


        public function edit($id){   
            //pega todos os bairros
            $bairros = $this->filaModel->getBairros();
            // pego os registros do banco de dados 
            $registro = $this->filaModel->getRegistroByid($id);
                                   

            // Check for POST            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [ 
                    //AQUI TEM QUE COLOCAR O ID PARA NOVO REGISTRO NÃO PRECISA MAS PARA EDITAR SIM
                    'id' => $id,                   
                    'bairros' => $bairros,                   
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
                    'obs'  => html($_POST['obs']),
                    'responsavel_err' => '',
                    'cpf_err' => '',
                    'email_err' => '',
                    'telefone_err' => '',
                    'celular_err' => '',
                    'bairro_err' => '',
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
                    // se o nome que vem do banco de dados for diferente do que foi enviado pelo post quer dizer que o nome foi alterado
                    // e este precisa ser verificado se não existe outro igual no banco de dados
                    // se for igual quer dizer que o nome não foi alterado e os outros dados podem ser atualizados
                    // se não fizer assim toda vez para poder atualizar tem que mudar o nome e isso não tem sentido                   
                    if($registro->nomecrianca <> $_POST['nome'])
                    {
                        if ($this->filaModel->nomeCadastrado($data['nome'],$data['nascimento']))
                        {
                            $data['nome_err'] = 'Já existe um cadastro com esse nome e data de nascimento!';            
                        }else{
                            $data['nome_err'] = '';   
                        }
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
                if(!empty($data['cpf'])){
                    if(!validaCPF($data['cpf'])){
                        $data['cpf_err'] = 'CPF inválido';    
                    } 
                    if($this->filaModel->getCPF($data['cpf'])){
                        $data['cpf_err'] = 'CPF já cadastrado';       
                    }
                } else {
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
                
                         
               
                
                //gravo no banco de dados para depois pegar os dados do protocolo 
                $this->filaModel->update($data);  
                
                // chamo o formulário de sucesso
                $data = $this->filaModel->getRegistros();
                flash('mensagem', 'Registro realizado com sucesso', 'alert alert-success');
                redirect('cadastros/index');
                

                } else {
                    $this->view('cadastros/edit', $data);
                }// Make sure no errors

                
               
               
                
            }else{               
                $data = [
                    //AQUI TEM QUE COLOCAR O ID PARA NOVO REGISTRO NÃO PRECISA MAS PARA EDITAR SIM
                    'id' => $id,
                    'bairros' => $bairros,                    
                    'responsavel' => $registro->responsavel,
                    'cpf' => $registro->cpfresponsavel, 
                    'email' => $registro->email, 
                    'telefone' => $registro->telefone,
                    'celular' => $registro->celular,
                    'bairro' => $registro->bairro_id,
                    'rua' => $registro->logradouro,
                    'numero' => $registro->numero,
                    'complemento' => $registro->complemento,
                    'nome' => $registro->nomecrianca,
                    'nascimento' => $registro->nascimento,                    
                    'certidao' => $registro->certidao,                          
                    'obs'  => $registro->observacao,
                    'portador'=> $registro->deficiencia,
                    'responsavel_err' => '',
                    'cpf_err' => '',
                    'email_err' => '',
                    'telefone_err' => '',
                    'celular_err' => '',
                    'bairro_err' => '',
                    'rua_err' => '',
                    'rua_err' => '',
                    'nome_err' => '',
                    'nascimento_err' => ''                   
                ];
                $this->view('cadastros/edit', $data);
            }
            
        }


    

    }