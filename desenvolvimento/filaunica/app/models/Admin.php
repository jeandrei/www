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
            
            
            
            $this->db->bind(':protocolo',$protocolo);
           
           
            $row = $this->db->single();  
           
            if($this->db->rowCount() > 0){
                $data = [
                    'registro' => $row->registro,
                    'nome' => $row->nome,
                    'responsavel' => $row->responsavel,
                    'nascimento' => $row->nascimento,
                    'etapa' => $row->etapa,
                    'status' => $row->status,
                    'protocolo' => $row->protocolo
                    
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

    
        public function downloadres($id){
            
                $this->db->query("SELECT id,comprovanteres as dados,comprovante_res_nome as nome,comprovanteres_tipo as tipo  FROM fila WHERE id = $_GET[id]");
                $this->db->bind(':id',$id); 
                $row = $this->db->single();
                
           
            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }                   

        }


        public function downloadnasc($id){
          
                
                $this->db->query("SELECT id,comprovantenasc as dados,comprovante_nasc_nome as nome,comprovantenasc_tipo as tipo  FROM fila WHERE id = $_GET[id]");
                $this->db->bind(':id',$id); 
                $row = $this->db->single(); 
            
            
            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }                   

        }

        //Aqui já executo a sql com o id e status passado pelo método updateStatus
        public function changeStatus($id,$status){
            $this->db->query('UPDATE fila SET fila.status=:status WHERE id=:id');
            $this->db->bind(':id',$id); 
            $this->db->bind(':status',$status); 
            $this->db->execute();
        }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}