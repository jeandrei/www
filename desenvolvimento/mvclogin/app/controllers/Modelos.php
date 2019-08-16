<?php 
    class Modelos extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado User.php e incluir
            $this->userModel = $this->model('Modelo');
        }    
        
        public function paginamodelo(){

                      //busca os dados no banco
                      $pessoas = $this->userModel->getPessoas();
                     
                      $data = [
                        'pessoas' => $pessoas
                    ];                    
                                       
                      $this->view('modelos/paginamodelo', $data);
                    }               

            
} 
    
    
   
?>