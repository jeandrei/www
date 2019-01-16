<?php
 class Alunos extends Controller {
    public function __construct(){
        if((!isLoggedIn())){
            
          redirect('users/login');
        } 
        elseif(($_SESSION['user_type']) <> "admin")
        {
            die("Você deve ser um administrador para acessar esta página!");
        }    
       
     $this->postModel = $this->model('Aluno');
     $this->userModel = $this->model('User');
    }

     public function index(){
        $registros = $this->postModel->getAlunos();
        $data = [
            'alunos' => $registros
        ];
        
        $this->view('alunos/index', $data);      

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
                $data['nome_err'] = 'Por favor informe o nome do Aluno';
            }
            if(empty($data['endereco'])){
                $data['endereco_err'] = 'Por favor informe o endereço do Aluno';
            }
            
            // Make sure no errors
            if(empty($data['nome_err']) && empty($data['endereco_err'])){
              // Validated
              if($this->postModel->addAluno($data)){
                flash('post_message', 'Registro realizado com sucesso!');
                redirect('Alunos');
              } else {
                die('Ops! Algo deu errado.');
              }
            } else {
                // Load view with errors
                $this->view('Alunos/add', $data);
            }

         } else {
         
            $data = [
                'nome' => '',
                'endereco' => ''
        ];
        
        $this->view('Alunos/add', $data);        
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
                $data['nome_err'] = 'Por favor informe o nome do Aluno atual';
            }
            if(empty($data['endereco'])){
                $data['endereco_err'] = 'Por favor informe o endereço do Aluno!';
            }

           // Make sure no errors
           if(empty($data['nome_err']) && empty($data['endereco_err'])){
             // Validated
             if($this->postModel->updateAluno($data)){                 
               flash('post_message', 'Registro atualizado com sucesso!');
               redirect('Alunos');
             } else {
               die('Ops! Algo deu errado.');
             }
           } else {
               // Load view with errors
               $this->view('Alunos/edit', $data);
           }

        } else {
            // Get existing pst for model
            $post = $this->postModel->getAlunoById($id);
                    
           $data = [
               'id' => $id,
               'nome' => $post->nome,
               'endereco' => $post->endereco
       ];
       
       $this->view('Alunos/edit', $data);        
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
         $registro = $this->postModel->getAlunoById($id); 
         if($this->postModel->deleteAluno($id)){
            flash('post_message', 'Registro removido com sucesso!');
            redirect('Alunos');
        } else {
            die('Ops! Algo deu errado!');
        }         
     }
 }//class