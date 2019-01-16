<?php
  class Fila {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    public function getFilas(){
        $this->db->query('SELECT
                                fila.id as id,
                                atendimento.descricao as atendimento, 
                                atendimento.idade_minima,
                                atendimento.idade_maxima,
                                fila.dataini,
                                fila.datafim,
                                fila.status

                            FROM 
                                atendimento, fila
                            WHERE 
                                fila.atendimento_id = atendimento.id

                            ORDER BY atendimento.descricao DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addFila($data){
        $this->db->query('INSERT INTO 
                            fila 
                            (atendimento_id, dataini, datafim) 
                            VALUES 
                            (:atendimento_id, :dataini, :datafim)');
        // Bind values
        $this->db->bind(':atendimento_id', $data['atendimento_id']);
        $this->db->bind(':dataini', $data['dataini']);         
        $this->db->bind(':datafim', $data['datafim']);
               
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    public function updateFila($data){       
        $this->db->query('UPDATE fila SET atendimento_id = :atendimento_id, dataini = :dataini, datafim = :datafim , status = :status WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':atendimento_id', $data['atendimento_id']);        
        $this->db->bind(':dataini', $data['dataini']);    
        $this->db->bind(':datafim', $data['datafim']);  
        $this->db->bind(':status', $data['status']);  
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    public function getFilaById($id){
        $this->db->query('SELECT * FROM fila WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteFila($id){
        $this->db->query('DELETE FROM fila WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);          
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }
    
    public function getAtendimentos(){
        $this->db->query('SELECT id as atendimento_id, descricao
                          FROM atendimento                                                
                          ORDER BY descricao DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

  }

  