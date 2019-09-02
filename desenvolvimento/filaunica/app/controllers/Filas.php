<?php 
    class Filas extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado Fila.php e incluir
            $this->filaModel = $this->model('Fila');
        }

        public function cadastrar(){
            //pega todos os bairros
            $bairros = $this->filaModel->getBairros();
            //pega todas as escolas
            $escolas = $this->filaModel->getEscolas();

            var_dump($_POST);

            // Check for POST            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                
                $data = [
                    'bairros' => $bairros,
                    'rua' => html($_POST['rua']),
                    'bairroSelecionado' => 8, //$_POST['bairro'],
                    'escolas' => $escolas,
                    'escola1Selecionada' => 5,
                    'escola2Selecionada' => 7,
                    'escola3Selecionada' => 9
                ];
                $this->view('filas/cadastrar', $data);
            }else{
                $data = [
                    'bairros' => $bairros,
                    'rua' => '',
                    'bairroSelecionado' => '',
                    'escolas' => $escolas,
                    'escola1Selecionada' => '',
                    'escola2Selecionada' => '',
                    'escola3Selecionada' => ''
                ];
                $this->view('filas/cadastrar', $data);
            }
                       
            
        }

        public function consultar(){
            echo "Consultar";
        }

        public function listachamada(){
            echo "Lista de chamada";
        }
}