<?php
    class Admin extends Pagination{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
       

      

        // Método para atualizar o status aqui já executo a sql com o id e status passado pelo método updateStatus      
        public function changeStatus($id,$status){
            $this->db->query('UPDATE fila SET fila.situacao_id=:situacao_id WHERE id=:id');
            $this->db->bind(':id',$id); 
            $this->db->bind(':situacao_id',$status); 
            $this->db->execute();            
        }
    
    
        // Grava o histórico       
        public function gravaHistorico($id,$status,$historico,$usuario){
            $this->changeStatus($id,$status);
            $this->db->query('INSERT INTO historico_id_fila(fila_id, historico, usuario, situacao_id) VALUES (:fila_id, :historico, :usuario, :situacao_id)');
            $this->db->bind(':fila_id',$id); 
            $this->db->bind(':historico',$historico); 
            $this->db->bind(':usuario',$usuario); 
            $this->db->bind(':situacao_id',$status);             
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Pega o Histórico a partir do id
        public function getHistoricoById($id) {
            $this->db->query("SELECT * FROM historico_id_fila WHERE fila_id = :fila_id ORDER BY registro DESC");
            $this->db->bind(':fila_id',$id);     
        
            $result = $this->db->resultSet();
            
            //verifica se obteve algum resultado
            if($result >0)
            {
                foreach ($result as $row)
                {
                $data[] = array(  
                        'fila_id' => $row->fila_id,
                        'situacao_id' => $row->situacao_id,
                        'historico' => $row->historico,
                        'id' => $row->id,
                        'registro' => date('d/m/Y h:i:s', strtotime($row->registro)),
                        'usuario' => $row->usuario
                    );
                }
                return $data;
            }
            else
            {
                return false;
            }   
            
            
        }
        

        //FUNÇÃO QUE EXECUTA A SQL PAGINATE
        public function getFilaBusca($page, $options){           
            $sql = "SELECT *,  (SELECT descricao FROM etapa WHERE fila.nascimento>=data_ini AND fila.nascimento<=data_fin) as etapa FROM fila";           
            
            // SE A ETAPA É IGUAL A TODOS EU CLOCO O COMANDO WHERE FILA.ID QUE TRAZ TODOS OS REGISTROS
            if(($options['named_params'][':etapa_id']) == "Todos"){                    
                $sql .= " WHERE fila.id";
            } else {
                // SE FOR DIFERENTE DE TODOS QUER DIZER QUE O USUÁRIOS SELECIONOU ALGUM OUTRO VALOR DAÍ EU MONTO A SQL
                $sql .= " WHERE (SELECT id FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) = " . $options['named_params'][':etapa_id'];          
               
            }

            if(!empty($options['named_params'][':nome'])){
                $sql .= " AND nomecrianca LIKE " . "'%" . $options['named_params'][':nome'] . "%'";
            }
          

            if(($options['named_params'][':situacao_id']) <> "Todos"){
                $sql .= " AND situacao_id = " . "'" . $options['named_params'][':situacao_id'] ."'";
            }
            
             

            $sql .= " ORDER BY registro ASC";        

               
            $paginate = new pagination($page, $sql, $options);
            return  $paginate;
        }  
        
        //FUNÇÃO QUE EXECUTA A SQL PAGINATE
        public function getFilaTodos($page, $options){              
            $paginate = new pagination($page, "SELECT * FROM fila ORDER BY id", $options);
            return  $paginate;
        }  
    
}