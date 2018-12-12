<?php
    class User {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // Register user
        public function register($data){
            $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);    
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Login User
        /*public function login($chave){
            $this->db->query('SELECT * FROM aluno WHERE chave = :chave');
            $this->db->bind(':chave', $chave);
            // $row vai ter todos os dados do usuário id, name, password etc
            // lá na função createUserSession do arquivo controllers/Users.php
            // o valor $user->id; vem daqui   
            $row = $this->db->single();
            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        })/*/


        //Find usr by email
        public function findUserByKey($chave){
            $this->db->query('SELECT * FROM aluno WHERE chave = :chave');
            // Bind values
            $this->db->bind(':chave', $chave);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return $row;

            } else {
                return false;
            }
        }

         //Get User by id
         public function getUserById($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
    
    }