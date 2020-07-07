<?php

/**
 * CADA CONTROLLER TEM QUE TER SEU PRÓPRIO DIRETÓRIO DENTRO DE VIEWS
 * EX TEM CONTROLLER pages logo tem que ter um diretório pages
*/


class Exemplo_paginacaos extends Controller{
    public function __construct(){
    //vai procurar na pasta model um arquivo chamado User.php e incluir
    $this->pagModel = $this->model('Exemplo_paginacao');               
    }

    // Lá no arquivo libraries/Core.php definimos que o metodo padrão é index
    // então se não passar nada na url ele vai ler o método abaixo Index()
    // Ao qual chama o view('index') que é o arquivo /views/index.php
    // no arquivo Controller ele monta o  require_once '../app/views/' . $view . '.php';
    // onde a variável $view vai ser index e concatenando fica index.php
    //url /mvc/pages
    public function index(){ 
        
        $limit = 10;
        $data = [
            'title' => 'Paginação',
            'description' => 'Exemplo de paginação'          
        ];

        

        // INÍCIO PARTE PAGINAÇÃO SÓ COPIAR ESSA PARTE MUDAR A URL E COLOCAR OS PARAMETROS EM named_params
        if(isset($_GET['page']))
        {
        // AQUI TENHO QUE FAZER COM SESSION SE NÃO TODA VEZ QUE O USUÁRIO CLICA NA PAGINAÇÃO ELE VOLTA PARA O VALOR PADRÃO
        // E NO INPUT DO INDEX TBEM TIVE QUE COLOCAR COM SESSION
        $status = $_SESSION['buscastatus'];
        $page = $_GET['page'];
        }
        else
        {
            if (isset($_POST['buscastatus'])){
                $_SESSION['buscastatus'] = $_POST['buscastatus'];
                $status = $_POST['buscastatus'];
            } else {
                $_SESSION['buscastatus'] = 'Aguardando';
                $status = $_SESSION['buscastatus'];
            }       
           
        $page = 1;
        }

        

            
                        
       
        
        $options = array(
            'results_per_page' => 10,
            'url' => URLROOT . '/exemplo_paginacaos/index.php?page=*VAR*',
            'named_params' => array(':status' => $status)     
        );

        $paginate = $this->pagModel->getfila($page, $options);
        $data['paginate'] =  $paginate;        
        //FIM PARTE PAGINAÇÃO RETORNANDO O ARRAY $data['paginate']  QUE VAI PARA A VARIÁVEL $paginate DO VIEW NESSE CASO O INDEX
  
       //método view está em /libraries/Controller
       $this->view('exemplo_paginacao/index' ,$data);
    }  
    
}