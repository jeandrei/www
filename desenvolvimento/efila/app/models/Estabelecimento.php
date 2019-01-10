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


/*
    public function updatePost($data){
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);        
        $this->db->bind(':body', $data['body']);    
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }
*/
    public function getEstabelecimentosById($id){
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