<?php
  class Escolausers extends Controller {
      
    public function __construct(){                
      //isLoggedIn do arquivo session_helper.php
      if(!isLoggedIn()){
        redirect('users/login');
      }       
      $this->escolaUsersModel = $this->model('Escolauser');    
    }

      
    public function index($id){
    $escolaUsers = $this->escolaUsersModel->GetEscolasUserById($id);     

    $data = [
      'user_id' => $id,
      'escola_id' => $escolaUsers->$escola_id,
      'escola_nome' => $escolaUsers->$nome
    ];
    
    
    
    
    $this->view('escolasusers/index', $data);
    } 



    public function gravar($id){     
                
      if($_SERVER['REQUEST_METHOD'] == 'POST'){  
        
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);      
      
        $data = [              
          'user_id' => $id,
          'escola_id' => $_POST['escola_id']
        ];

        if(($data['escola_id'])=="NULL"){
          $data['escola_id_err'] = 'Por favor informe a Escola';
        } 

        if($this->escolaUsersModel->checkUserEscola($data['user_id'], $data['escola_id'])){
          $data['escola_err'] = 'Escola já adicionada';
        }

        // Make sure errors are empty
        if(                    
        empty($data['escola_err']) 
        ){

            try {
              if($this->escolaUsersModel->register($data)){                         
                flash('mensagem', 'Dados registrados com sucesso');                     
                redirect('escolausers/'.$id);
              }                 
            } catch (Exception $e) {
              die('Ops! Algo deu errado.');  
            } 
        
        } else {
          // Load the view with errors
          $this->view('escolasusers/index', $data);
        } 
      } else {
        $this->view('escolasusers/index', $data);
      }      
  }



    public function delete($id){
      
        
      //pego o id do usuário 
      $user_id = $this->escolaUsersModel->getUserIdEscolasUser($id); 
     
      try {
        if($this->escolaUsersModel->deleteEscolasUser($id)){                       
          flash('mensagem', 'Registro removido com sucesso!');                
          redirect('escolausers/'.$user_id->user_id);
        } else {
          flash('mensagem', 'Falha ao tentar remover o registro', 'alert alert-danger');
          redirect('escolausers/'.$user_id->user_id);
        }                
      } catch (Exception $e) {
        die('Ops! Algo deu errado.');  
      } 
        
    }  
    
  }//class