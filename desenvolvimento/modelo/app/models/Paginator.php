<?php
//aula 31 do curso
    class Paginator {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }

        public function registros(){
            $this->db->query('SELECT id, nomecrianca, nascimento, protocolo, status FROM fila');
            //$this->db->bind(':email', $email);

            $row = $this->db->resultSet();


            if($this->db->execute()){
                return $row;
            } else {
                return false;
            }            
        }


        /*
        // Register User
        public function register($data){
            $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            // Bind values
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);

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
        }*/

    }
?>