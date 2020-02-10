<?php
 class Datausers extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->postModel = $this->model('Datauser');
     $this->userModel = $this->model('User');
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
    }//class