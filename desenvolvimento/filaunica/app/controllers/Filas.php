<?php 
    class Filas extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado Fila.php e incluir
            $this->filaModel = $this->model('Fila');
        }

        public function cadastrar(){
            $this->view('filas/cadastrar', $data=0);
        }

        public function consultar(){
            echo "Consultar";
        }

        public function listachamada(){
            echo "Lista de chamada";
        }
}