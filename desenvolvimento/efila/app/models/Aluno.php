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

    public function getInscricoes($id){
        $this->db->query('SELECT                             
                            insc.aluno_id as id_aluno    
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
        //converte o objeto em um array simples para depois utilizar a 
        //função in_array do php para verificar se o aluno já está inscrito
        //aqui ele vai retornar apenas os alunos inscritos
        //então na hora de montar a tabela e exibir o botão de inscrição
        //verifica se o registro que vai ser exibido na tabela possui inscrição
        //se possuir não apresenta o botão inscrever
        $inscricoes = $this->db->resultSet();
        foreach ($inscricoes as $registro){
            $results[] = $registro->id_aluno;
        }

        return $results;
    }



  }