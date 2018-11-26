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

<<<<<<< HEAD
        //Find user by email
=======
        // Login User
        public function login($email, $password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);
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
        }


        //Find usr by email
>>>>>>> 7cfdf28225b9d1002edcc29173cc3fc68c6c010c
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            // Bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;

            } else {
                return false;
            }
        }
    }