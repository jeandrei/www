<?php

/**
 * CADA CONTROLLER TEM QUE TER SEU PRÓPRIO DIRETÓRIO DENTRO DE VIEWS
 * EX TEM CONTROLLER pages logo tem que ter um diretório pages
*/


class Exemplo_paginacaos extends Controller{
    public function __construct(){
    //vai procurar na pasta model um arquivo chamado User.php e incluir
    $this->pagModel = $this->model('Exemplo_paginacao');               
    }

    // Lá no arquivo libraries/Core.php definimos que o metodo padrão é index
    // então se não passar nada na url ele vai ler o método abaixo Index()
    // Ao qual chama o view('index') que é o arquivo /views/index.php
    // no arquivo Controller ele monta o  require_once '../app/views/' . $view . '.php';
    // onde a variável $view vai ser index e concatenando fica index.php
    //url /mvc/pages
    public function index(){ 
        
        $limit = 10;
        $data = [
            'title' => 'Paginação',
            'description' => 'Exemplo de paginação'          
        ];

        

        

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

            $page = 1;
        }      
                        
       
        
        $options = array(
            'results_per_page' => 10,
            'url' => URLROOT . '/exemplo_paginacaos/index.php?page=*VAR*&status=' . $status,
            'named_params' => array(':status' => $status)     
        );

        // SE O STATUS FOR TODOS EU EXECUTO O METODO getfilaTodos CASO CONTRÁRIO TRAGO COM OS FILTROS getFilaBusca
        if($status == 'Todos'){
            $paginate = $this->pagModel->getfilaTodos($page, $options);
        } else {
            $paginate = $this->pagModel->getFilaBusca($page, $options);
        }
        


        if($paginate->success == true)
        {             
            // $data['paginate'] é só a parte da paginação tem que passar os dois arraya paginate e result
            $data['paginate'] = $paginate;
            // $result são os dados propriamente dito depois eu fasso um foreach para passar
            // os valores como posição que utilizo um métido para pegar
            $results = $paginate->resultset->fetchAll();
            
            /* SE PRECISAR PASSAR VALORES ESPECÍFICOS QUE VEM DE METODOS DAÍ TEM QUE FAZER COMO ESTÁ ABAIXO E DAÍ RETORNA $data['results'] DIRETO
            SEM ESSA LINHA   $data['results'] =  $results;
            if(!empty($results)){
              //faço o foreach para poder utilizar os métodos
              foreach($results as $result){
                $data['results'][] = [
                  'id' => $result['id'],
                  'posicao' =>  ($this->adminModel->buscaPosicaoFila($result['protocolo'])) ? $this->adminModel->buscaPosicaoFila($result['protocolo']) : "-",
                  'etapa' => ($this->adminModel->getEtapaDescricao($result['nascimento'])) ? $this->adminModel->getEtapaDescricao($result['nascimento']) : "FORA DE TODAS AS ETAPAS",
                  'nomecrianca' => $result['nomecrianca'],
                  'nascimento' => date('d/m/Y', strtotime($result['nascimento'])),
                  'responsavel' => $result['responsavel'],
                  'protocolo' => $result['protocolo'],
                  'registro' => date('d/m/Y h:i:s', strtotime($result['registro'])),
                  'telefone' => $result['telefone'],
                  'celular' => $result['celular'],
                  'status' => $result['status']
                ];
              }
            } else {
              $data['results'] = false;
            }*/
        }       



        
        
        $data['results'] =  $results;        
        //FIM PARTE PAGINAÇÃO RETORNANDO O ARRAY $data['paginate']  QUE VAI PARA A VARIÁVEL $paginate DO VIEW NESSE CASO O INDEX
  
       //método view está em /libraries/Controller
       $this->view('exemplo_paginacao/index' ,$data);
    }  
    
}