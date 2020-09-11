<?php
 class Anuals extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->anualModel = $this->model('Anual');
    // $this->userModel = $this->model('User');
    }

    
     public function index($id){ 
       //Pego o nome e a data de nascimento do aluno para mostrar no formulário 
       $aluno = $this->anualModel->getAlunoById($id);  
       $dados = $this->anualModel->getDadosAnuaisById($id);   
        
        // NÃO TEM CADASTRO PROCEDEMOS O NOVO CADASTRO
        // Check for POST OU SEJA SE O USUÁRIO JÁ CLICOU EM SALVAR           
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form

          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);         
          //init data
          $data = [  
            'nome_aluno' => $aluno->nome_aluno,
            'nascimento' => date('Y-d-m', strtotime($aluno->nascimento)),            
            'aluno_id' => $id,
            'escola_id' => $_POST['escola_id'],
            'usa_transporte' => trim($_POST['usa_transporte']),
            'linha' => trim($_POST['linha']),
            'tam_moletom' => trim($_POST['tam_moletom']),
            'tam_camiseta' => trim($_POST['tam_camiseta']),
            'tam_calca' => trim($_POST['tam_calca']),
            'tam_bermuda' => trim($_POST['tam_bermuda']),
            'tam_calcado' => trim($_POST['tam_calcado']),
            'tam_meia' => trim($_POST['tam_meia']),
            'escola' => trim($_POST['escola']),
            'etapa_id' => trim($_POST['etapa_id']),
            'turno' => trim($_POST['turno'])
          ];

          if(($data['tam_moletom'])=="NULL"){
            $data['tam_moletom_err'] = 'Informe o tamanho do moletom';
          }
          
          if(($data['tam_camiseta'])=="NULL"){
            $data['tam_camiseta_err'] = 'Informe o tamanho da camiseta';
          } 

          if(($data['tam_calca'])=="NULL"){
            $data['tam_calca_err'] = 'Informe o tamanho da calça';
          } 

          if(($data['tam_bermuda'])=="NULL"){
            $data['tam_bermuda_err'] = 'Informe o tamanho da bermuda';
          } 

          if(($data['tam_calcado'])=="NULL"){
            $data['tam_calcado_err'] = 'Informe o tamanho do calçado';
          } 

          if(($data['tam_meia'])=="NULL"){
            $data['tam_meia_err'] = 'Informe o tamanho da meia';
          } 

          if(($data['escola_id'])=="NULL"){
            $data['escola_id_err'] = 'Informe a escola';
          } 

          if(($data['etapa_id'])=="NULL"){
            $data['etapa_id_err'] = 'Informe a etapa';
          } 

          if(($data['turno'])=="NULL"){
            $data['turno_err'] = 'Informe o turno';
          }           

          if(($data['usa_transporte'])=="NULL"){
            $data['usa_transporte_err'] = 'Informe se o aluno utiliza o transporte';
          } else {
            if((($data['usa_transporte'])=="Sim") && (($data['linha'])=="NULL")){
              $data['linha_err'] = 'Informe a linha';
            } 
          }



          // Make sure errors are empty
          if(                    
            empty($data['tam_moletom_err']) &&
            empty($data['tam_camiseta_err']) && 
            empty($data['tam_calca_err']) &&
            empty($data['tam_bermuda_err']) &&
            empty($data['tam_calcado_err']) &&
            empty($data['tam_meia_err']) &&
            empty($data['escola_id_err']) &&
            empty($data['etapa_id_err']) &&
            empty($data['turno_err']) &&
            empty($data['usa_transporte_err']) &&
            empty($data['linha_err'])
            ){
                // SE TEM O ID DO ALUNO É QUE ESTÁ SENDO EDITADO CASO CONTRÁRIO ESTÁ SENDO INSERIDO
                if(isset($dados->aluno_id)){
                  
                      // EDIT   
                      try {
                        if($this->anualModel->update($data)){ 
                            flash('mensagem', 'Dados atualizados com sucesso');                        
                            redirect('datausers/show');
                          }
                      } catch (Exception $e) {
                        die('Ops! Algo deu errado.');  
                      }   
               
                  } else {
                  
                      // INSERT  
                      try {
                        if($this->anualModel->register($data)){                          
                          flash('mensagem', 'Dados registrados com sucesso');                        
                          redirect('datausers/show');
                        }                 
                      } catch (Exception $e) {
                        die('Ops! Algo deu errado.');  
                      }  
                                        
                }   
            // SE HOUVE ALGUM ERRO DE VALIDAÇÃO 
            } else {
              // Load the view with errors
              $this->view('anuals/index', $data);
            }             



        } else {
          // SE O USUÁRIO AINDA NÃO CLICOU EM SALVAR
          $data = [   
            'nome_aluno' => $aluno->nome_aluno, 
            'nascimento' => date('Y-d-m', strtotime($aluno->nascimento)),       
            'aluno_id' => $id,
            'escola_id' => '',
            'usa_transporte' => '',
            'linha' => '',
            'tam_moletom' => '',
            'tam_camiseta' => '',
            'tam_calca' => '',
            'tam_bermuda' => '',
            'tam_calcado' => '',
            'tam_meia' => '',
            'escola' => '',
            'etapa_id' => '',
            'turno' => ''
          ];
        }

      
        // JÁ TEM CADASTRO, JOGO OS VALORES NO ARRAY DATA OS VALORES VEM LÁ DE CIMA DA LINHA
        // $dados = $this->anualModel->getDadosAnuaisById($id);  
        
        
         $data = [  
            'nome_aluno' => $aluno->nome_aluno,
            'nascimento' => date('Y-d-m', strtotime($dados->nascimento)),            
            'aluno_id' => $id,
            'escola_id' => $dados->escola_id,
            'usa_transporte' => $dados->usa_transporte,
            'linha' => $dados->linha,
            'tam_moletom' => $dados->tam_moletom,
            'tam_camiseta' => $dados->tam_camiseta,
            'tam_calca' => $dados->tam_calca,
            'tam_bermuda' => $dados->tam_bermuda,
            'tam_calcado' => $dados->tam_calcado,
            'tam_meia' => $dados->tam_meia,
            'escola' => $dados->escola,
            'etapa_id' => $dados->etapa_id,
            'turno' => $dados->turno
          ];
      
       
      $this->view('anuals/index', $data);
     } 






    




    }//class