<?php
    class Admins extends Controller{
        public function __construct(){
            // 1 Chama o model
          $this->adminModel = $this->model('Admin'); 
          $this->filaModel = $this->model('Fila'); 
          $this->etapaModel = $this->model('Etapa');           
          $this->situacaoModel = $this->model('Situacao'); 
        }

        public function index(){  
          
          //se o usuário não tiver feito login redirecionamos para o index
          if(!isset($_SESSION[DB_NAME . '_user_id'])){
            redirect('index');
          }

           if(isset($_GET['page']))
          {
              //ENTRA AQUI SE FOR CLICADO PELO LINK DA PAGINAÇÃO
              $page = $_GET['page'];   
              
              // $_GET['status'] VEM LÁ DO LINK DA PAGINAÇÃO
              $situacao_id = $_GET['situacao_id'];
              // SE ENTROU AQUI É PQ FOI CLICADO NO LINK DA PAGINAÇÃO ENTÃO PARA MANTER O VALOR ATUAL DA BUSCA PASSO O VALOR DO GET PARA O POST
              $_POST['buscasituacao'] = $situacao_id;

               
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
              $situacao_id = $_POST['buscasituacao'];
              if(!isset($situacao_id)){                
                  $situacao_id = 'Todos';
              }

              $etapa_id = $_POST['buscaetapa'];
              if(!isset($etapa_id)){                
                $etapa_id = 'Todos';
            }             

              $nome = $_POST['buscanome'];

              $page = 1;
          }      
                          
        
          
          $options = array(
              'results_per_page' => 10,
              'url' => URLROOT . '/admins/index.php?page=*VAR*&situacao_id=' . $situacao_id . '&etapa_id=' . $etapa_id . '&nome=' . $nome,
              'named_params' => array(
                                      ':situacao_id' => $situacao_id,
                                      ':etapa_id' => $etapa_id,
                                      ':nome' => $nome
                                     )     
          );
        
         

          $paginate = $this->adminModel->getFilaBusca($page, $options);

          if($paginate->success == true)
          {             
              // $data['paginate'] é só a parte da paginação tem que passar os dois arraya paginate e result
              $data['paginate'] = $paginate;
              // $result são os dados propriamente dito depois eu fasso um foreach para passar
              // os valores como posição que utilizo um métido para pegar
              $results = $paginate->resultset->fetchAll();
              
              if(!empty($results)){
                //faço o foreach para poder utilizar os métodos
                foreach($results as $result){
                  $data['results'][] = [
                    'id' => $result['id'],
                    'posicao' =>  ($this->filaModel->buscaPosicaoFila($result['protocolo'])) ? $this->filaModel->buscaPosicaoFila($result['protocolo']) : "-",
                    'etapa' => ($this->etapaModel->getEtapaDescricao($result['nascimento'])) ? $this->etapaModel->getEtapaDescricao($result['nascimento']) : "FORA DE TODAS AS ETAPAS",
                    'nomecrianca' => $result['nomecrianca'],
                    'nascimento' => date('d/m/Y', strtotime($result['nascimento'])),
                    'responsavel' => $result['responsavel'],
                    'protocolo' => $result['protocolo'],
                    'registro' => date('d/m/Y h:i:s', strtotime($result['registro'])),
                    'telefone' => $result['telefone'],
                    'celular' => $result['celular'],
                    'situacao_id' => $result['situacao_id'],                    
                    'opcao1_id' => $this->filaModel->getEscolasById($result['opcao1_id'])->nome,
                    'opcao2_id' => $this->filaModel->getEscolasById($result['opcao2_id'])->nome,
                    'opcao3_id' => $this->filaModel->getEscolasById($result['opcao3_id'])->nome,
                    'opcao_turno' => $this->filaModel->getTurno($result['opcao_turno'])
                  ];
                }
              } else {
                $data['results'] = false;
              }
          }       
          
         

            // 4 Chama o view passando os dados
            $this->view('admins/index', $data);
        }
        
        

      //aqui é o método chamado pelo jquery lá no index, verifico se o id tem algum valor se sim eu chamo o método changeStatus no model
      public function gravar(){

            try{
                    
              // DEPOIS TEM QUE TIRAR ESSE 1 AÍ DA FRENTE E COLOCAR A VARIÁVEL POST COM O ID DO MUNICIPIO
              // IMPORTANTE lá na função changeStatus se executar tem que retornar true para funcionar aqui
              
              if($this->adminModel->gravaHistorico($_POST['id'],$_POST['status'],$_POST['txthist'], $_SESSION[DB_NAME . '_user_name'])){
                  
                  /* aqui passo a classe da mensagem e a mensagem de sucesso */
                  $json_ret = array('classe'=>'alert alert-success', 'mensagem'=>'Dados gravados com sucesso');                     
                  echo json_encode($json_ret);                     
              } else {
                  $json_ret = array('classe'=>'alert alert-danger', 'mensagem'=>'Erro ao tentar gravar os dados');                     
                  echo json_encode($json_ret);                     
              }                

          } catch (Exception $e) 
          {
              $json_ret = array('classe'=>'alert alert-danger', 'mensagem'=>'Erro ao gravar os dados');                     
              echo json_encode($json_ret);
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