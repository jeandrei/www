<?php
 class Buscadadosescolars extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->BuscaDadosEscolarsModel = $this->model('Buscadadosescolar');
    // $this->userModel = $this->model('User');
    }

    
     public function index(){ 
      
  
      $this->view('buscadatausers/index', $data=0);

     } 






    




    }//class