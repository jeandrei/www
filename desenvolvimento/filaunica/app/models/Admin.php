<?php
    class Admin{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        

        public function getFila($nome=NULL) {
            $this->db->query("
                    SELECT 
                        fila.id as fila_id,     
                        fila.registro as registro, 
                        fila.responsavel as responsavel, 
                        fila.nomecrianca as nome, 
                        fila.nascimento as nascimento,
                        fila.protocolo as protocolo,
                        fila.comprovanteres,
                        fila.comprovante_res_nome,
                        fila.comprovanteres_tipo,
                        fila.comprovantenasc,
                        fila.comprovantenasc_tipo,
                        fila.comprovante_nasc_nome,
                        fila.status as status,
                        (SELECT descricao FROM etapa WHERE fila.nascimento>=data_ini AND fila.nascimento<=data_fin) as etapa
                        
                    FROM                               
                        fila"
            );
        
            
            if($nome <> NULL){
                $this->db->query .= " WHERE fila.nomecrianca LIKE '%$nome%'";   
            }
        
        
            $result = $this->db->resultSet();
            
            //verifica se obteve algum resultado
            if($result >0)
            {
                foreach ($result as $row)
                {
                $data[] = array(  
                        'fila_id' => $row->fila_id,
                        'registro' => $row->registro,
                        'nome' => $row->nome,
                        'responsavel' => $row->responsavel,
                        'nascimento' => $row->nascimento,
                        'etapa' => $row->etapa,
                        'protocolo' => $row->protocolo,
                        'comprovante_res_nome' => $row->comprovante_res_nome,
                        'comprovante_nasc_nome' => $row->comprovante_nasc_nome,
                        'status' => $row->status  
                    );
                }
                return $data;
            }
            else
            {
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
            
            
            
            $this->db->bind(':protocolo',$data['protocolo']);
           
           
            $result = $this->db->resultSet();
            $count = (is_array($result) ? count($result) : 0);
            if($count > 0){
                $data = [
                    'registro' => $result->registro,
                    'nome' => $result->nome,
                    'responsavel' => $result->responsavel,
                    'nascimento' => $result->nascimento,
                    'etapa' => $result->etapa,
                    'status' => $result->status
                    
                ];
                return $data;
            }
            else{
                return false;
            }
        }








        function buscaPosicaoFila($protocolo) {
                $this->db->query(' 
                                    SELECT 
                                            count(fila.id) as posicao
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
                                            fila.status = "Aguardando"                            
            
                                ');
            
            
            
            $this->db->bind(':protocolo',$protocolo);
            
            $row = $this->db->single();           
            
            if($this->db->rowCount() > 0){
                return $row->posicao . 'º';
            } else {
                return false;
            }       
            
           
        }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}