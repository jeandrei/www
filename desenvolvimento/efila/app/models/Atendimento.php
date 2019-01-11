<?php
  class Atendimento {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    public function getAtendimentos(){
        $this->db->query('SELECT atendimento.id as id, descricao, idade_minima, idade_maxima, estebelecimento_id, nome as nome_estabelecimento
                          FROM atendimento, estabelecimento
                          WHERE
                          atendimento.estebelecimento_id = estabelecimento.id                      
                          ORDER BY descricao DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addAtendimento($data){
        $this->db->query('INSERT INTO 
                            atendimento 
                            (descricao, estebelecimento_id, idade_minima, idade_maxima) 
                            VALUES 
                            (:descricao, :estebelecimento_id, :idade_minima, :idade_maxima)');
        // Bind values
        $this->db->bind(':descricao', $data['descricao']);
        $this->db->bind(':estebelecimento_id', $data['estebelecimento_id']);
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
    // PARA MONTAR O LISTBOX NOS FORMULÁRIOS
    public function getEstabelecimentos(){
        $this->db->query('SELECT id, nome
                          FROM estabelecimento                          
                          ORDER BY nome DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }



  }