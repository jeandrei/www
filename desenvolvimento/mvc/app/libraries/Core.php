<?php
/*
* App core Class
* Creates URL & loads core controller
* URL FORMAT - /controller/method/params
 */

 Class Core {
     protected $currentController = 'Pages';
     protected $currentMethod = 'index';
     protected $params = [];

     public function __construct(){
         //print_r($this->getUrl());
         $url = $this->getUrl();

         // Look in controller for first value
         // verificamos se o controller existe dentro da pasta app/controllers
         if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
            //if existe, set as a controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 index
            unset($url[0]);
         }
         
         // Require the controller
         require_once '../app/controllers/' . $this->currentController . '.php';

         // Instantiate controller class
         // o que vai acontecer aqui é instanciar o controller
         // exemplo $pages = new Pages;
         $this->currentController = new $this->currentController;


     }

     public function getUrl(){
        if(isset($_GET['url'])){
          $url = rtrim($_GET['url'], '/');
          //valida a url FILTER_SANITIZE_URL não deixa passar
          // nenhum caractere que uma url não deve ter 
          $url = filter_var($url, FILTER_SANITIZE_URL);
          //quebramos a url em um array
          $url = explode('/', $url);
          return $url;
        }
     }
 }
