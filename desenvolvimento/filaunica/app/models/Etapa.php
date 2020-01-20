<?php
//aula 31 do curso
    class Etapa {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }

        // Registra Etapa
        public function register($data){
            $this->db->query('INSERT INTO etapa (data_ini, data_fin, descricao) VALUES (:data_ini, :data_fin, :descricao)');
            // Bind values
            $this->db->bind(':data_ini',$data['data_ini']);
            $this->db->bind(':data_fin',$data['data_fin']);
            $this->db->bind(':descricao',$data['descricao']);            

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
     
         // Busca etapa por id
         public function getEtapaByid($id){
            $this->db->query('SELECT * FROM etapa WHERE id = :id');
            // Bind value
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        


         // Deleta etapa por id
         public function delEtapaByid($id){
            $this->db->query('DELETE FROM etapa WHERE id = :id');
            // Bind value
            $this->db->bind(':id', $id);

            $row = $this->db->execute();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        

        // get etapas
        public function getEtapas(){
            $this->db->query('SELECT * FROM etapa');            

            return $this->db->resultSet();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // VERIFICA SE JÁ EXISTE ALGUM REGISTRO NA FILA COM ESTA ETAPA
        // NÃO PODE REMOVER ETAPA COM REGISTROS NA FILA
        public function etapaRegFila($id){
            $this->db->query('SELECT * FROM fila WHERE nascimento BETWEEN (SELECT data_ini FROM etapa WHERE id = :id) AND (SELECT data_fin FROM etapa WHERE id = :id)');
            $this->db->bind(':id', $id);
           
            return $this->db->resultSet();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }


        public function fale(){
            echo "oi";
        }

        // VERIFICA SE A DATA INICIAL PASSADA ESTÁ ENTRE ALGUMA DATA DE INICIO E FIM DE TODAS AS ETAPAS
        public function etapaDataIni($dataini,$datafin){
            // pego todas as etapas
            $etapas = $this->getEtapas();           
                $this->db->query('SELECT * FROM etapa WHERE data_ini BETWEEN :dataini AND :datafin');
                $this->db->bind(':dataini', $dataini);
                $this->db->bind(':datafin', $datafin);              
                return $this->db->resultSet();
            // Check row
            if($this->db->rowCount() > 0){
            return true;
            } else {
                return false;
            }

        }

         // VERIFICA SE A DATA FINAL PASSADA ESTÁ ENTRE ALGUMA DATA DE INICIO E FIM DE TODAS AS ETAPAS
         public function etapaDataFin($dataini,$datafin){
            // pego todas as etapas
            $etapas = $this->getEtapas();           
                $this->db->query('SELECT * FROM etapa WHERE data_fin BETWEEN :dataini AND :datafin');
                $this->db->bind(':dataini', $dataini);
                $this->db->bind(':datafin', $datafin);              
                return $this->db->resultSet();
            // Check row
            if($this->db->rowCount() > 0){
            return true;
            } else {
                return false;
            }

        }

    }//etapa
    
?>