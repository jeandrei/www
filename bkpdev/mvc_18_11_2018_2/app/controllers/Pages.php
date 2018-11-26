<?php

/**
 * CADA CONTROLLER TEM QUE TER SEU PRÓPRIO DIRETÓRIO DENTRO DE VIEWS
 * EX TEM CONTROLLER pages logo tem que ter um diretório pages
*/
class Pages extends Controller{
    public function __construct(){
        $this->postModel = $this->model('Post');        
    }

    // Lá no arquivo libraries/Core.php definimos que o metodo padrão é index
    // então se não passar nada na url ele vai ler o método abaixo Index()
    // Ao qual chama o view('index') que é o arquivo /views/index.php
    // no arquivo Controller ele monta o  require_once '../app/views/' . $view . '.php';
    // onde a variável $view vai ser index e concatenando fica index.php
    //url /mvc/pages
    public function index(){
        //como na construct setamos o valor da propriedade postModel para Post
        // a linha abaixo vai ficar
        //$posts = $this->Post->getPosts();   
        $posts = $this->postModel->getPosts();       
       
        $data = [
           'title' => 'Welcome',
           'posts' => $posts
       ];    
       
     
       //método view está em /libraries/Controller
       $this->view('pages/index' ,$data);
    }

    //url /mvc/pages/about
    public function about(){
        $data = [
            'title' => 'About Us'
        ];            
        
        $this->view('pages/about', $data);
    } 
    
}