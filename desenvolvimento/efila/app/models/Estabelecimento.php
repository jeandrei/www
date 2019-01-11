<?php
  class Estabelecimento {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    public function getEstabelecimentos(){
        $this->db->query('SELECT *
                          FROM estabelecimento                          
                          ORDER BY nome DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addEstabelecimento($data){
        $this->db->query('INSERT INTO estabelecimento (nome, endereco) VALUES (:nome, :endereco)');
        // Bind values
        $this->db->bind(':nome', $data['nome']);
        $this->db->bind(':endereco', $data['endereco']);         
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    public function updateEstabelecimento($data){        
        $this->db->query('UPDATE estabelecimento SET nome = :nome, endereco = :endereco WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nome', $data['nome']);        
        $this->db->bind(':endereco', $data['endereco']);    
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    public function getEstabelecimentoById($id){
        $this->db->query('SELECT * FROM estabelecimento WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteEstabelecimento($id){
        $this->db->query('DELETE FROM estabelecimento WHERE id = :id');
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