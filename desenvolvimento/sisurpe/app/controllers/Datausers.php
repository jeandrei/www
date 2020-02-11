<?php
 class Datausers extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->dataModel = $this->model('Datauser');
    // $this->userModel = $this->model('User');
    }

    
     public function index(){
        $datauser = $this->postModel->getDatauserByid($_SESSION['id_aluno']);
        //var_dump($datauser->nome_aluno);
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
            'faz_uso_medicacao' => $datauser->faz_uso_medicacao,
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

     public function show($id=0){
    
     $this->view('datausers/show', $data=0);

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
              'faz_uso_medicacao' => trim($_POST['faz_uso_medicacao']),
              'medicamentos' => trim($_POST['medicamentos']),
              'alergias' => trim($_POST['alergias']),
              'deficiencias' => trim($_POST['deficiencias']),
              'restric_alimentos' => trim($_POST['restric_alimentos'])  
          ];

            

            // Validate Email
            if(empty($data['nome_aluno'])){
                $data['nome_aluno_err'] = 'Por favor informe o nome do aluno';
            } 

            // Validate Name
            if(empty($data['nascimento'])){
                $data['nascimento_err'] = 'Por favor informe a data de nascimento do aluno';
            }

            // Validate Password
            if(empty($data['telefone_aluno'])){
                $data['telefone_aluno_err'] = 'Por favor informe o telefone do aluno';
            } 

            // Validate Confirm Password
            if(empty($data['email_aluno'])){
                $data['email_aluno_err'] = 'Por favor informe o e-mail do aluno';
            } 
            
            // Make sure errors are empty
            if(                    
                empty($data['nome_aluno_err']) &&
                empty($data['nascimento_err']) && 
                empty($data['telefone_aluno_err']) &&
                empty($data['email_aluno_err']) 
                ){
                  //Validated
                  
                
                  

                  // Register User
                  if($this->userModel->register($data)){
                    // Cria a menságem antes de chamar o view va para 
                    // views/users/login a segunda parte da menságem
                    flash('register_success', 'Você está registrado e pode efetuar o login');                        
                    redirect('users/login');
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
              'faz_uso_medicacao' => '',
              'medicamentos' => '',
              'alergias' => '',
              'deficiencias' => '',
              'restric_alimentos' => ''
          ];
            // Load view
            $this->view('datausers/add', $data);
        }     
   

    }





    }//class