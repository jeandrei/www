<?php
    Class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            // ele instancia lá no controller
            // fica assim $this->userModel = new User;
        }

        public function register(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init data
                $data =[
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'telefone1' => trim($_POST['telefone1']),
                    'desctel1' => trim($_POST['desctel1']),
                    'telefone2' => trim($_POST['telefone2']),
                    'desctel2' => trim($_POST['desctel2']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'telefone1_err' => '',
                    'desctel1_err' => '',
                    'telefone2_err' => '',
                    'desctel2_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Por favor insira um e-mail';
                } else {
                    // Check email                    
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email já cadastrado';        
                    }
                }

                // Validate Name
                if(empty($data['name'])){
                    $data['name_err'] = 'Por favor insira seu nome';
                }

                // Validate Name
                if(empty($data['telefone1'])){
                    $data['telefone1_err'] = 'Por favor informe ao menos um telefone';
                }

                // Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Por favor insira uma senha';
                }   elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'A senha deve ter no mínimo 6 caracteres';
                }
                
                 // Validate Password
                 if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Por favor confirme sua senha';
                 }  else {
                     if($data['password'] != $data['confirm_password']){
                         $data['confirm_password_err'] = 'As senhas não são iguais, por favor digite novamente';
                     }
                 }

                 //Make sure the errors are ampty
                 if(empty($data['email_err']) && empty($data['name_err']) && empty($data['telefone1_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //Validate
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->userModel->register($data)){
                        flash('register_success', 'Agora você está registrado e pode acessar o sistema');
                        redirect('users/login');
                    } else {
                        die ('Ops! Algo deu errado.');
                    }
                 } else {
                     //Load view with errors
                     $this->view('users/register', $data);
                 }
            
            
            } else {
                // Init data
                $data =[
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Load view
                $this->view('users/register', $data);
               
            }
        }//register



        
        public function login(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init data
                $data =[
                   
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']), 
                    'email_err' => '',
                    'password_err' => ''
                    
                ];

                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                } 

                // Validate Password
                if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
                }
                
                // Check for user/email
                if($this->userModel->findUserByEmail($data['email'])){
                    // User found
                } else {
                    // User not found
                    $data['email_err'] = 'No user found';
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //Validate
                    // Check and set logged in user
                    // vai ter como resposta a linha com os dados do usuário ou falso
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                    
                    if($loggedInUser){//se não for falso o valor da variável criamos a sessão
                        //Create Session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }

                 } else {
                     //Load view with errors
                     $this->view('users/login', $data);
                 }

                 

            } else {
                // Init data
                $data =[                   
                    'email' => '',
                    'password' => '', 
                    'email_err' => '',
                    'password_err' => ''
                ];

                //Load view
                $this->view('users/login', $data);
               
            }
        }
    
        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_type'] = $user->type;
            redirect('posts');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_type']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            } else {
                return false;
            }
        }
    }//controller