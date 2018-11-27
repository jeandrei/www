<?php
 class Posts extends Controller {
    public function __construct(){
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
    }

     public function index(){
        $data = [];
        $teste = new Posts();
        $this->view('posts/index', $data);      

     }
 }