<?php
//aula 31 do curso
    class Lista {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }



        public function getLastid(){
            $this->db->query("SELECT max(id) as id FROM fila");             
            $lastId = $this->db->single();
            return $lastId->id;            
        }


        
       public function getFilaPorEtapaRelatorio($etapa_id,$situacao_id) {   
            $this->db->query("SET @contador = 0");
           // $stmt = $pdo->prepare($sql);
            $this->db->execute();
            
            $this->db->query("
                    SELECT 
                        (SELECT @contador := @contador +1) as posicao,                    
                        fila.registro as registro, 
                        fila.responsavel as responsavel, 
                        fila.nomecrianca as nome, 
                        fila.nascimento as nascimento,
                        fila.protocolo as protocolo,  
                        (SELECT descricao FROM situacao WHERE fila.situacao_id = id) as status,               
                        (SELECT descricao FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) as etapa
                    FROM 
                        fila 
                    WHERE
                        (SELECT id FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) = :etapa_id 
                    AND
                        fila.situacao_id = :reg_situacao
                    ORDER BY
                        fila.registro        
                    ");
            
            $this->db->bind(':reg_situacao', $situacao_id);
            $this->db->bind(':etapa_id', $etapa_id);        
            
            
            $result = $this->db->resultSet();   
            
        
            //verifica se obteve algum resultado
            if($this->db->rowCount() > 0)
            {
                foreach ($result as $row){
                    $aguardando[] = array(
                        "posicao" => $row->posicao . "º",
                        "registro" => date('d/m/Y h:i:s', strtotime($row->registro)),
                        "responsavel" => $row->responsavel,
                        "nome" => $row->nome,
                        "nascimento" => date('d/m/Y', strtotime($row->nascimento)), 
                        "etapa" => $row->etapa,
                        "protocolo" => $row->protocolo                        
                    );
                }
            
            return $aguardando;
            }
            else
            {
                return false;
            } 
        }      
        
        
    
    
    }