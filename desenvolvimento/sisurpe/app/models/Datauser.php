<?php
  class Datauser {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    
    public function getDatauserByid($id){
        $this->db->query('SELECT *
                          FROM aluno 
                          WHERE id_aluno = :id                       
                          ');

        $this->db->bind(':id', $id);        
        $row = $this->db->single();

        return $row;
    }

    public function register($data){
        $this->db->query('INSERT INTO aluno SET
                                            user_id = :user_id,
                                            nome_aluno = :nome_aluno,
                                            nascimento = :nascimento, 
                                            sexo = :sexo, 
                                            telefone_aluno = :telefone_aluno, 
                                            email_aluno = :email_aluno, 
                                            nome_pai = :nome_pai, 
                                            telefone_pai = :telefone_pai, 
                                            nome_mae = :nome_mae, 
                                            telefone_mae = :telefone_mae, 
                                            nome_responsavel = :nome_responsavel, 
                                            telefone_resp = :telefone_resp, 
                                            naturalidade = :naturalidade, 
                                            nacionalidade = :nacionalidade, 
                                            rg = :rg, 
                                            uf_rg = :uf_rg, 
                                            orgao_emissor = :orgao_emissor, 
                                            titulo_eleitor = :titulo_eleitor, 
                                            zona = :zona, 
                                            secao = :secao, 
                                            certidao = :certidao, 
                                            uf_cert = :uf_cert, 
                                            cartorio_cert = :cartorio_cert, 
                                            modelo = :modelo,                                             
                                            folha = :folha, 
                                            livro = :livro, 
                                            data_emissao_cert = :data_emissao_cert, 
                                            municipio_cert = :municipio_cert, 
                                            cpf = :cpf, 
                                            tipo_sanguineo = :tipo_sanguineo, 
                                            fazUsoMed = :fazUsoMed, 
                                            medicamentos = :medicamentos, 
                                            alergias = :alergias, 
                                            deficiencias = :deficiencias, 
                                            restric_alimentos = :restric_alimentos                                    
                                        '
                        );
                  
        // Bind values
        $this->db->bind(':user_id',$_SESSION['user_id']);
        $this->db->bind(':nome_aluno',$data['nome_aluno']);
        $this->db->bind(':nascimento',$data['nascimento']);
        $this->db->bind(':sexo',$data['sexo']);
        $this->db->bind(':telefone_aluno',$data['telefone_aluno']);
        $this->db->bind(':email_aluno',$data['email_aluno']);
        $this->db->bind(':nome_pai',$data['nome_pai']);
        $this->db->bind(':telefone_pai',$data['telefone_pai']);
        $this->db->bind(':nome_mae',$data['nome_mae']);
        $this->db->bind(':telefone_mae',$data['telefone_mae']);
        $this->db->bind(':nome_responsavel',$data['nome_responsavel']);
        $this->db->bind(':telefone_resp',$data['telefone_resp']);
        $this->db->bind(':naturalidade',$data['naturalidade']);
        $this->db->bind(':nacionalidade',$data['nacionalidade']);
        $this->db->bind(':rg',$data['rg']);
        $this->db->bind(':uf_rg',$data['uf_rg']);
        $this->db->bind(':orgao_emissor',$data['orgao_emissor']);
        $this->db->bind(':titulo_eleitor',$data['titulo_eleitor']);
        $this->db->bind(':zona',$data['zona']);
        $this->db->bind(':secao',$data['secao']);
        $this->db->bind(':certidao',$data['certidao']);
        $this->db->bind(':uf_cert',$data['uf_cert']);
        $this->db->bind(':cartorio_cert',$data['cartorio_cert']);
        $this->db->bind(':modelo',$data['modelo']);      
        $this->db->bind(':folha',$data['folha']);
        $this->db->bind(':livro',$data['livro']);
        
        if (empty($data['data_emissao_cert'])){
            $this->db->bind(':data_emissao_cert',NULL);
        }else {
            $this->db->bind(':data_emissao_cert',$data['data_emissao_cert']);
        }
        
        $this->db->bind(':municipio_cert',$data['municipio_cert']);
        $this->db->bind(':cpf',$data['cpf']);
        $this->db->bind(':tipo_sanguineo',$data['tipo_sanguineo']);
        $this->db->bind(':fazUsoMed',$data['fazUsoMed']);
        $this->db->bind(':medicamentos',$data['medicamentos']);
        $this->db->bind(':alergias',$data['alergias']);
        $this->db->bind(':deficiencias',$data['deficiencias']);
        $this->db->bind(':restric_alimentos',$data['restric_alimentos']);        


        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }













    public function update($data){
        $this->db->query('UPDATE aluno SET                                           
                                            nome_aluno = :nome_aluno,
                                            nascimento = :nascimento, 
                                            sexo = :sexo, 
                                            telefone_aluno = :telefone_aluno, 
                                            email_aluno = :email_aluno, 
                                            nome_pai = :nome_pai, 
                                            telefone_pai = :telefone_pai, 
                                            nome_mae = :nome_mae, 
                                            telefone_mae = :telefone_mae, 
                                            nome_responsavel = :nome_responsavel, 
                                            telefone_resp = :telefone_resp, 
                                            naturalidade = :naturalidade, 
                                            nacionalidade = :nacionalidade, 
                                            rg = :rg, 
                                            uf_rg = :uf_rg, 
                                            orgao_emissor = :orgao_emissor, 
                                            titulo_eleitor = :titulo_eleitor, 
                                            zona = :zona, 
                                            secao = :secao, 
                                            certidao = :certidao, 
                                            uf_cert = :uf_cert, 
                                            cartorio_cert = :cartorio_cert, 
                                            modelo = :modelo,                                             
                                            folha = :folha, 
                                            livro = :livro, 
                                            data_emissao_cert = :data_emissao_cert, 
                                            municipio_cert = :municipio_cert, 
                                            cpf = :cpf, 
                                            tipo_sanguineo = :tipo_sanguineo, 
                                            fazUsoMed = :fazUsoMed, 
                                            medicamentos = :medicamentos, 
                                            alergias = :alergias, 
                                            deficiencias = :deficiencias, 
                                            restric_alimentos = :restric_alimentos 
                                            WHERE id_aluno = :id_aluno');
                  
        // Bind values 
        $this->db->bind(':id_aluno',$data['id_aluno']);            
        $this->db->bind(':nome_aluno',$data['nome_aluno']);
        $this->db->bind(':nascimento',$data['nascimento']);
        $this->db->bind(':sexo',$data['sexo']);
        $this->db->bind(':telefone_aluno',$data['telefone_aluno']);
        $this->db->bind(':email_aluno',$data['email_aluno']);
        $this->db->bind(':nome_pai',$data['nome_pai']);
        $this->db->bind(':telefone_pai',$data['telefone_pai']);
        $this->db->bind(':nome_mae',$data['nome_mae']);
        $this->db->bind(':telefone_mae',$data['telefone_mae']);
        $this->db->bind(':nome_responsavel',$data['nome_responsavel']);
        $this->db->bind(':telefone_resp',$data['telefone_resp']);
        $this->db->bind(':naturalidade',$data['naturalidade']);
        $this->db->bind(':nacionalidade',$data['nacionalidade']);
        $this->db->bind(':rg',$data['rg']);
        $this->db->bind(':uf_rg',$data['uf_rg']);
        $this->db->bind(':orgao_emissor',$data['orgao_emissor']);
        $this->db->bind(':titulo_eleitor',$data['titulo_eleitor']);
        $this->db->bind(':zona',$data['zona']);
        $this->db->bind(':secao',$data['secao']);
        $this->db->bind(':certidao',$data['certidao']);
        $this->db->bind(':uf_cert',$data['uf_cert']);
        $this->db->bind(':cartorio_cert',$data['cartorio_cert']);
        $this->db->bind(':modelo',$data['modelo']);      
        $this->db->bind(':folha',$data['folha']);
        $this->db->bind(':livro',$data['livro']);
        
        if (empty($data['data_emissao_cert'])){
            $this->db->bind(':data_emissao_cert',NULL);
        }else {
            $this->db->bind(':data_emissao_cert',$data['data_emissao_cert']);
        }
        
        $this->db->bind(':municipio_cert',$data['municipio_cert']);
        $this->db->bind(':cpf',$data['cpf']);
        $this->db->bind(':tipo_sanguineo',$data['tipo_sanguineo']);
        $this->db->bind(':fazUsoMed',$data['fazUsoMed']);
        $this->db->bind(':medicamentos',$data['medicamentos']);
        $this->db->bind(':alergias',$data['alergias']);
        $this->db->bind(':deficiencias',$data['deficiencias']);
        $this->db->bind(':restric_alimentos',$data['restric_alimentos']);        


        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }



















      // Find user by email
      public function encontraAlunoPorEmail($email){
        $this->db->query('SELECT * FROM aluno WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

        public function getAlunosUsuario($id){
            $this->db->query('SELECT * FROM aluno WHERE user_id = :user_id');
            // Bind value
            $this->db->bind(':user_id', $id);

            $data = $this->db->resultSet();

            // Check row
            if($this->db->rowCount() > 0){
                return $data;
            } else {
                return false;
            }
        }

       
        public function deleteAluno($id){
            $this->db->query('DELETE FROM aluno WHERE id_aluno = :id_aluno');
            // Bind value
            $this->db->bind(':id_aluno', $id);

            $row = $this->db->execute();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }


         // pega o aluno por id
      public function getAlunoById($id){
        $this->db->query('SELECT * FROM aluno WHERE id_aluno = :id_aluno');
        // Bind value
        $this->db->bind(':id_aluno', $id);

        $data = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return $data;
        } else {
            return false;
        }
    }



    /*
    public function addPost($data){
        $this->db->query('INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);    
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }



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

    public function getPostById($id){
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);          
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }*/

  }