<?php
 class Datausers extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->postModel = $this->model('Datauser');
     $this->userModel = $this->model('User');
    }

     public function index(){
        $datauser = $this->postModel->getDatauserByid($_SESSION['id_aluno']);
        //var_dump($datausers);
        $data = [
            'datauer' => $datauser
        ];
        
       // $this->view('posts/index', $data);      
       //var_dump(isset($_SESSION['id_aluno']));*/
       $this->view('datausers/index', $data);

     }
    }//class