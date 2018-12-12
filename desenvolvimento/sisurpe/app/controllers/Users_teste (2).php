<?php
    Class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            // ele instancia lá no controller
            // fica assim $this->userModel = new User;
        }
        
        public function login(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init data
                $data =[

                    'chave' => trim($_POST['chave'])
                ];

                // Validate Email
                if(empty($data['chave'])){
                    $data['chave_err'] = 'Please enter chave';
                } 
                              
                // Check for user/email
                if($this->userModel->findUserByKey($data['chave'])){
                    // User found
                } else {
                    // User not found
                    $data['chave_err'] = 'No user found';
                }

                //Make sure errors are empty
                if(empty($data['chave_err'])){
                    //Validate
                    // Check and set logged in user
                    // vai ter como resposta a linha com os dados do usuário ou falso
                    $loggedInUser = $this->userModel->login($data['chave']);                     
                    
                    if($loggedInUser){//se não for falso o valor da variável criamos a sessão
                        //Create Session
                        $this->createUserSession($loggedInUser);                        
                    } else {
                        $data['chave_err'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }

                 } else {
                     //Load view with errors
                     $this->view('users/login', $data);
                 }

                 

            } else {
                // Init data
                $data =[                   
                    'chave' => '',
                    'chave_err' => ''                   
                ];

                //Load view
                $this->view('users/login', $data);               
            }
        }
    
        public function createUserSession($user){
            //$_SESSION['id_aluno'] = $user->id_aluno;            
           // $_SESSION['nome_aluno'] = $user->nome_aluno;  
            redirect('posts');            
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
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