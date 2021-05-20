<?php
//aula 31 do curso
    class Situacao {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }

       

         // RETORNA A DESCRIÇÃO DE UMA ETAPA A PARTIR DE UM ID
         public function getDescricaoSituacao($id) {
            $this->db->query("SELECT descricao FROM situacao WHERE id = :id");
            $this->db->bind(':id', $id);    
            $row = $this->db->single();           

            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            } 
        }

        // RETORNA A SITUAÇÃO POR ID
        public function getSituacaoById($id) {  
            //pega o id da etapa
            $this->db->query("SELECT * FROM situacao WHERE id = :id");
            $this->db->bind(':nasc',$nasc);                  
            $etapa =$this->db->single();  
            if(!empty($etapa->id)){
                return $etapa->id;
            }
            else{
                return false;
            }
        
        }


        //Traz todas as situações da tabela situacao
        public function getSituacoes(){
            $this->db->query('SELECT * FROM situacao');          
           
            return $this->db->resultSet();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
    
    }

       
?>