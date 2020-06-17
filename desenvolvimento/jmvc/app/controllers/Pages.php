<?php

class Pages extends Controller {
    public function __construct(){
       
    }

    // Como o currentController padrão é Pages e o currentMethod padrão é index, temos que ter o metodo Index
    // aqui no controller de Pages, caso contrário vai dar erro    
    public function index(){
        $data = [
            'title' => 'Welcome'
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $this->view('pages/about');  
    }
}

?>