<?php
    class Admins extends Controller{
        public function __construct(){
            // 1 Chama o model
          $this->adminModel = $this->model('Admin');
        }

        public function index(){  
          
          if (isset($_POST['etapa'])){
            $etapa = $_POST['etapa'];
          }

          if (isset($_POST['status'])){
            $status = $_POST['status'];
          }
          

          if(($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['etapa']<>"Todos")){

           
            if($this->adminModel->getFilaBusca(NULL,$_POST['etapa'],$status)){
                $dados =  $this->adminModel->getFilaBusca(NULL,$_POST['etapa'],$status);
                  foreach($dados as $dado){

                    //pego a etapa com a função busca protocolo
                    $etapa = $this->adminModel->buscaProtocolo($dado['protocolo']);
                  
                    // e aplico em um novo array utilizando de outras funções para obter os dados que preciso
                    $data[] = array(
                      'fila_id' => $dado['fila_id'],
                      'posicao' => $posicao = ($this->adminModel->buscaPosicaoFila($dado['protocolo'])) ? $this->adminModel->buscaPosicaoFila($dado['protocolo']) : "-",
                      'nome' => $dado['nome'],
                      'nascimento' => date('d/m/Y', strtotime($dado['nascimento'])),
                      'etapa' => $etapa['etapa'],
                      'responsavel' => $dado['responsavel'],
                      'protocolo' => $dado['protocolo'],
                      'registro' => date('d/m/Y h:i:s', strtotime($dado['registro'])),
                      'comprovante_res_nome' => $dado['comprovante_res_nome'],
                      'comprovante_nasc_nome' => $dado['comprovante_nasc_nome'],
                      'status' => $dado['status']
                      
                    );              
                  }
              }
              else
              {
              $data['err'] = "Sem dados para emitir";
              }
            
          } 
          else
          {
            $dados =  $this->adminModel->getFila();
          
            
            foreach($dados as $dado){

              //pego a etapa com a função busca protocolo
              $etapa = $this->adminModel->buscaProtocolo($dado['protocolo']);
             
              // e aplico em um novo array utilizando de outras funções para obter os dados que preciso
              $data[] = array(
                'fila_id' => $dado['fila_id'],
                'posicao' => $posicao = ($this->adminModel->buscaPosicaoFila($dado['protocolo'])) ? $this->adminModel->buscaPosicaoFila($dado['protocolo']) : "-",
                'nome' => $dado['nome'],
                'nascimento' => date('d/m/Y', strtotime($dado['nascimento'])),
                'etapa' => $etapa['etapa'],
                'responsavel' => $dado['responsavel'],
                'protocolo' => $dado['protocolo'],
                'registro' => date('d/m/Y h:i:s', strtotime($dado['registro'])),
                'comprovante_res_nome' => $dado['comprovante_res_nome'],
                'comprovante_nasc_nome' => $dado['comprovante_nasc_nome'],
                'status' => $dado['status']
                
              );              
            }   

          }


            

            // 4 Chama o view passando os dados
            $this->view('admins/index', $data);
        }



        public function download(){ 
          
          if($_GET['tipo'] == 'res'){          
            $data = $this->adminModel->downloadres($_GET['id']);
          }

          if($_GET['tipo'] == 'nasc'){          
            $data = $this->adminModel->downloadnasc($_GET['id']);
          }
          
          $this->view('admins/download', $data);
      }

      //aqui é o método chamado pelo jquery lá no index, verifico se o id tem algum valor se sim eu chamo o método changeStatus no model
      public function updateStatus(){
        if (isset($_GET['id'])){
          $this->adminModel->changeStatus($_GET['id'],$_GET['status']);
        }
      }
        


}