<?php
 class Buscadadostransportes extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->BuscadadostransportesModel = $this->model('Buscadadostransporte');
    // $this->userModel = $this->model('User');
    }

    
     public function index(){ 
      
      
      $this->view('buscadadostransportes/index', $data=0);

     } 






    




    }//class