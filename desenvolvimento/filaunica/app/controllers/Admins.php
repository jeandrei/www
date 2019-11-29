<?php
    class Admins extends Controller{
        public function __construct(){
            // 1 Chama o model
          $this->adminModel = $this->model('Admin');
        }

        public function index(){           

            $dados =  $this->adminModel->getFila();
          
            
            foreach($dados as $dado){

              $data[] = array( 
                'posicao' => $this->adminModel->buscaPosicaoFila($dado['protocolo']),
                'nome' => $dado['nome'],
                'nascimento' => $dado['nascimento'],
                'etapa' => 'etapa',
                'responsavel' => $dado['responsavel'],
                'protocolo' => $dado['protocolo'],
                'registro' => $dado['registro'],
                'comp_res' => 'comp_res',
                'comp_nasc' => 'comp_nasc',
                'status' => $dado['status']
                
              );              
            }
           
            //die(var_dump($data));





            

            // 4 Chama o view passando os dados
            $this->view('admins/index', $data);
        }

        
}