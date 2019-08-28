<?php
//aula 31 do curso
    class Fila {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }

        public function getBairros(){
            $this->db->query("SELECT * FROM bairro");

            return $this->db->resultSet();
        }

        public function getEscolas(){
            $this->db->query("SELECT id, nome FROM escola");

            return $this->db->resultSet();
        }

        
    }