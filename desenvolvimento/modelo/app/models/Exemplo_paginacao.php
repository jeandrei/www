<?php
//aula 31 do curso   

    class Exemplo_paginacao extends Pagination{
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
           
        } 
        

        public function getfila($page, $options){            
            $paginate = new pagination($page, "SELECT * FROM fila ORDER BY id", $options);
            return  $paginate;

        }

        public function teste(){
            echo "isso é um teste";
        }
    
         
        
    }  
?>