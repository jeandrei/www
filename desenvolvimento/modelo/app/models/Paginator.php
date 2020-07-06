<?php
//aula 31 do curso
    class Paginator {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }     
        
        public function registros(){
            $this->db->query('SELECT * FROM fila');
            $result = $this->db->resultSetArray();
            if($this->db->rowCount() > 0){
                return $result;
            } else {
                return false;
            }

        }


        public function paginacao(){
            $db = new PDO('mysql:dbname=pagination;host=mysql','root','rootadm');
            //user input
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;
            //positioning
            $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
            //query
            $articles = $db->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articles LIMIT {$start},{$perPage}");
            $articles->execute();
            $articles = $articles->fetchAll(PDO::FETCH_ASSOC);            
            $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
            $pages = ceil($total / $perPage);
            $data['articles'] = $articles;
            $data['total'] = $total;
            $data['perPage'] = $perPage;
            $data['pages'] = $pages;
            return $data;          
            

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