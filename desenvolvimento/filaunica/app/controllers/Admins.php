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

           // INÍCIO PARTE PAGINAÇÃO SÓ COPIAR ESSA PARTE MUDAR A URL E COLOCAR OS PARAMETROS EM named_params
          // O STATUS EU NÃO PASSO PARA O A CONSULTA É APENAS PARA MANTER AS INFORMAÇÕES APÓS CLICAR NO LINK DA PAGINAÇÃO
          // CASO CONTRÁRIO TODA VEZ QUE CLICASSE NO LINK DA PAGINAÇÃO ELE VOLTA PARA O VALOR PADRÃO DO CAMPO DE BUSCA
          if(isset($_GET['page']))
          {
              //ENTRA AQUI SE FOR CLICADO PELO LINK DA PAGINAÇÃO
              $page = $_GET['page'];   
              
              // $_GET['status'] VEM LÁ DO LINK DA PAGINAÇÃO
              $status = $_GET['status'];
              // SE ENTROU AQUI É PQ FOI CLICADO NO LINK DA PAGINAÇÃO ENTÃO PARA MANTER O VALOR ATUAL DA BUSCA PASSO O VALOR DO GET PARA O POST
              $_POST['buscastatus'] = $status;

               
              // etapa_id vem lá do get &etapa_id
               $etapa_id = $_GET['etapa_id'];               
               $_POST['buscaetapa'] =  $etapa_id;

               $nome =$_GET['nome'];
               $_POST['buscanome'] =  $nome;
              
          }
          else
          {                
              // SE ENTROU AQUI É QUE FOI CARREGADO A PÁGINA PELA PRIMEIRA VEZ OU FOI CLICADO EM ATUALIZAR
              // LOGO SE TENHO ALGUM VALOR NO POST DE BUSCA PASSO PARA A VARIÁVEL STATUS E POR FIM SE AINDA ASSIM 
              //A VARIÁVEL ESTIVER VAZIA PASSO O VALOR PADRÃO 'Todos'
              $status = $_POST['buscastatus'];
              if(!isset($status)){                
                  $status = 'Todos';
              }

              $etapa_id = $_POST['buscaetapa'];

              $nome = $_POST['buscanome'];

              $page = 1;
          }      
                          
        
          
          $options = array(
              'results_per_page' => 10,
              'url' => URLROOT . '/admins/index.php?page=*VAR*&status=' . $status . '&etapa_id=' . $etapa_id . '&nome=' . $nome,
              'named_params' => array(
                                      ':status' => $status,
                                       ':etapa_id' => $etapa_id,
                                       ':nome' => $nome
                                     )     
          );
        
         

          $paginate = $this->adminModel->getFilaBusca($page, $options);

          
          
          
          $data['paginate'] =  $paginate;        
          //FIM PARTE PAGINAÇÃO RETORNANDO O ARRAY $data['paginate']  QUE VAI PARA A VARIÁVEL $paginate DO VIEW NESSE CASO O INDEX          
                       

            // 4 Chama o view passando os dados
            $this->view('admins/index', $data);
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