<?php
//aula 31 do curso   

    class Exemplo_paginacao extends Pagination{
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
           
        } 
        
        //FUNÇÃO QUE EXECUTA A SQL PAGINATE
        public function getFilaBusca($page, $options){              
            $paginate = new pagination($page, "SELECT * FROM fila WHERE status = :status ORDER BY id", $options);
            return  $paginate;
        }  
        
        //FUNÇÃO QUE EXECUTA A SQL PAGINATE
        public function getFilaTodos($page, $options){              
            $paginate = new pagination($page, "SELECT * FROM fila ORDER BY id", $options);
            return  $paginate;
        }  
    
         
        
    }  
?>