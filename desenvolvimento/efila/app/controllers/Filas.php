<?php
 class Filas extends Controller {
    public function __construct(){
        if((!isLoggedIn())){
            
          redirect('users/login');
        } 
        elseif(($_SESSION['user_type']) <> "admin")
        {
            die("Você deve ser um administrador para acessar esta página!");
        }    
       
     $this->postModel = $this->model('Fila');
     $this->userModel = $this->model('User');
    }

     public function index(){
        $registros = $this->postModel->getFilas();        
            
        $data = [
            'filas' => $registros,            
        ];        
       
        $this->view('filas/index', $data);      

     }
    
     public function add(){
        
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $atendimentos = $this->postModel->getAtendimentos();
            

            $data = [     
                'id' => $_POST['id'],            
                'atendimentos' => $atendimentos,                
                'atendimento_id' => $_POST['atendimento_id'],
                'dataini' => $_POST['dataini'],               
                'datafim' => $_POST['datafim'], 
                'descricao_err' => '',                                
                'atendimento_id_err' => '',
                'dataini_err' => '',
                'datafim_err' => ''                
            ];
            
            // Validate title  
            if(($data['atendimento_id']) == 'NULL'){
                $data['atendimento_id_err'] = 'Por favor selecione o atendimento';                
            } 
            if(empty($data['dataini'])){
                $data['dataini_err'] = 'Por favor informe a data de início';
            }
            if(empty($data['datafim'])){
                $data['datafim_err'] = 'Por favor informe a data de encerramento';
            }
            
            // Make sure no errors
            if( empty($data['atendimento_id_err']) &&                
                empty($data['dataini_err']) && 
                empty($data['datafim_err']) 
                
                ){
              // Validated
              if($this->postModel->addFila($data)){
                flash('post_message', 'Registro realizado com sucesso!');
                redirect('filas');
              } else {
                die('Ops! Algo deu errado.');
              }
            } else {
                // Load view with errors
                $this->view('filas/add', $data);
            }

         } else {
             //busca lista de atendimentos                    
            $atendimentos = $this->postModel->getAtendimentos();
         
            $data = [   
                'id' => $_POST['id'],                    
                'atendimentos' => $atendimentos,                
                'atendimento_id' => $_POST['atendimento_id'],
                'dataini' => '',               
                'datafim' => '', 
                'descricao_err' => '',                                
                'atendimento_id_err' => '',
                'dataini_err' => '',
                'datafim_err' => ''      
        ];
        
        $this->view('filas/add', $data);        
        }
     }//add
    
     public function edit($id){ 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $atendimentos = $this->postModel->getAtendimentos();
            

            $data = [ 
                'id' => $_POST['id'],               
                'atendimentos' => $atendimentos,                
                'atendimento_id' => $_POST['atendimento_id'],
                'dataini' => $_POST['dataini'],               
                'datafim' => $_POST['datafim'], 
                'descricao_err' => '',                                
                'atendimento_id_err' => '',
                'dataini_err' => '',
                'datafim_err' => ''                
            ];
            
            // Validate title  
            if(($data['atendimento_id']) == 'NULL'){
                $data['atendimento_id_err'] = 'Por favor selecione o atendimento';                
            } 
            if(empty($data['dataini'])){
                $data['dataini_err'] = 'Por favor informe a data de início';
            }
            if(empty($data['datafim'])){
                $data['datafim_err'] = 'Por favor informe a data de encerramento';
            }
            
            // Make sure no errors
            if( empty($data['atendimento_id_err']) &&                
                empty($data['dataini_err']) && 
                empty($data['datafim_err']) 
                
                ){
              // Validated
              if($this->postModel->updateFila($data)){
                flash('post_message', 'Registro realizado com sucesso!');
                redirect('filas');
              } else {
                die('Ops! Algo deu errado.');
              }
            } else {
                // Load view with errors
                $this->view('filas/edit', $data);
            }

         } else {
             //busca lista de atendimentos  
            $post = $this->postModel->getFilaById($id);                  
            $atendimentos = $this->postModel->getAtendimentos();
           
            $data = [ 
                'id' => $post->id,                      
                'atendimentos' => $atendimentos,                
                'atendimento_id' => $post->atendimento_id,
                'dataini' => $post->dataini,               
                'datafim' => $post->datafim                     
        ];
        
        $this->view('filas/edit', $data);        
        }
     }//edit

    /*
     public function delete($id){   
         $registro = $this->postModel->getFilaById($id); 
         if($this->postModel->deleteFila($id)){
            flash('post_message', 'Registro removido com sucesso!');
            redirect('Filas');
        } else {
            die('Ops! Algo deu errado!');
        }         
     }*/
 }//class