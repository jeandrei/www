<?php
 class Buscadadosescolars extends Controller {
    public function __construct(){                
        //isLoggedIn do arquivo session_helper.php
        if(!isLoggedIn()){
          redirect('users/login');
        }
       
     $this->buscadadosescolarsModel = $this->model('Buscadadosescolar');
     $this->anualModel = $this->model('Anual');
     $this->dataModel = $this->model('Datauser');
    }



    /**
 * CADA CONTROLLER TEM QUE TER SEU PRÓPRIO DIRETÓRIO DENTRO DE VIEWS
 * EX TEM CONTROLLER pages logo tem que ter um diretório pages
*/


  // Lá no arquivo libraries/Core.php definimos que o metodo padrão é index
  // então se não passar nada na url ele vai ler o método abaixo Index()
  // Ao qual chama o view('index') que é o arquivo /views/index.php
  // no arquivo Controller ele monta o  require_once '../app/views/' . $view . '.php';
  // onde a variável $view vai ser index e concatenando fica index.php
  //url /mvc/pages
  public function index(){ 
      
      $limit = 10;
      $data = [
          'title' => 'Busca por alunos',
          'description' => 'Busca por registros de alunos'          
      ];

      

      

      // INÍCIO PARTE PAGINAÇÃO SÓ COPIAR ESSA PARTE MUDAR A URL E COLOCAR OS PARAMETROS EM named_params
      // O STATUS EU NÃO PASSO PARA O A CONSULTA É APENAS PARA MANTER AS INFORMAÇÕES APÓS CLICAR NO LINK DA PAGINAÇÃO
      // CASO CONTRÁRIO TODA VEZ QUE CLICASSE NO LINK DA PAGINAÇÃO ELE VOLTA PARA O VALOR PADRÃO DO CAMPO DE BUSCA
      if(isset($_GET['page']))
      {
          //ENTRA AQUI SE FOR CLICADO PELO LINK DA PAGINAÇÃO
          $page = $_GET['page']; 
         
          
          $nome =$_GET['nome'];
          $_POST['buscanome'] =  $nome;
          
      }
      else
      {           
          // SE ENTROU AQUI É QUE FOI CARREGADO A PÁGINA PELA PRIMEIRA VEZ OU FOI CLICADO EM ATUALIZAR
          // LOGO SE TENHO ALGUM VALOR NO POST DE BUSCA PASSO PARA A VARIÁVEL STATUS E POR FIM SE AINDA ASSIM 
          //A VARIÁVEL ESTIVER VAZIA PASSO O VALOR PADRÃO 'Todos'
          $nome = $_POST['buscanome'];
          $escola_id = $_POST['escola_id'];
          $ano = $_POST['ano'];
          

          $page = 1;
      }      
                      
     
      
      $options = array(
          'results_per_page' => 10,
          'url' => URLROOT . '/buscadatausers/index.php?page=*VAR*&nome=' . $nome . '&ano=' . $ano . '&escola_id=' . $escola_id,
          'named_params' => array(
                                    ':nome' => $nome,
                                    ':escola_id' => $escola_id,
                                    ':ano' => $ano
                                )     
      );

      
          $paginate = $this->buscadadosescolarsModel->getDados($page, $options);
     
      


      if($paginate->success == true)
      {             
          // $data['paginate'] é só a parte da paginação tem que passar os dois arraya paginate e result
          $data['paginate'] = $paginate;
          // $result são os dados propriamente dito depois eu fasso um foreach para passar
          // os valores como posição que utilizo um métido para pegar
          $results = $paginate->resultset->fetchAll();
          
          
      }       



      
      
      $data['results'] =  $results;        
      //FIM PARTE PAGINAÇÃO RETORNANDO O ARRAY $data['paginate']  QUE VAI PARA A VARIÁVEL $paginate DO VIEW NESSE CASO O INDEX

     //método view está em /libraries/Controller
     $this->view('buscadadosescolars/index' ,$data);
  }

  
}//class