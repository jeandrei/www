<?php
 class Datausers extends Controller {
    public function __construct(){                
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->postModel = $this->model('Datauser');
     $this->userModel = $this->model('User');
    }

     public function index(){
        //$posts = $this->postModel->getPosts();
       /* $data = [
            'posts' => $posts
        ];
        
       // $this->view('posts/index', $data);      
       //var_dump(isset($_SESSION['id_aluno']));*/
       $this->view('datausers/index', $data);

     }
    }//class