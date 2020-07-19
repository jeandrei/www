<?php
//aula 31 do curso
    class Jquery {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        } 
        
        public function addEstado($estado){
           // se o estado vim vazio já retorno falso e trato a menságem no controller
            if(empty($estado)){
                return false;
            }

            $this->db->query('INSERT INTO estados (estado) VALUES (:estado)');
            // Bind values
            $this->db->bind(':estado',$estado);   
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function addMunicipio($estado_id, $municipio){
            // se o estado vim vazio já retorno falso e trato a menságem no controller
             if(empty($municipio)){
                 return false;
             }
            
             $this->db->query('INSERT INTO municipios (estado_id, municipio) VALUES (:estado_id, :municipio)');  
             $this->db->bind(':municipio',$municipio); 
             $this->db->bind(':estado_id',$estado_id); 
             if($this->db->execute()){
                 return true;
             } else {
                 return false;
             }
 
         }


       


    
    }