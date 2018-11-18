<?php
class Post {
    private $db;


    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts(){
        //$this->db->query é um método da classe Database que faz o prepare da sql
        $this->db->query("SELECT * FROM posts");
        //$this->db->resultSet(); é um método da classe Database que retorna um array com mais de um o resultado
        return $this->db->resultSet();

    }
  
}
// verificar aula 23 no final ele  fala que é melhor deletar este arquivo