<?php 
    class Modelos extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado User.php e incluir
            $this->userModel = $this->model('Modelo');
        }    
        
        public function paginamodelo(){

                      //busca os dados no banco
                      $array = $this->userModel->getPessoas();

                      //converte objetos em array *********TENTAR JOGAR ESSA PARTE DO JSON DENTRO DA FUNÇÃO QUE CRIA A TABELA********
                      $pessoas = json_decode(json_encode($array), True);
                      $data = [
                        'pessoas' => $pessoas
                    ];                    
                                       
                      $this->view('modelos/paginamodelo', $data);
                    }               

            
} 
    
    
   
?>