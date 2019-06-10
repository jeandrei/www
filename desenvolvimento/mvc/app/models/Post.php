<?php
    // Reconhece a classe Database pois no arquivo bootstrap.php tem o autoload que lê
    // o que está dentro de libraries em que libraries tem Database.php
    // model interage com o banco e passa os dados para o controller, o controller seleciona o view
    // e passa os dados obtidos pelo model
    class Post {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
    }