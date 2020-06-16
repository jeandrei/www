<?php

class Users{
    public function __construct(){
       
    }

    // Como o currentController padrão é Pages e o currentMethod padrão é index, temos que ter o metodo Index
    // aqui no controller de Pages, caso contrário vai dar erro    
    public function index(){
        echo 'this is the default Users index';
    }

    public function exibeid($id){
        echo 'this is Users page and id is ' . $id;
    }
}

?>