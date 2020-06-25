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
        // SE O USUÁRIO ESTÁ LOGADO SE DIGITAR NA URL /pages/sistem ele vai abrir caso contrário ele vai para o index
        if(isLoggedIn()){
            redirect('pages/sistem');
        }

        $data = [
           'title' => 'SharePosts',
           'description' => 'Uma Simples Rede Social construida em MVC'
       ];    
       
     
       //método view está em /libraries/Controller
       $this->view('pages/index' ,$data);
    }

    public function sistem(){  
         //SE O USUÁRIO NÃO ESTIVER LOGADO redireciona direto para users/login para efetuar o login
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $data = [
           'title' => 'Sistema de Fila Única',
           'description' => 'Sistema Web de Fila Única'
       ];    
       
     
       //método view está em /libraries/Controller
       $this->view('pages/sistem' ,$data);
    }
    

    //url /mvc/pages/about
    public function about(){
        $data = [
            'title' => 'Sobre Nós',
            'description' => 'Sistema de gerenciamento de fíla única.'
        ];            
        
        $this->view('pages/about', $data);
    } 
    
}