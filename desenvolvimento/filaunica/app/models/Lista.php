<?php
//aula 31 do curso
    class Lista {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }

        
        
        public function getEtapa($nasc) {
            //verifica se tem mínimo de 4 meses
            $this->db->query("SELECT TIMESTAMPDIFF(MONTH, :datanasc, NOW()) AS meses");
            $this->db->bind(':datanasc',$nasc); 
            $num_meses = $this->db->single();            
            
            if($num_meses->meses<4){        
                return false;
            }
        
            //pega o id da etapa
            $this->db->query("SELECT * FROM etapa WHERE :nasc>=data_ini AND :nasc<=data_fin");
            $this->db->bind(':nasc',$nasc);                  
            $etapa =$this->db->single();  
            if(!empty($etapa->id)){
                return $etapa->id;
            }
            else{
                return false;
            }
        
        }





        public function getEtapas() {
            $this->db->query("SELECT * FROM etapa ORDER BY descricao");
            $result = $this->db->resultSet();
            
                
            
            foreach ($result as $row)
            {
            $etapas[] = array(
                'id' => $row->id,
                'data_ini' => $row->data_ini,
                'data_fin' => $row->data_fin,
                'descricao' => $row->descricao
            );
            }
        return $etapas;
        }





        public function getLastid(){
            $this->db->query("SELECT max(id) as id FROM fila");             
            $lastId = $this->db->single();
            return $lastId->id;            
        }



       

        





        public function buscaPosicaoFila($protocolo) {
            $this->db->query("  
                                    SELECT 
                                            count(fila.id) as posicaonafila,
                                            (SELECT fila.status FROM fila WHERE fila.protocolo=:protocolo) as statusprotocolo
                                    FROM 
                                            fila, etapa
                                    WHERE 
                                            fila.nascimento>=data_ini
                                    AND 
                                            fila.nascimento<=data_fin
                                    AND 
                                            etapa.id = (
                                                        SELECT 
                                                            etapa.id 
                                                        FROM etapa,
                                                            fila 
                                                        WHERE 
                                                            fila.nascimento>=data_ini
                                                        AND 
                                                            fila.nascimento<=data_fin
                                                        AND 
                                                            fila.protocolo = :protocolo
                                                    )
                                    AND 
                                            fila.registro <= (SELECT fila.registro FROM fila WHERE fila.protocolo = :protocolo)
                                    AND
                                            fila.status = 'Aguardando'                            
            
                                ");
            
            
            
            $this->db->bind(':protocolo', $protocolo);
            
            $row = $this->db->single();           

            if($row->statusprotocolo == "Aguardando"){
                return $row;
            } else {
                return false;
            } 
           
        }








        public function getDescricaoEtapa($id) {
            $this->db->query("SELECT descricao FROM etapa WHERE id = :id");
            $this->db->bind(':id', $id);    
            $row = $this->db->single();           

            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            } 
        }









        public function buscaProtocolo($protocolo) {
            $this->db->query("
                                    SELECT      
                                        fila.registro as registro, 
                                        fila.responsavel as responsavel, 
                                        fila.nomecrianca as nome, 
                                        fila.nascimento as nascimento,
                                        fila.protocolo as protocolo,
                                        fila.status as status,
                                        (SELECT descricao FROM etapa WHERE fila.nascimento>=data_ini AND fila.nascimento<=data_fin) as etapa
                                        
                                    FROM                               
                                        fila 
                                    WHERE 
                                        fila.protocolo=:protocolo
                                ");
            
            
            $this->db->bind(':protocolo', $protocolo);
            $row = $this->db->single(); 
            
            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }  
        }






        
       public function getFilaPorEtapaRelatorio($etapa_id,$status) {   
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
                        (SELECT descricao FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) as etapa
                    FROM 
                        fila 
                    WHERE
                        (SELECT id FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) = :etapa_id 
                    AND
                        fila.status = :reg_status
                    ORDER BY
                        fila.registro        
                    ");
            
            $this->db->bind(':reg_status', $status);
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