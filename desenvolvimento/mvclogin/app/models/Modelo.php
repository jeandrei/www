<?php
//aula 31 do curso
    class Modelo {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }  
        
        public function getPessoas(){
            $this->db->query("SELECT * FROM pessoas");
    
            return $this->db->resultSet();
        }        
    


    }
    
?>