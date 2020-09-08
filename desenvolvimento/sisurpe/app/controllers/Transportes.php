<?php
 class Transportes extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->transporteModel = $this->model('Transporte');    
    }

    
     public function index($id){

      $data = [
        'aluno_id' => $id
      ];
            
      $this->view('transportes/index', $data);

     } 



     public function gravar($id){
      // Check for POST            
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //init data
        $data = [              
          'aluno_id' => $id,
          'linha' => $_POST['linha']
        ];

        if(($data['linha'])=="NULL"){
          $data['linha_err'] = 'Por favor informe a linha';
      } 

       // Make sure errors are empty
       if(                    
        empty($data['linha_err']) 
        ){
            if($this->transporteModel->register($data)){              
              // Cria a menságem antes de chamar o view va para 
              // views/users/login a segunda parte da menságem
              flash('mensagem', 'Dados registrados com sucesso');                     
              redirect('transportes/index/'.$id);
            } else {
                die('Ops! Algo deu errado.');
            }
          } else {
            // Load the view with errors
            $this->view('transportes/index', $data);
          }
     

      } else {
        $this->view('transportes/index', $data);
      }
          
    }



      public function delete($id){
         
          //pego o id do usuário que registrou esse aluno
          $user = $this->transporteModel->getUserAlunoLinha($id);
          // se for o mesmo id do usuário logado eu permito a exclusão caso contrário bloqueio
          if($user->user_id != $_SESSION['user_id']){
         
            die("Você não tem permissão para excluir este aluno");
          }
        
          if($this->transporteModel->deleteAlunoLinhas($id)){                
            flash('mensagem', 'Registro removido com sucesso!');
            redirect('transportes/index/'. $_SESSION['user_id']);          
        } else {
            flash('mensagem', 'Falha ao tentar remover o registro', 'alert alert-danger');
        }
      }

     


    }//class