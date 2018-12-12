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

                // Valida chave
                if($this->userModel->findUserByKey($data['chave'])){                   
                    $loggedInUser = $this->userModel->findUserByKey($data['chave']);
                    if($loggedInUser){                       
                    $this->createUserSession($loggedInUser);
                    } else {
                        die('erro de login');
                    }               
                } else {
                    $data['chave_err'] = 'Chave não encontrada!'; 
                }
                          
                if(empty($data['chave'])){
                    $data['chave_err'] = 'Por favor insira sua chave de acesso!';
                }
                     
                if(!empty($data['chave_err'])){
                    $this->view('users/login', $data);
                }               

            } else {
                // Init data
                $data =[                   
                    'chave' => ''                    
                ];

                //Load view
                $this->view('users/login', $data);
               
            }
        }
    
        public function createUserSession($user){
            $_SESSION['id_aluno'] = $user->id_aluno;            
            $_SESSION['nome_aluno'] = $user->nome_aluno;  
            echo($_SESSION['nome_aluno']);           
            redirect('posts');
        }

        public function logout(){
            unset($_SESSION['id_aluno']);
            unset($_SESSION['nome_aluno']);            
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['id_aluno'])){
                return true;
            } else {
                return false;
            }
        }
    }//controller