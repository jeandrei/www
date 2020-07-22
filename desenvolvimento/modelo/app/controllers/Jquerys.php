<?php 
    class Jquerys extends Controller{
        


        
        public function __construct(){
                        
            // se o usuário digitar o endereço http://servidor/modelo/cadastros/new sem estar logado
            //redireciono para o login
           /* if((!isLoggedIn())){
            
                redirect('users/login');
              } 
              elseif(($_SESSION['user_type']) <> "admin")
              {
                  die("Você deve ser um administrador para acessar esta página!");
              }*/
                  
            //vai procurar na pasta model um arquivo chamado Cadastro.php e incluir
            $this->jqueryModel = $this->model('Jquery');
        }

        
        
        
        public function index(){
          
                         
           $data = [
               'teste' => 'pagina jquery'
           ];
           
            $this->view('jquerys/index', $data);
        }
       

        public function newEstado(){          
           
            try{
                
                if($this->jqueryModel->addEstado($_POST['estado'])){
                    
                    /* aqui passo a classe da mensagem e a mensagem de sucesso */
                    $json_ret = array('classe'=>'alert alert-success', 'mensagem'=>'Os dados foram gravados com sucesso');                     
                    echo json_encode($json_ret);                     
                } else {
                    $json_ret = array('classe'=>'alert alert-danger', 'mensagem'=>'Erro ao gravar os dados');                     
                    echo json_encode($json_ret);                     
                }                

            } catch (Exception $e) 
            {
                $json_ret = array('classe'=>'alert alert-danger', 'mensagem'=>'Erro ao gravar os dados');                     
                echo json_encode($json_ret);
            }
                         
            
        }


        public function newMunicipio(){          
           
            try{
                
                // DEPOIS TEM QUE TIRAR ESSE 1 AÍ DA FRENTE E COLOCAR A VARIÁVEL POST COM O ID DO MUNICIPIO
                
                if($this->jqueryModel->addMunicipio($_POST['estado_id'], $_POST['municipio'])){
                    
                    /* aqui passo a classe da mensagem e a mensagem de sucesso */
                    $json_ret = array('classe'=>'alert alert-success', 'mensagem'=>'Os dados foram gravados com sucesso');                     
                    echo json_encode($json_ret);                     
                } else {
                    $json_ret = array('classe'=>'alert alert-danger', 'mensagem'=>'Erro ao gravar os dados');                     
                    echo json_encode($json_ret);                     
                }                

            } catch (Exception $e) 
            {
                $json_ret = array('classe'=>'alert alert-danger', 'mensagem'=>'Erro ao gravar os dados');                     
                echo json_encode($json_ret);
            }
                         
            
        }



     // combo box 
     // recebe o id da linha $.get( echo URLROOT; /jquerys/getMunicipios/ + estado_id
     // lá do arquivo views/jquerys/index da junção jquery
     // passa o id para o método getMunicipios($estado_id)
     public function getMunicipios($estado_id){
        echo "<option>Selecione um município</option>";
        if (isset($estado_id)){
            //faz a pesquisa chamando o método do aqruivo /jquery/getMunicipiosEstadoId($estado_id){  
            //passando o id
            $municipios = $this->jqueryModel->getMunicipiosEstadoId($estado_id);                       
            //monta os options com base no resultado da pesquisa
            foreach($municipios as $municipio){
            echo "<option value=".$municipio->id . ">" .$municipio->municipio."</option>";
            }
            
        }
     }



       




    }