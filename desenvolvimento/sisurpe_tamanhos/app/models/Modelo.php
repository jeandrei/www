<?php
//aula 31 do curso
    class Modelo {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }  
        
        public function getPessoas($page,$item_per_pag){
            $this->db->query("SELECT * FROM pessoas LIMIT $page, $item_per_pag");
    
            return $this->db->resultSet();
        }        
    


    }
    
?>