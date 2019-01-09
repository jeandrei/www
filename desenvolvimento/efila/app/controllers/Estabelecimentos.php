<?php
 class Estabelecimentos extends Controller {
    public function __construct(){
        if((!isLoggedIn())){
            
          redirect('users/login');
        } 
        elseif(($_SESSION['user_type']) <> "admin")
        {
            die("Você deve ser um administrador para acessar esta página!");
        }    
       
     $this->postModel = $this->model('Estabelecimento');
     $this->userModel = $this->model('User');
    }

     public function index(){
        $registros = $this->postModel->getEstabelecimentos();
        $data = [
            'estabelecimentos' => $registros
        ];
        
        $this->view('estabelecimentos/index', $data);      

     }

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
                $data['nome_err'] = 'Por favor informe o nome do estabelecimento';
            }
            if(empty($data['endereco'])){
                $data['endereco_err'] = 'Por favor informe o endereço do estabelecimento';
            }

            // Make sure no errors
            if(empty($data['nome_err']) && empty($data['endereco_err'])){
              // Validated
              if($this->postModel->addEstabelecimento($data)){
                flash('post_message', 'Registro realizado com sucesso');
                redirect('estabelecimentos');
              } else {
                die('Ops! Algo deu errado.');
              }
            } else {
                // Load view with errors
                $this->view('estabelecimentos/add', $data);
            }

         } else {
         
            $data = [
                'nome' => '',
                'endereco' => ''
        ];
        
        $this->view('estabelecimentos/add', $data);        
        }
     }//add


     /*
     public function edit($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
         
           // Sanitize POST array
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           
           $data = [
               'id' => $id,
               'title' => trim($_POST['title']),
               'body' => trim($_POST['body']),
               'user_id' => $_SESSION['user_id'],
               'title_err' => '',
               'body_err' => ''
           ];

           // Validate title
           if(empty($data['title'])){
               $data['title_err'] = 'Please enter title';
           }
           if(empty($data['body'])){
               $data['body_err'] = 'Please enter body text';
           }

           // Make sure no errors
           if(empty($data['title_err']) && empty($data['body_err'])){
             // Validated
             if($this->postModel->updatePost($data)){
               flash('post_message', 'Post Update');
               redirect('posts');
             } else {
               die('Something went wrong');
             }
           } else {
               // Load view with errors
               $this->view('posts/edit', $data);
           }

        } else {
            // Get existing pst for model
            $post = $this->postModel->getPostById($id);

            //Check for owner
            if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
            }
        
           $data = [
               'id' => $id,
               'title' => $post->title,
               'body' => $post->body
       ];
       
       $this->view('posts/edit', $data);        
       }
    }//add

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
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Get existing pst for model
            $post = $this->postModel->getPostById($id);

            //Check for owner
            if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
            }             
            
            if($this->postModel->deletePost($id)){
                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Someting went wrong');
            }
         } else {
             redirect('posts');
         }         
     }*/
 }//class