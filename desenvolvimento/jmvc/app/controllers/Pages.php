<?php

class Pages{
    public function __construct(){
       
    }

    // Como o currentController padrão é Pages e o currentMethod padrão é index, temos que ter o metodo Index
    // aqui no controller de Pages, caso contrário vai dar erro    
    public function index(){
        echo 'this is the default page index';
    }

    public function about($id){
        echo 'this is about page and id is ' . $id;
    }
}

?>