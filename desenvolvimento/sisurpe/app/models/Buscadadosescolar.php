<?php
  class Buscadadosescolar extends Pagination{
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }

    //FUNÇÃO QUE EXECUTA A SQL PAGINATE
    public function getDados($page, $options){ 
        //var_dump($options);
        
    
        //$paginate = new pagination($page, "SELECT * FROM aluno WHERE nome_aluno LIKE " . "'%" . $options['named_params'][':nome'] . "%'", $options);       
        $sql = ("SELECT 
                    aluno.nome_aluno as nome_aluno, 
                    aluno.nascimento as nascimento_aluno, 
                    dados_anuais.ano as ano, 
                    dados_anuais.tam_moletom as moletom, 
                    dados_anuais.tam_camiseta as camiseta, 
                    dados_anuais.tam_calca as calca, 
                    dados_anuais.tam_bermuda as bermuda, 
                    dados_anuais.tam_calcado as calcado, 
                    dados_anuais.tam_meia as meia, 
                    dados_anuais.etapa as etapa, 
                    dados_anuais.turno as turno 
                FROM 
                  aluno,dados_anuais, 
                  escola 
                WHERE 
                  aluno.id_aluno = dados_anuais.aluno_id 
                AND 
                  dados_anuais.escola_id = escola.id"
              );

        

        if(($options['named_params'][':escola_id']) != "Todos"){                  
          $sql .= " AND escola.id = " . $options['named_params'][':escola_id'];
        }


        if(!empty($options['named_params'][':nome'])){
          $sql .= " AND nome_aluno LIKE " . "'%" . $options['named_params'][':nome'] . "%'";
        }

        if(!empty($options['named_params'][':ano'])){                  
          $sql .= " AND dados_anuais.ano = " . $options['named_params'][':ano'];
        }

        $sql .= " ORDER BY nome_aluno ASC"; 

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