<?php
 class Atendimentos extends Controller {
    public function __construct(){
        if((!isLoggedIn())){
            
          redirect('users/login');
        } 
        elseif(($_SESSION['user_type']) <> "admin")
        {
            die("Você deve ser um administrador para acessar esta página!");
        }    
       
     $this->postModel = $this->model('Atendimento');
     $this->userModel = $this->model('User');
    }

     public function index(){
        $registros = $this->postModel->getAtendimentos();        
            
        $data = [
            'atendimentos' => $registros,            
        ];
        
        //die(var_dump($estabelecimentos));
        $this->view('atendimentos/index', $data);      

     }

     public function add(){
        
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  
            $estabelecimentos = $this->postModel->getEstabelecimentos();         
            

            $data = [
                'descricao' => trim($_POST['descricao']),
                'estabelecimentos' => $estabelecimentos,
                'estebelecimento_id' => $_POST['estabelecimento'],
                'idade_minima' => $_POST['idade_minima'],               
                'idade_maxima' => $_POST['idade_maxima'], 
                'descricao_err' => '',
                'estebelecimento_id_err' => '',                
                'idade_maxima_err' => ''                
            ];

            // Validate title
            if(empty($data['descricao'])){
                $data['descricao_err'] = 'Por favor informe a descrição';
            }
            if(($data['estebelecimento']) == NULL){
                $data['estebelecimento_err'] = 'Por favor selecione o estabelecimento';                
            }           
            if(empty($data['idade_minima'])){
                $data['idade_minima_err'] = 'Por favor informe a idade mínima';
            }
            if(empty($data['idade_maxima'])){
                $data['idade_maxima_err'] = 'Por favor informe a idade máxima';
            }
            
            // Make sure no errors
            if( empty($data['descricao_err']) && 
                empty($data['estebelecimento_id_err']) &&                
                empty($data['idade_minima_err']) && 
                empty($data['idade_maxima_err']) 
                
                ){
              // Validated
              if($this->postModel->addAtendimento($data)){
                flash('post_message', 'Registro realizado com sucesso!');
                redirect('atendimentos');
              } else {
                die('Ops! Algo deu errado.');
              }
            } else {
                // Load view with errors
                $this->view('atendimentos/add', $data);
            }

         } else {
            //BUSCA A LISTA DE ESTABELECIMENTOS NO BANCO DE DADOS
            //MODELS ATENDIMENTO
            $estabelecimentos = $this->postModel->getEstabelecimentos();
         
            $data = [
                //PASSA A LISTA DE ESTABELECIMENTOS PARA MONTAR O LISTBOX
                'estabelecimentos' => $estabelecimentos,
                'descricao' => '',
                'estebelecimento_id' => '',                              
                'idade_minima' => '',
                'idade_maxima' => ''
        ];
        
        $this->view('atendimentos/add', $data);        
        }
     }//add


     
     public function edit($id){ 
            
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     
           // Sanitize POST array
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  
           $estabelecimentos = $this->postModel->getEstabelecimentos();        
           

           $data = [
               'descricao' => trim($_POST['descricao']),
               'estabelecimentos' => $estabelecimentos,
               'estebelecimento_id' => $_POST['estabelecimento'],
               'idade_minima' => $_POST['idade_minima'],               
               'idade_maxima' => $_POST['idade_maxima'], 
               'descricao_err' => '',
               'estebelecimento_id_err' => '',                
               'idade_maxima_err' => ''                
           ];

           // Validate title
           if(empty($data['descricao'])){
               $data['descricao_err'] = 'Por favor informe a descrição';
           }
           if(($data['estebelecimento']) == NULL){
               $data['estebelecimento_err'] = 'Por favor selecione o estabelecimento';                
           }           
           if(empty($data['idade_minima'])){
               $data['idade_minima_err'] = 'Por favor informe a idade mínima';
           }
           if(empty($data['idade_maxima'])){
               $data['idade_maxima_err'] = 'Por favor informe a idade máxima';
           }
           
           // Make sure no errors
           if( empty($data['descricao_err']) && 
               empty($data['estebelecimento_id_err']) &&                
               empty($data['idade_minima_err']) && 
               empty($data['idade_maxima_err']) 
               
               ){
             // Validated
             if($this->postModel->addAtendimento($data)){
               flash('post_message', 'Registro atualizado com sucesso!');
               redirect('atendimentos');
             } else {
               die('Ops! Algo deu errado.');
             }
           } else {
               // Load view with errors
               $this->view('atendimentos/edit', $data);
           } 
        
        } else {
            // Get existing pst for model
            $post = $this->postModel->getAtendimentoById($id);
            $estabelecimentos = $this->postModel->getEstabelecimentos();            
                    
           $data = [
               'id' => $id, 
               'descricao' => $post->descricao,
               'estabelecimentos' => $estabelecimentos,
               'estebelecimento_id' => $post->estebelecimento_id,
               'idade_minima' => $post->idade_minima,           
               'idade_maxima' => $post->idade_maxima,
               'descricao_err' => '',
               'estebelecimento_id_err' => '',                
               'idade_maxima_err' => ''                
       ];
       
       $this->view('atendimentos/edit', $data);        
       }
    }//edit

    
     public function delete($id){   
         $registro = $this->postModel->getAtendimentoById($id); 
         if($this->postModel->deleteAtendimento($id)){
            flash('post_message', 'Registro removido com sucesso!');
            redirect('atendimentos');
        } else {
            die('Ops! Algo deu errado!');
        }         
     }
 }//class