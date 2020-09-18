<?php

class Adminuser extends Pagination{
    private $db;

    public function __construct(){
        //inicia a classe Database
        $this->db = new Database;
    }    

   //FUNÇÃO QUE EXECUTA A SQL PAGINATE
   public function getUsers($page, $options){   
  
        $sql = ("SELECT id,name,email,type,created_at FROM users WHERE 1");

        if(!empty($options['named_params'][':name'])){
        $sql .= " AND name LIKE " . "'%" . $options['named_params'][':name'] . "%'";
        }

        
        $sql .= " ORDER BY name ASC";        

        $paginate = new pagination($page, $sql, $options);
        return  $paginate;
    }  



//class
}
?>