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
        //$data = array();            
        
        //$sql = 'SELECT * FROM fila';
        $limit = 10;
        $data = [
            'title' => 'Paginação',
            'description' => 'Exemplo de paginação'          
        ];        
        
        
  
       //método view está em /libraries/Controller
       $this->view('exemplo_paginacao/index' ,$data);
    }  
    
}