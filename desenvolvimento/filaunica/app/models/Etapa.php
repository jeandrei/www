<?php
//aula 31 do curso
    class Etapa {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }

        // Registra Etapa
        public function register($data){
            $this->db->query('INSERT INTO etapa (data_ini, data_fin, descricao) VALUES (:data_ini, :data_fin, :descricao)');
            // Bind values
            $this->db->bind(':data_ini',$data['data_ini']);
            $this->db->bind(':data_fin',$data['data_fin']);
            $this->db->bind(':descricao',$data['descricao']);            

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        /*
         // Editar Etapa
         public function update($data){
            $this->db->query('UPDATE users SET name = :name, password = :password, type =:type WHERE email = :email');
            // Bind values
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':name',$data['name']);            
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':type',$data['type']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // 2 Login User                
        public function login($email, $password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            // password_verify — Verifica se um password corresponde com um hash criptografado
            // Logo para verificar não precisa descriptografar 
            // aqui $password vem do formulário ou seja digitado pelo usuário  
            // e $hashed_password vem da consulta do banco e está criptografado
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
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
*/
         // Busca etapa por id
         public function getEtapaByid($id){
            $this->db->query('SELECT * FROM etapa WHERE id = :id');
            // Bind value
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        


         // Deleta etapa por id
         public function delEtapaByid($id){
            $this->db->query('DELETE FROM etapa WHERE id = :id');
            // Bind value
            $this->db->bind(':id', $id);

            $row = $this->db->execute();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        

        // get etapas
        public function getEtapas(){
            $this->db->query('SELECT * FROM etapa');            

            return $this->db->resultSet();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // VERIFICA SE JÁ EXISTE ALGUM REGISTRO NA FILA COM ESTA ETAPA
        // NÃO PODE REMOVER ETAPA COM REGISTROS NA FILA
        public function etapaRegFila($id){
            $this->db->query('SELECT * FROM fila WHERE nascimento BETWEEN (SELECT data_ini FROM etapa WHERE id = :id) AND (SELECT data_fin FROM etapa WHERE id = :id)');
            $this->db->bind(':id', $id);
           
            return $this->db->resultSet();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
    }
?>