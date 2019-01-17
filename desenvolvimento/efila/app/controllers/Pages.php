<?php

/**
 * CADA CONTROLLER TEM QUE TER SEU PRÓPRIO DIRETÓRIO DENTRO DE VIEWS
 * EX TEM CONTROLLER pages logo tem que ter um diretório pages
*/
class Pages extends Controller{
    public function __construct(){
               
    }

    // Lá no arquivo libraries/Core.php definimos que o metodo padrão é index
    // então se não passar nada na url ele vai ler o método abaixo Index()
    // Ao qual chama o view('index') que é o arquivo /views/index.php
    // no arquivo Controller ele monta o  require_once '../app/views/' . $view . '.php';
    // onde a variável $view vai ser index e concatenando fica index.php
    //url /mvc/pages
    public function index(){  
        // Se o usuário estiver logado ao invés de quando ele clicar em home
        // direcionar para o home ele vai direcionar para os posts
        if(isLoggedIn()){
            redirect('posts');
        }

        $data = [
           'title' => 'e-fila', 
           'description' => 'Bem vindo ao e-fila, sistema de filas Online.<br> 
           Não possui cadastro? Clique em Se registrar.'       
       ];    
       
     
       //método view está em /libraries/Controller
       $this->view('pages/index' ,$data);
    }

    //url /mvc/pages/about
    public function about(){
        $data = [
            'title' => 'Sobre o sistema',
            'description' => 'Sistema de filas Online'
        ];            
        
        $this->view('pages/about', $data);
    } 
    
}