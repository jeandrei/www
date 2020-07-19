<?php
  class Fila {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    public function getFilas(){
        $this->db->query('SELECT 
                                estabelecimento.nome as estabelecimento, 
                                atendimento.descricao as atendimento, 
                                atendimento.idade_minima,
                                atendimento.idade_maxima,
                                fila.dataini,
                                fila.datafim,
                                fila.status

                            FROM 
                                estabelecimento, atendimento, fila
                            WHERE
                                atendimento.estabelecimento_id = estabelecimento.id  
                            AND
                                fila.estabelecimento_id = estabelecimento.id
                            AND
                                fila.atedimento_id = atendimento.id

                            ORDER BY estabelecimento.nome DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addFila($data){
        $this->db->query('INSERT INTO 
                            fila 
                            (estabelecimento_id, atedimento_id, dataini, datafim) 
                            VALUES 
                            (:estabelecimento_id, :atedimento_id, :dataini, :datafim)');
        // Bind values
        $this->db->bind(':estabelecimento_id', $data['estabelecimento_id']);
        $this->db->bind(':atedimento_id', $data['atedimento_id']);
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
    // PARA MONTAR O LISTBOX NOS FORMULÁRIOS
    public function getEstabelecimentos(){
        $this->db->query('SELECT id, nome
                          FROM estabelecimento                          
                          ORDER BY nome DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }



    public function getAtendimentos(){
        $this->db->query('SELECT id, descricao
                          FROM atendimento                                                
                          ORDER BY descricao DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    //3 combobox
    //faz a pesquisa no banco com base no id passado pela função
    public function getAtendimentosByIdEstabelecimento($id){
        $this->db->query('SELECT id, descricao
        FROM atendimento      
        WHERE estabelecimento_id = :id                                         
        ORDER BY descricao DESC
        ');
    $this->db->bind(':id', $id);

    $results = $this->db->resultSet();

    return $results;
}


  }

  