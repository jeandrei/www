<?php
  class Aluno {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    public function getAlunos(){
        $this->db->query('SELECT *
                          FROM aluno                          
                          ORDER BY nome DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addAluno($data){
        $this->db->query('INSERT INTO aluno (nome, endereco) VALUES (:nome, :endereco)');
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

    public function updateAluno($data){        
        $this->db->query('UPDATE aluno SET nome = :nome, endereco = :endereco WHERE id = :id');
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

    public function getAlunoById($id){
        $this->db->query('SELECT * FROM aluno WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteAluno($id){
        $this->db->query('DELETE FROM aluno WHERE id = :id');
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