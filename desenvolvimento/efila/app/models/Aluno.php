<?php
  class Aluno {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    public function getAlunos($id_user){
        $this->db->query('SELECT *
                          FROM aluno 
                          WHERE
                          usuario_id = :usuario_id;                         
                          ORDER BY nome DESC
                          ');
        
        $this->db->bind(':usuario_id', $id_user);

        $results = $this->db->resultSet();

        return $results;
    }

    public function addAluno($data){
        //die(var_dump($data));
        $this->db->query('INSERT INTO 
                                aluno (
                                    usuario_id, 
                                    nome, 
                                    nascimento, 
                                    endereco
                                    ) 
                            VALUES 
                                    (
                                    :usuario_id, 
                                    :nome, 
                                    :nascimento,
                                    :endereco
                                    )                                                        
                        ');
        // Bind values
        
        $this->db->bind(':usuario_id', $data['usuario_id']);
        $this->db->bind(':nome', $data['nome']);
        $this->db->bind(':nascimento', $data['nascimento']);  
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