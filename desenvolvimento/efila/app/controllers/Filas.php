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
        
        //die(var_dump($estabelecimentos));
        $this->view('filas/index', $data);      

     }

     public function add(){
        
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  
            $estabelecimentos = $this->postModel->getEstabelecimentos(); 
            $atendimentos = $this->postModel->getAtendimentos();
            

            $data = [
                'estabelecimentos' => $estabelecimentos,
                'atendimentos' => $atendimentos,
                'estabelecimento_id' => $_POST['estabelecimento'],
                'atendimento_id' => $_POST['atendimento'],
                'dataini' => $_POST['dataini'],               
                'datafim' => $_POST['datafim'], 
                'descricao_err' => '',
                'estabelecimento_id_err' => '',                
                'atendimento_id_err' => '',
                'dataini_err' => '',
                'datafim_err' => ''                
            ];

            // Validate title
            if(($data['estabelecimento']) == NULL){
                $data['estabelecimento_id_err'] = 'Por favor selecione o estabelecimento';
            }
            if(($data['atendimento']) == NULL){
                $data['atendimento_id_err'] = 'Por favor selecione o atendimento';                
            }           
            if(empty($data['dataini'])){
                $data['dataini_err'] = 'Por favor informe a data de início';
            }
            if(empty($data['datafim'])){
                $data['datafim_err'] = 'Por favor informe a data de encerramento';
            }
            
            // Make sure no errors
            if( empty($data['estabelecimento_id_err']) && 
                empty($data['atendimento_id_err']) &&                
                empty($data['dataini_err']) && 
                empty($data['datafim_err']) 
                
                ){
              // Validated
              if($this->postModel->addFila($data)){
                flash('post_message', 'Registro realizado com sucesso!');
                redirect('Filas');
              } else {
                die('Ops! Algo deu errado.');
              }
            } else {
                // Load view with errors
                $this->view('Filas/add', $data);
            }

         } else {
            //BUSCA A LISTA DE ESTABELECIMENTOS NO BANCO DE DADOS
            //MODELS Fila
            $estabelecimentos = $this->postModel->getEstabelecimentos();
            $atendimentos = $this->postModel->getAtendimentos();
         
            $data = [
                //PASSA A LISTA DE ESTABELECIMENTOS PARA MONTAR O LISTBOX
                'estabelecimentos' => $estabelecimentos,
                'atendimentos' => $atendimentos,
                'estabelecimento_id' => '',
                'atendimento_id' => '',
                'dataini' => '',               
                'datafim' => '', 
                'descricao_err' => '',
                'estabelecimento_id_err' => '',                
                'atendimento_id_err' => '',
                'dataini_err' => '',
                'datafim_err' => ''      
        ];
        
        $this->view('filas/add', $data);        
        }
     }//add


     /*
     public function edit($id){ 
            
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     
           // Sanitize POST array
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  
           $estabelecimentos = $this->postModel->getEstabelecimentos();        
           

           $data = [
               'descricao' => trim($_POST['descricao']),
               'estabelecimentos' => $estabelecimentos,
               'estabelecimento_id' => $_POST['estabelecimento'],
               'idade_minima' => $_POST['idade_minima'],               
               'idade_maxima' => $_POST['idade_maxima'], 
               'descricao_err' => '',
               'estabelecimento_id_err' => '',                
               'idade_maxima_err' => ''                
           ];

           // Validate title
           if(empty($data['descricao'])){
               $data['descricao_err'] = 'Por favor informe a descrição';
           }
           if(($data['estabelecimento']) == NULL){
               $data['estabelecimento_err'] = 'Por favor selecione o estabelecimento';                
           }           
           if(empty($data['idade_minima'])){
               $data['idade_minima_err'] = 'Por favor informe a idade mínima';
           }
           if(empty($data['idade_maxima'])){
               $data['idade_maxima_err'] = 'Por favor informe a idade máxima';
           }
           
           // Make sure no errors
           if( empty($data['descricao_err']) && 
               empty($data['estabelecimento_id_err']) &&                
               empty($data['idade_minima_err']) && 
               empty($data['idade_maxima_err']) 
               
               ){
             // Validated
             if($this->postModel->addFila($data)){
               flash('post_message', 'Registro atualizado com sucesso!');
               redirect('Filas');
             } else {
               die('Ops! Algo deu errado.');
             }
           } else {
               // Load view with errors
               $this->view('Filas/edit', $data);
           } 
        
        } else {
            // Get existing pst for model
            $post = $this->postModel->getFilaById($id);
            $estabelecimentos = $this->postModel->getEstabelecimentos();            
                    
           $data = [
               'id' => $id, 
               'descricao' => $post->descricao,
               'estabelecimentos' => $estabelecimentos,
               'estabelecimento_id' => $post->estabelecimento_id,
               'idade_minima' => $post->idade_minima,           
               'idade_maxima' => $post->idade_maxima,
               'descricao_err' => '',
               'estabelecimento_id_err' => '',                
               'idade_maxima_err' => ''                
       ];
       
       $this->view('Filas/edit', $data);        
       }
    }//edit

    
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