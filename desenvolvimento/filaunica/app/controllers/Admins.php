<?php
    class Admins extends Controller{
        public function __construct(){
            // 1 Chama o model
          $this->adminModel = $this->model('Admin');
        }

        public function index(){  
          
          if(!isset($_SESSION['user_id'])){
            redirect('index');
          }

          //echo $_GET['testevar'] . "</br>";

          // LIMITE DE DADOS POR PAGINA
          $_GET['limitePag'] = 10;
          $limit = $_GET['limitePag'];
          

          //echo $_GET["page"];

          if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
          $start_from = ($page-1) * $limit;



           /*
              AQUI POR CONTA DA PAGINAÇÃO E PARA MONTAR A CONSULTA EU TENHO 3 SITUAÇÕES
              1 O CARREGAMENTO DIRETO DA PÁGINA QUE NÃO VAI TER NEM DADOS NO GET E NEM NO POST ENTÃO NA ÚLTIMA OPÇÃO DO IF
              ATRIBUO TODOS A VARIÁVEL BUSCANOME
              2 O USUÁRIO DEFINIU SUA BUSCA E CLICOU EM ATUALIZAR ENTÃO TENHO QUE PASAR OS DADOS PELO POST ATRIBUO NA PRIMEIRA
              OPÇÃO DO IF BUSCANOME RECEBE O POST
              3 O USUÁRIO CLICOU NO LINK DA PAGINAÇÃO ENTÃO PRECISO PASSAR OS DADOS PELO GET QUE VAI FAZER A PESQUISA NOVAMENTE
              ATRAVÉS DA FUNÇÃO getFilaBusca MAS DESSA VEZ PASSANDO A PÁGINA INICIAL E FINAL PARA A PAGINAÇÃO
              ISSO VALE PARA BUSCAETAPA E BUSCASTATUS SEQUENTES TAMBÉM
              DEPOIS VOLTO PARA O INDEX E TENHO QUE VERIFICAR NOVAMENTE PARA PODER JOGAR NO LINK DA PAGINAÇÃO
           */
           if (isset($_POST['buscanome'])){
            $buscaNome = $_POST['buscanome'];            
          }else if (isset($_GET['nome'])){
            $buscaNome = $_GET['nome'];            
          } else {
            $buscaNome = "Todos";
          } 

          
          if (isset($_POST['buscaetapa'])){
            $buscaEtapa = $_POST['buscaetapa'];           
          }else if (isset($_GET['etapa'])){
            $buscaEtapa = $_GET['etapa'];            
          } else {
            $buscaEtapa = "Todos";
          } 

          if (isset($_POST['buscastatus'])){
            $buscaStatus = $_POST['buscastatus'];            
          }else if (isset($_GET['status'])){
            $buscaStatus = $_GET['status'];            
          } else {
            $buscaStatus = "Todos";
          } 
            
            // A FUNÇÃO getFilaBusca POR PADRÃO OS PARÂMETROS JÁ ESTÁ DEFINIDO COMO TODOS
            // MESMO ASSIM SE NAS LINHAS ACIMA AS VARIÁVEIS FICAREM COM O VALOR TODOS ELE VAI MONTAR A SQL DE FORMA A TRAZER TODOS
            // CASO CONTRÁRIO ELE VAI MONTAR A SQL FILTRANDO COM OS PARÂMETROS PASSADOS $status, $etapa ...
            if($dados = $this->adminModel->getFilaBuscaPag($buscaNome,$buscaEtapa,$buscaStatus,$start_from,$limit)){
                
                // 2 VAI CHAMAR A FUNÇÃO getFilaBusca EM models/Admin.php 
                $dados = $this->adminModel->getFilaBuscaPag($buscaNome,$buscaEtapa,$buscaStatus,$start_from,$limit);
                // PASSO A QUANTIDADE DE REGISTROS TOTAIS COM OUTRA FUNÇÃO GETFILABUSCA SEM A PAGINAÇÃO
                // POIS PRECISO DA QUANTIDADE PARA MONTAR OS NÚMEROS DE PAGINAÇÃO ABAIXO
                $_GET['count'] = count($this->adminModel->getFilaBusca($buscaNome,$buscaEtapa,$buscaStatus));
                
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
                $data['err'] = "Sem resultados para esta consulta";
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
      public function gravar(){
        if (isset($_GET['id'])){
          $this->adminModel->changeStatus($_GET['id'],$_GET['status']);
          $this->adminModel->gravaHistorico($_GET['id'],$_GET['historico'],$_SESSION['user_name'],$_GET['status']);
        }
      }
       
      public function historico($id){  
        if($data = $this->adminModel->getHistoricoById($id)){     
          $this->view('admins/historico', $data);
        } else {
          $data['erro'] = "Sem dados de histórico.";
          $this->view('admins/historico', $data);
        }
      }


}