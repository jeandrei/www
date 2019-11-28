<?php 

   

    class Listas extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado Fila.php e incluir
            $this->listaModel = $this->model('Lista');
        }

        public function listachamada(){
            //$this->view('listas/listachamada');
            $this->view('listas/listachamada2');
        }



    }