<?php
  class Buscaaluno extends Pagination{
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    //FUNÇÃO QUE EXECUTA A SQL PAGINATE
    public function getDados($page, $options){ 
        //var_dump($options);
        
    
        //$paginate = new pagination($page, "SELECT * FROM aluno WHERE nome_aluno LIKE " . "'%" . $options['named_params'][':nome'] . "%'", $options);       
       // $sql = ("SELECT * FROM aluno,dados_anuais, escola WHERE aluno.aluno_id = dados_anuais.aluno_id AND dados_anuais.escola_id = escola.id");

        

       if((($options['named_params'][':escola_id']) != "NULL") && (($options['named_params'][':escola_id']) != "")  ){ 
          $sql = ("SELECT * FROM aluno,dados_anuais, escola WHERE aluno.aluno_id = dados_anuais.aluno_id AND dados_anuais.escola_id = escola.id");                
          $sql .= " AND escola.id = " . $options['named_params'][':escola_id'];
        } else 
        {
          $sql = ("SELECT * FROM aluno WHERE 1");
        }


        if(!empty($options['named_params'][':nome_aluno'])){
          $sql .= " AND nome_aluno LIKE " . "'%" . $options['named_params'][':nome_aluno'] . "%'";
        }

        if(!empty($options['named_params'][':ano'])){                  
          $sql .= " AND dados_anuais.ano = " . $options['named_params'][':ano'];
        }

        $sql .= " ORDER BY nome_aluno ASC"; 
        //echo $sql;

        $paginate = new pagination($page, $sql, $options);
        return  $paginate;
    }  
    
    //FUNÇÃO QUE EXECUTA A SQL PAGINATE
    public function getFilaTodos($page, $options){              
        $paginate = new pagination($page, "SELECT * FROM fila ORDER BY id", $options);
        return  $paginate;
    }   
    

  } 

?>