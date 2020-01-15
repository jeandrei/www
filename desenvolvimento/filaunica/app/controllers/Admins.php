<?php
    class Admins extends Controller{
        public function __construct(){
            // 1 Chama o model
          $this->adminModel = $this->model('Admin');
        }

        public function index(){  
          
          // VERIFICO SE TEM ALGUM VALOR NO POST ETAPA SE NÃO ATRIBUO O VALOR Todos PARA NA CONSULTA TRAZER TODOS OS VALORES
          if (isset($_POST['etapa'])){
            $etapa = $_POST['etapa'];
          } else {
            $etapa = "Todos";
          }

          // VERIFICO SE TEM ALGUM VALOR NO POST STATUS SE NÃO ATRIBUO O VALOR Todos PARA NA CONSULTA TRAZER TODOS OS VALORES
          if (isset($_POST['status'])){
            $status = $_POST['status'];
          }else {
            $status = "Todos";
          }     
           
            
            // A FUNÇÃO getFilaBusca POR PADRÃO OS PARÂMETROS JÁ ESTÁ DEFINIDO COMO TODOS
            // MESMO ASSIM SE NAS LINHAS ACIMA AS VARIÁVEIS FICAREM COM O VALOR TODOS ELE VAI MONTAR A SQL DE FORMA A TRAZER TODOS
            // CASO CONTRÁRIO ELE VAI MONTAR A SQL FILTRANDO COM OS PARÂMETROS PASSADOS $status, $etapa ...
            if($dados = $this->adminModel->getFilaBusca("Todos",$etapa,$status)){
                
                // 2 VAI CHAMAR A FUNÇÃO getFilaBusca EM models/Admin.php 
                $dados = $this->adminModel->getFilaBusca("Todos",$etapa,$status);
                
                
                // 4 MONTA A VARIÁVEL DADOS COM OS DADOS QUE EU PRECISO INCLUSIVE UTILIZANDO FUNÇÕES
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
                
                
              }//if($dados)
              else
              {
                $data['err'] = "Sem dados para emitir";
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