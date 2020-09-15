<?php
  class Buscadadostransporte extends Pagination{
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
                  linhas.linha as linha,                
                  escola.nome as escola,
                  etapa.descricao as etapa,
                  dados_anuais.turno as turno,
                  aluno_linhas.ano as ano
                FROM 
                  aluno,dados_anuais, 
                  aluno_linhas, linhas, 
                  escola, etapa 
                WHERE 
                  aluno.aluno_id = dados_anuais.aluno_id 
                AND 
                  aluno.aluno_id = aluno_linhas.aluno_id 
                AND 
                  aluno_linhas.linha_id = linhas.id              
                AND 
                  dados_anuais.escola_id = escola.id
                AND
                  dados_anuais.etapa_id = etapa.id
                "
              );

        

        if((($options['named_params'][':linha_id']) != "NULL") && (($options['named_params'][':linha_id']) != "")  ){                  
          $sql .= " AND aluno_linhas.linha_id = " . $options['named_params'][':linha_id'];
        }

        if((($options['named_params'][':escola_id']) != "NULL") && (($options['named_params'][':escola_id']) != "")  ){                  
          $sql .= " AND dados_anuais.escola_id = " . $options['named_params'][':escola_id'];
        }

        if((($options['named_params'][':etapa_id']) != "NULL") && (($options['named_params'][':etapa_id']) != "")  ){                  
          $sql .= " AND dados_anuais.etapa_id = " . $options['named_params'][':etapa_id'];
        }

        if((($options['named_params'][':turno']) != "NULL") && (($options['named_params'][':turno']) != "")  ){                  
          $sql .= " AND dados_anuais.turno = " . "'" . $options['named_params'][':turno'] . "'";
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