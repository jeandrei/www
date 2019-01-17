<?php
  class Inscricao {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    public function getInscricoes($id){
        $this->db->query('SELECT 
                            insc.id,
                            insc.fila_id,
                            insc.aluno_id,
                            insc.ordem_fila,
                            fila.id as id_fila,
                            fila.status as status,
                            atendimento.id,
                            atendimento.descricao,
                            aluno.id as id_aluno,
                            aluno.nome as nome,
                            users.id as id_usuario

                          FROM 
                            inscricoes insc, 
                            fila, 
                            atendimento, 
                            aluno, 
                            users
                          WHERE
                            insc.fila_id = fila.id
                         AND
                            fila.atendimento_id = atendimento.id
                         AND
                            insc.aluno_id = aluno.id
                         AND
                            aluno.usuario_id = users.id
                         AND
                            users.id = :id;                      
                          ORDER BY aluno.nome DESC
                          ');
        
        $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function addInscricao($data){
        $this->db->query('INSERT INTO Inscricao (nome, endereco) VALUES (:nome, :endereco)');
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

    public function updateInscricao($data){        
        $this->db->query('UPDATE Inscricao SET nome = :nome, endereco = :endereco WHERE id = :id');
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

    public function getInscricaoById($id){
        $this->db->query('SELECT * FROM Inscricao WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteInscricao($id){
        $this->db->query('DELETE FROM Inscricao WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);          
        
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
                            AND
                                fila.status = "ativo"

                            ORDER BY atendimento.descricao DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }


    public function getEstabelecimentos(){
        $this->db->query('SELECT *
                          FROM estabelecimento                          
                          ORDER BY nome DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }




  }