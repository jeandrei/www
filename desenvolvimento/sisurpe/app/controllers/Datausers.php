<?php
 class Datausers extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->dataModel = $this->model('Datauser');
     $this->dadosModel = $this->model('Anual');

    
    }

    
     public function index(){
        $datauser = $this->dataModel->getDatauserByid($_SESSION['id_aluno']); 
        $data = [
            'id' => $datauser->id_aluno,
            'nome_aluno' => $datauser->nome_aluno,
            'nascimento' => $datauser->nascimento,
            'sexo' => $datauser->sexo,
            'telefone_aluno' => $datauser->telefone_aluno,
            'email_aluno' => $datauser->email_aluno,
            'nome_pai' => $datauser->nome_pai,
            'telefone_pai' => $datauser->telefone_pai,
            'nome_mae' => $datauser->nome_mae,
            'telefone_mae' => $datauser->telefone_mae,
            'nome_responsavel' => $datauser->nome_responsavel,
            'telefone_resp' => $datauser->telefone_resp,
            'naturalidade' => $datauser->naturalidade, 
            'nacionalidade' => $datauser->nacionalidade, 
            'rg' => $datauser->rg, 
            'uf_rg' => $datauser->uf_rg,
            'orgao_emissor' => $datauser->orgao_emissor,
            'titulo_eleitor' => $datauser->titulo_eleitor,
            'zona' => $datauser->zona,
            'secao' => $datauser->secao,
            'certidao' => $datauser->certidao,
            'uf_cert' => $datauser->uf_cert,
            'cartorio_cert' => $datauser->cartorio_cert,
            'modelo' => $datauser->modelo,
            'numero' => $datauser->numero, 
            'folha' => $datauser->folha,
            'livro' => $datauser->livro,
            'data_emissao_cert' => $datauser->data_emissao_cert,
            'municipio_cert' => $datauser->municipio_cert,
            'cpf' => $datauser->cpf,
            'tipo_sanguineo' => $datauser->tipo_sanguineo,
            'fazUsoMed' => $datauser->fazUsoMed,
            'medicamentos' => $datauser->medicamentos,
            'alergias' => $datauser->alergias,
            'deficiencias' => $datauser->deficiencias,
            'restric_alimentos' => $datauser->restric_alimentos     
        ];
        
        //var_dump($data);
       // $this->view('posts/index', $data);      
       //var_dump(isset($_SESSION['id_aluno']));*/
       $this->view('datausers/index', $data);

     }

     public function show(){
       if ($dados = $this->dataModel->getAlunosUsuario($_SESSION['user_id'])){



        foreach($dados as $dado){
          $data[] = [
            'id_aluno' => $dado->id_aluno,
            'nome_aluno' => $dado->nome_aluno,
            'nascimento' => $dado->nascimento,
            'ultima_atualizacao' => $this->dadosModel->getUltimaAtualizacaoById($dado->id_aluno)
          ];
        }

          $this->view('datausers/show', $data);
       } else {
          $this->view('datausers/show', $data = ['error' => "Ainda não existem alunos cadastrados"]);
       }
    
     

   }
   
    public function add(){

          // Check for POST            
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //init data
            $data = [              
              'nome_aluno' => trim($_POST['nome_aluno']),
              'nascimento' => $_POST['nascimento'],
              'sexo' => $_POST['sexo'],
              'telefone_aluno' => $_POST['telefone_aluno'],
              'email_aluno' => trim($_POST['email_aluno']),
              'nome_pai' => trim($_POST['nome_pai']),
              'telefone_pai' => $_POST['telefone_pai'],
              'nome_mae' => trim($_POST['nome_mae']),
              'telefone_mae' => $_POST['telefone_mae'],
              'nome_responsavel' => trim($_POST['nome_responsavel']),
              'telefone_resp' => $_POST['telefone_resp'],
              'naturalidade' => trim($_POST['naturalidade']),
              'nacionalidade' => trim($_POST['nacionalidade']),
              'rg' => trim($_POST['rg']),
              'uf_rg' => $_POST['uf_rg'],
              'orgao_emissor' => trim($_POST['orgao_emissor']),
              'titulo_eleitor' => trim($_POST['titulo_eleitor']),
              'zona' => trim($_POST['zona']),
              'secao' => trim($_POST['secao']),
              'certidao' => trim($_POST['certidao']),
              'uf_cert' => $_POST['uf_cert'],
              'cartorio_cert' => trim($_POST['cartorio_cert']),
              'modelo' => $_POST['modelo'],
              'numero' => trim($_POST['numero']),
              'folha' => trim($_POST['folha']),
              'livro' => trim($_POST['livro']),
              'data_emissao_cert' => $_POST['data_emissao_cert'],
              'municipio_cert' => trim($_POST['municipio_cert']),
              'cpf' => $_POST['cpf'],
              'tipo_sanguineo' => trim($_POST['tipo_sanguineo']),
              'fazUsoMed' => trim($_POST['fazUsoMed']),
              'medicamentos' => trim($_POST['medicamentos']),
              'alergias' => trim($_POST['alergias']),
              'deficiencias' => trim($_POST['deficiencias']),
              'restric_alimentos' => trim($_POST['restric_alimentos'])  
          ];

            

           
            if(empty($data['nome_aluno'])){
                $data['nome_aluno_err'] = 'Por favor informe o nome do aluno';
            } 

           
            if(empty($data['nascimento'])){
                $data['nascimento_err'] = 'Por favor informe a data de nascimento do aluno';
            }
            
            if (!valida($data['nascimento'])){
              $data['nascimento_err'] = 'Data inválida';
            }

            if(!empty($data['telefone_aluno'])){
              if(!validacelular($data['telefone_aluno'])){
                $data['telefone_aluno_err'] = 'Telefone inválido';
              }
            }

            if(!empty($data['email_aluno'])){
              if(!validaemail($data['email_aluno'])){
                $data['email_aluno_err'] = 'E-mail inválido';
              }
            }            

            if(!empty($data['telefone_pai'])){
              if(!validacelular($data['telefone_pai'])){
                $data['telefone_pai_err'] = 'Telefone inválido';
              }
            }

            if(!empty($data['telefone_mae'])){
              if(!validacelular($data['telefone_mae'])){
                $data['telefone_mae_err'] = 'Telefone inválido';
              }
            }

            if(!empty($data['telefone_resp'])){
              if(!validacelular($data['telefone_resp'])){
                $data['telefone_resp_err'] = 'Telefone inválido';
              }
            }


            
            if(empty($data['certidao'])){
                $data['certidao_err'] = 'Por favor informe o número da certidão de nascimento';
            } 

            
            if(empty($data['uf_cert'])){
                $data['uf_cert_err'] = 'Por favor informe a UF da certidão de nascimento';
            } 

            if(empty($data['modelo'])){
              $data['modelo_err'] = 'Por favor informe o modelo da certidão de nascimento';
          } 

            if(!empty($data['cpf'])){
              if(!validaCPF($data['cpf'])){
                $data['cpf_err'] = 'CPF inválido';
              }
            }

            if(!empty($data['data_emissao_cert'])){
              if(!valida($data['data_emissao_cert'])){
                $data['data_emissao_cert_err'] = 'Data inválida';
              }
            }
            
            // Make sure errors are empty
            if(                    
                empty($data['nome_aluno_err']) &&
                empty($data['nascimento_err']) && 
                empty($data['certidao_err']) &&
                empty($data['uf_cert_err']) &&
                empty($data['modelo_err']) 
                ){
                  //Validated 

                  // Register User                 
                  if($this->dataModel->register($data)){
                    // Cria a menságem antes de chamar o view va para 
                    // views/users/login a segunda parte da menságem
                    flash('mensagem', 'Dados registrados com sucesso');                        
                    redirect('datausers/show');
                  } else {
                      die('Ops! Algo deu errado.');
                  }
                  

                  
                } else {
                  // Load the view with errors
                  $this->view('datausers/add', $data);
                }               

        
        } else {
            // Init data
            $data = [              
              'nome_aluno' => '',
              'nascimento' => '',
              'sexo' => '',
              'telefone_aluno' => '',
              'email_aluno' => '',
              'nome_pai' => '',
              'telefone_pai' => '',
              'nome_mae' => '',
              'telefone_mae' => '',
              'nome_responsavel' => '',
              'telefone_resp' => '',
              'naturalidade' => '',
              'nacionalidade' => '',
              'rg' => '',
              'uf_rg' => '',
              'orgao_emissor' => '',
              'titulo_eleitor' => '',
              'zona' => '',
              'secao' => '',
              'certidao' => '',
              'uf_cert' => '',
              'cartorio_cert' => '',
              'modelo' => '',
              'numero' => '',
              'folha' => '',
              'livro' => '',
              'data_emissao_cert' => '',
              'municipio_cert' => '',
              'cpf' => '',
              'tipo_sanguineo' => '',
              'fazUsoMed' => '',
              'medicamentos' => '',
              'alergias' => '',
              'deficiencias' => '',
              'restric_alimentos' => ''
          ];
            // Load view
            $this->view('datausers/add', $data);
        }     
   

    }











    public function edit($id){      
     
       // Check for POST            
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //init data
        $data = [ 
          'id_aluno' => $id,
          'nome_aluno' => trim($_POST['nome_aluno']),
          'nascimento' => date('Y-d-m', strtotime( $_POST['nascimento'])),
          'sexo' => $_POST['sexo'],
          'telefone_aluno' => $_POST['telefone_aluno'],
          'email_aluno' => trim($_POST['email_aluno']),
          'nome_pai' => trim($_POST['nome_pai']),
          'telefone_pai' => $_POST['telefone_pai'],
          'nome_mae' => trim($_POST['nome_mae']),
          'telefone_mae' => $_POST['telefone_mae'],
          'nome_responsavel' => trim($_POST['nome_responsavel']),
          'telefone_resp' => $_POST['telefone_resp'],
          'naturalidade' => trim($_POST['naturalidade']),
          'nacionalidade' => trim($_POST['nacionalidade']),
          'rg' => trim($_POST['rg']),
          'uf_rg' => $_POST['uf_rg'],
          'orgao_emissor' => trim($_POST['orgao_emissor']),
          'titulo_eleitor' => trim($_POST['titulo_eleitor']),
          'zona' => trim($_POST['zona']),
          'secao' => trim($_POST['secao']),
          'certidao' => trim($_POST['certidao']),
          'uf_cert' => $_POST['uf_cert'],
          'cartorio_cert' => trim($_POST['cartorio_cert']),
          'modelo' => $_POST['modelo'],
          'numero' => trim($_POST['numero']),
          'folha' => trim($_POST['folha']),
          'livro' => trim($_POST['livro']),
          'data_emissao_cert' => $_POST['data_emissao_cert'],
          'municipio_cert' => trim($_POST['municipio_cert']),
          'cpf' => $_POST['cpf'],
          'tipo_sanguineo' => trim($_POST['tipo_sanguineo']),
          'fazUsoMed' => trim($_POST['fazUsoMed']),
          'medicamentos' => trim($_POST['medicamentos']),
          'alergias' => trim($_POST['alergias']),
          'deficiencias' => trim($_POST['deficiencias']),
          'restric_alimentos' => trim($_POST['restric_alimentos'])  
      ];

        

       
        if(empty($data['nome_aluno'])){
            $data['nome_aluno_err'] = 'Por favor informe o nome do aluno';
        } 

       
        if(empty($data['nascimento'])){
            $data['nascimento_err'] = 'Por favor informe a data de nascimento do aluno';
        }
        
        if (!valida($data['nascimento'])){
          $data['nascimento_err'] = 'Data inválida';
        }

        if(!empty($data['telefone_aluno'])){
          if(!validacelular($data['telefone_aluno'])){
            $data['telefone_aluno_err'] = 'Telefone inválido';
          }
        }

        if(!empty($data['email_aluno'])){
          if(!validaemail($data['email_aluno'])){
            $data['email_aluno_err'] = 'E-mail inválido';
          }
        }            

        if(!empty($data['telefone_pai'])){
          if(!validacelular($data['telefone_pai'])){
            $data['telefone_pai_err'] = 'Telefone inválido';
          }
        }

        if(!empty($data['telefone_mae'])){
          if(!validacelular($data['telefone_mae'])){
            $data['telefone_mae_err'] = 'Telefone inválido';
          }
        }

        if(!empty($data['telefone_resp'])){
          if(!validacelular($data['telefone_resp'])){
            $data['telefone_resp_err'] = 'Telefone inválido';
          }
        }


        
        if(empty($data['certidao'])){
            $data['certidao_err'] = 'Por favor informe o número da certidão de nascimento';
        } 

        
        if(empty($data['uf_cert'])){
            $data['uf_cert_err'] = 'Por favor informe a UF da certidão de nascimento';
        } 

        if(empty($data['modelo'])){
          $data['modelo_err'] = 'Por favor informe o modelo da certidão de nascimento';
      } 

        if(!empty($data['cpf'])){
          if(!validaCPF($data['cpf'])){
            $data['cpf_err'] = 'CPF inválido';
          }
        }

        if(!empty($data['data_emissao_cert'])){
          if(!valida($data['data_emissao_cert'])){
            $data['data_emissao_cert_err'] = 'Data inválida';
          }
        }
        
        // Make sure errors are empty
        if(                    
            empty($data['nome_aluno_err']) &&
            empty($data['nascimento_err']) && 
            empty($data['certidao_err']) &&
            empty($data['uf_cert_err']) &&
            empty($data['modelo_err']) 
            ){
              //Validated 

              // Register User
              if($this->dataModel->update($data)){
                // Cria a menságem antes de chamar o view va para 
                // views/users/login a segunda parte da menságem
                flash('mensagem', 'Dados atualizados com sucesso');                        
                redirect('datausers/show/' . $id);
              } else {
                  die('Ops! Algo deu errado.');
              }
              

              
            } else {
              // Load the view with errors
              $this->view('datausers/add', $data);
            }               

    
    } else {
        // Init data
        $data = $this->dataModel->getAlunoById($id);        
        $data = [ 
          'id_aluno' => $data->id_aluno,
          'nome_aluno' => $data->nome_aluno,
          'nascimento' => date('Y-d-m', strtotime($data->nascimento)),          
          'sexo' => $data->sexo,
          'telefone_aluno' => $data->telefone_aluno,
          'email_aluno' =>  $data->email_aluno,
          'nome_pai' => $data->nome_pai,
          'telefone_pai' => $data->telefone_pai,
          'nome_mae' => $data->nome_mae,
          'telefone_mae' => $data->telefone_mae,
          'nome_responsavel' => $data->nome_responsavel,
          'telefone_resp' => $data->telefone_resp,
          'naturalidade' => $data->naturalidade,
          'nacionalidade' => $data->nacionalidade,
          'rg' => $data->rg,
          'uf_rg' => $data->uf_rg,
          'orgao_emissor' => $data->orgao_emissor,
          'titulo_eleitor' => $data->titulo_eleitor,
          'zona' => $data->zona,
          'secao' => $data->secao,
          'certidao' => $data->certidao,
          'uf_cert' => $data->uf_cert,
          'cartorio_cert' => $data->cartorio_cert,
          'modelo' => $data->modelo,
          'numero' => $data->numero,
          'folha' => $data->folha,
          'livro' => $data->livro,
          'data_emissao_cert' =>  date('Y-d-m', strtotime($data->data_emissao_cert)),
          'municipio_cert' => $data->municipio_cert,
          'cpf' => $data->cpf,
          'tipo_sanguineo' => $data->tipo_sanguineo,
          'fazUsoMed' => $data->fazUsoMed,
          'medicamentos' => $data->medicamentos,
          'alergias' =>  $data->alergias,
          'deficiencias' => $data->deficiencias,
          'restric_alimentos' => $data->restric_alimentos
      ];
        // Load view
        $this->view('datausers/edit', $data);
    }     

}

















      public function delete($id){
        
        $aluno = $this->dataModel->getAlunoById($id);
        if($aluno->user_id != $_SESSION['user_id']){
          die("Você não tem permissão para excluir este aluno");
        }
       
        if($this->dataModel->deleteAluno($id)){                
          flash('mensagem', 'Registro removido com sucesso!');                
      } else {
          flash('mensagem', 'Falha ao tentar remover o registro', 'alert alert-danger');
      }


      if ($dados = $this->dataModel->getAlunosUsuario($_SESSION['user_id'])){

        foreach($dados as $dado){
          $data[] = [
            'id_aluno' => $dado->id_aluno,
            'nome_aluno' => $dado->nome_aluno,
            'nascimento' => $dado->nascimento,
            'ultima_atualizacao' => $this->dadosModel->getUltimaAtualizacaoById($dado->id_aluno)
          ];
        }

          $this->view('datausers/show', $data);
       } else {
          $this->view('datausers/show', $data = ['error' => "Ainda não existem alunos cadastrados"]);
       }
       
    }





    }//class