<?php
    class Admins extends Controller{
        public function __construct(){
            // 1 Chama o model
          $this->adminModel = $this->model('Admin');
        }

        public function index(){           

            $dados =  $this->adminModel->getFila();
          
            
            foreach($dados as $dado){

              //pego a etapa com a função busca protocolo
              $etapa = $this->adminModel->buscaProtocolo($dado['protocolo']);
             
              // e aplico em um novo array utilizando de outras funções para obter os dados que preciso
              $data[] = array(
                'fila_id' => $dado['fila_id'],
                'posicao' => $this->adminModel->buscaPosicaoFila($dado['protocolo']),
                'nome' => $dado['nome'],
                'nascimento' => $dado['nascimento'],
                'etapa' => $etapa['etapa'],
                'responsavel' => $dado['responsavel'],
                'protocolo' => $dado['protocolo'],
                'registro' => $dado['registro'],
                'comprovante_res_nome' => $dado['comprovante_res_nome'],
                'comprovante_nasc_nome' => $dado['comprovante_nasc_nome'],
                'status' => $dado['status']
                
              );              
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