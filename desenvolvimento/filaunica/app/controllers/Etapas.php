<?php
    class Etapas extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado User.php e incluir
            $this->etapaModel = $this->model('Etapa');
        }

        public function index() {   
            if($data = $this->etapaModel->getEtapas()){                
                $this->view('etapas/index', $data);
            } else {                
                flash('register_success', 'Falha ao carregar a lista de etapas!', 'alert alert-danger'); 
                $this->view('etapas/index', $data=0);
            }   
        }

        public function new(){      
           
            // Check for POST            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
               
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);    


                //init data
                $data = [
                    'data_ini' => trim($_POST['data_ini']),
                    'data_fin' => trim($_POST['data_fin']),
                    'descricao' => trim($_POST['descricao']),                    
                    'data_ini_err' => '',
                    'data_fin_err' => '',
                    'descricao_err' => ''
                ];                

                

                // Valida data Inicial
                if(empty($data['data_ini'])){
                    $data['data_ini_err'] = 'Por favor informe a data inicial';
                } 

                // Valida data Inicial
                if(empty($data['data_fin'])){
                    $data['data_fin_err'] = 'Por favor informe a data final';
                } 

                // Valida descrição
                if(empty($data['descricao'])){
                    $data['descricao_err'] = 'Por favor informe a descrição da etapa';
                } 
               
                if($this->etapaModel->etapaDataIni($data['data_ini'],$data['data_fin'])){
                    $data['erro'] = 'Existem etapas cadastradas que conflitam com este período';                    
                }
                 
                if($this->etapaModel->etapaDataFin($data['data_ini'],$data['data_fin'])){
                    $data['erro'] = 'Existem etapas cadastradas que conflitam com este período';                    
                }

                // Make sure errors are empty
                if(                    
                    empty($data['data_ini_err']) &&
                    empty($data['data_fin_err']) && 
                    empty($data['descricao_err']) &&
                    empty($data['erro']) 
                    ){
                      //Validated
                     

                      // Register User
                      if($this->etapaModel->register($data)){
                        // Cria a menságem antes de chamar o view va para 
                        // views/users/login a segunda parte da menságem
                        flash('register_success', 'Etapa registrada com sucesso!');                        
                        redirect('etapas/index');
                      } else {
                          die('Ops! Algo deu errado.');
                      }
                      

                      
                    } else {
                      // Load the view with errors
                      if(!empty($data['erro'])){
                      flash('register_success', $data['erro'], 'alert alert-danger');
                      }
                      $this->view('etapas/newetapa', $data);
                    }               

            
            } else {
                // Init data
                $data = [
                    'data_ini' => '',
                    'data_fin' => '',
                    'descricao' => '',
                    'data_ini_err' => '',
                    'data_fin_err' => '',
                    'erro' => '',
                    'descricao_err' => ''                    
                ];
                // Load view
                $this->view('etapas/newetapa', $data);
            } 
        }

       /*
        public function edit($id){ 
            // Check for POST            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){                
               
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                if (isset($_POST['type']) && ($_POST['type'] == 1)){
                    $type = 'admin';
                } else {
                    $type = 'user';
                }
                
                //init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'type' => $type,
                    'name_err' => '',                    
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];                

               
                // Validate Name
                if(empty($data['name'])){
                    $data['name_err'] = 'Por favor informe seu nome';
                }

                 // Validate Password
                 if(empty($data['password'])){
                    $data['password_err'] = 'Por favor informe a senha';
                } elseif (strlen($data['password']) < 6){
                    $data['password_err'] = 'Senha deve ter no mínimo 6 caracteres';
                }

                // Validate Confirm Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Por favor confirme a senha';
                } else {
                    if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Senha e confirmação de senha diferentes';    
                    }
                }

                // Make sure errors are empty
                if(   
                    empty($data['name_err']) && 
                    empty($data['password_err']) &&
                    empty($data['confirm_password_err']) 
                    ){
                      //Validated
                      
                      // Hash Password criptografa o password
                      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                      // Register User
                      if($this->userModel->update($data)){
                        // Cria a menságem antes de chamar o view va para 
                        // views/users/login a segunda parte da menságem                        
                        flash('register_success', 'Usuário atualizado com sucesso!');                                                                   ;
                        redirect('users/userlist');
                      } else {
                          die('Ops! Algo deu errado.');
                      }    
                      
                    } else {
                      // Load the view with errors
                      $this->view('users/userlist', $data);
                    }              
                          
            } else {
                // get exiting user from the model
                $user = $this->userModel->getUserByid($id);

                if($_SESSION['user_type'] != "admin"){
                    redirect('userlist');
                }
               

                $data = [
                    'id' => $id,
                    'name' => $user->name,
                    'email' => $user->email,                                      
                    'type' => $user->type                  
                ];
                // Load view
                $this->view('users/edituser', $data);
            } 
        }

*/
        public function delete($id){ 
                        
            if($this->etapaModel->etapaRegFila($id)){
                $erro = 'Existem registros na fila vinculados a esta etapa!';                   
            }
            
           
           
           
            if(empty($erro)){
                $this->etapaModel->delEtapaByid($id); 
                flash('register_success', 'Etapa removida com sucesso!');                
            } else {
                flash('register_success', $erro, 'alert alert-danger');
            }    
            
            
            $data = $this->etapaModel->getEtapas();
            $this->view('etapas/index', $data);     
            
        }
            
/*
        public function login(){          
            // Check for POST            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //init data
                $data = [                    
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),  
                    'email_err' => '',
                    'password_err' => ''
                    
                ];      

                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Por favor informe seu email';
                } else {
                    // Check for user/email
                    if($this->userModel->findUserByEmail($data['email'])){
                        // User found
                    } else {
                    $data['email_err'] = 'Usuário não encontrado';
                    }
                }
               

                 // Validate Password
                 if(empty($data['password'])){
                    $data['password_err'] = 'Por favor informe sua senha';
                } 

                
                               
                // Make sure errors are empty
                if(                    
                    empty($data['email_err']) &&                     
                    empty($data['password_err'])                     
                    ){
                      //Validate
                      // 1 Check and set loged in user
                      // 2 models/User login();
                      $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                      
                      if($loggedInUser){
                        // Create Session 
                        // função no final desse arquivo
                        $this->createUserSession($loggedInUser);
                      } else {
                          $data['password_err'] = 'Senha incorreta';

                          $this->view('users/login', $data);
                      }
                    } else {
                      // Load the view with errors
                      $this->view('users/login', $data);
                    }               

            
            } else {
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                // Load view
                $this->view('users/login', $data);
            }
    }

    public function createUserSession($user){
        // $user->id vem do model na função login() retorna a row com todos os campos
        // da consulta na tabela users
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_type'] = $user->type;
        redirect('admins/index');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);
        session_destroy();
        redirect('pages/login'); 
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }*/
}   
?>