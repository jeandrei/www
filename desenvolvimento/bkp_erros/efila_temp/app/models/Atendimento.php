<?php
  class Atendimento {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    public function getAtendimentos(){
        $this->db->query('SELECT atendimento.id as id, descricao, idade_minima, idade_maxima
                          FROM atendimento                                               
                          ORDER BY descricao DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addAtendimento($data){
        $this->db->query('INSERT INTO 
                            atendimento 
                            (descricao, idade_minima, idade_maxima) 
                            VALUES 
                            (:descricao, :idade_minima, :idade_maxima)');
        // Bind values
        $this->db->bind(':descricao', $data['descricao']);       
        $this->db->bind(':idade_minima', $data['idade_minima']);         
        $this->db->bind(':idade_maxima', $data['idade_maxima']);
               
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    public function updateAtendimento($data){
        
        $this->db->query('UPDATE atendimento SET descricao = :descricao, idade_minima = :idade_minima, idade_maxima = :idade_maxima WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':descricao', $data['descricao']);
        $this->db->bind(':idade_minima', $data['idade_minima']);        
        $this->db->bind(':idade_maxima', $data['idade_maxima']);    
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    public function getAtendimentoById($id){
        $this->db->query('SELECT * FROM atendimento WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteAtendimento($id){
        $this->db->query('DELETE FROM atendimento WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);          
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }
    
  }