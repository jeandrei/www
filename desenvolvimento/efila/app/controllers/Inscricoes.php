<?php
 class Inscricoes extends Controller {
    public function __construct(){
        if((!isLoggedIn())){
            
          redirect('users/login');
        } 
       
     $this->postModel = $this->model('Inscricao');
     $this->userModel = $this->model('User');
    }

     public function index(){       
        $registros = $this->postModel->getInscricoes($_SESSION['user_id']);
        $data = [
            'inscricoes' => $registros
        ];
        
        $this->view('inscricoes/index', $data);      

     }
/*
     public function add(){
        
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'nome' => trim($_POST['nome']),
                'endereco' => trim($_POST['endereco']),                
                'nome_err' => '',
                'endereco_err' => ''
            ];

            // Validate title
            if(empty($data['nome'])){
                $data['nome_err'] = 'Por favor informe o nome do inscricao';
            }
            if(empty($data['endereco'])){
                $data['endereco_err'] = 'Por favor informe o endereço do inscricao';
            }
            
            // Make sure no errors
            if(empty($data['nome_err']) && empty($data['endereco_err'])){
              // Validated
              if($this->postModel->addinscricao($data)){
                flash('post_message', 'Registro realizado com sucesso!');
                redirect('Inscricoes');
              } else {
                die('Ops! Algo deu errado.');
              }
            } else {
                // Load view with errors
                $this->view('Inscricoes/add', $data);
            }

         } else {
         
            $data = [
                'nome' => '',
                'endereco' => ''
        ];
        
        $this->view('Inscricoes/add', $data);        
        }
     }//add


     
     public function edit($id){ 
            
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     
           // Sanitize POST array
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           
           $data = [
            'id' => $id,
            'nome' => trim($_POST['nome']),
            'endereco' => trim($_POST['endereco']),                
            'nome_err' => '',
            'endereco_err' => ''
        ];        

           // Validate title
           if(empty($data['nome'])){
                $data['nome_err'] = 'Por favor informe o nome do inscricao atual';
            }
            if(empty($data['endereco'])){
                $data['endereco_err'] = 'Por favor informe o endereço do inscricao!';
            }

           // Make sure no errors
           if(empty($data['nome_err']) && empty($data['endereco_err'])){
             // Validated
             if($this->postModel->updateinscricao($data)){                 
               flash('post_message', 'Registro atualizado com sucesso!');
               redirect('Inscricoes');
             } else {
               die('Ops! Algo deu errado.');
             }
           } else {
               // Load view with errors
               $this->view('Inscricoes/edit', $data);
           }

        } else {
            // Get existing pst for model
            $post = $this->postModel->getinscricaoById($id);
                    
           $data = [
               'id' => $id,
               'nome' => $post->nome,
               'endereco' => $post->endereco
       ];
       
       $this->view('Inscricoes/edit', $data);        
       }
    }//edit

     public function show($id){
         $post = $this->postModel->getPostById($id);
         $user = $this->userModel->getUserById($post->user_id);

         $data = [
             'post' => $post,
             'user' => $user
         ];
         $this->view('posts/show', $data);
     }


     public function delete($id){         
         $registro = $this->postModel->getinscricaoById($id); 
         if($this->postModel->deleteinscricao($id)){
            flash('post_message', 'Registro removido com sucesso!');
            redirect('Inscricoes');
        } else {
            die('Ops! Algo deu errado!');
        }         
     }*/
 }//class