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
                    aluno.nascimento as nascimento, 
                    dados_anuais.ano as ano, 
                    dados_anuais.tam_moletom as moletom, 
                    dados_anuais.tam_camiseta as camiseta, 
                    dados_anuais.tam_calca as calca, 
                    dados_anuais.tam_bermuda as bermuda, 
                    dados_anuais.tam_calcado as calcado, 
                    dados_anuais.tam_meia as meia, 
                    dados_anuais.etapa_id as etapa, 
                    dados_anuais.turno as turno 
                FROM 
                  aluno,dados_anuais, 
                  escola, etapa 
                WHERE 
                  aluno.id_aluno = dados_anuais.aluno_id 
                AND 
                  dados_anuais.escola_id = escola.id
                  AND 
                  dados_anuais.etapa_id = etapa.id"
              );

        

        if((($options['named_params'][':escola_id']) != "NULL") && (($options['named_params'][':escola_id']) != "")  ){                  
          $sql .= " AND escola.id = " . $options['named_params'][':escola_id'];
        }


        if((($options['named_params'][':etapa_id']) != "NULL") && (($options['named_params'][':etapa_id']) != "")  ){                  
          $sql .= " AND etapa.id = " . $options['named_params'][':etapa_id'];
        }

        if((($options['named_params'][':turno']) != "NULL") && (($options['named_params'][':turno']) != "")  ){                  
          $sql .= " AND dados_anuais.turno = " . "'" .  $options['named_params'][':turno'] . "'";
        }


        
        

        if(!empty($options['named_params'][':nome'])){
          $sql .= " AND nome_aluno LIKE " . "'%" . $options['named_params'][':nome'] . "%'";
        }

        if((($options['named_params'][':ano']) != "NULL") && (($options['named_params'][':ano']) != "")  ){                  
          $sql .= " AND dados_anuais.ano = " . $options['named_params'][':ano'];
        } else {
          $sql .= " AND dados_anuais.ano = " . date("Y"); 
        }

        if((($options['named_params'][':tam_moletom']) != "NULL") && (($options['named_params'][':tam_moletom']) != "")  ){                  
          $sql .= " AND dados_anuais.tam_moletom = " . $options['named_params'][':tam_moletom'];
        }

        if((($options['named_params'][':tam_calca']) != "NULL") && (($options['named_params'][':tam_calca']) != "")  ){                  
          $sql .= " AND dados_anuais.tam_calca = " . $options['named_params'][':tam_calca'];
        }

        if((($options['named_params'][':tam_camiseta']) != "NULL") && (($options['named_params'][':tam_camiseta']) != "")  ){                  
          $sql .= " AND dados_anuais.tam_camiseta = " . $options['named_params'][':tam_camiseta'];
        }

        if((($options['named_params'][':tam_bermuda']) != "NULL") && (($options['named_params'][':tam_bermuda']) != "")  ){                  
          $sql .= " AND dados_anuais.tam_bermuda = " . $options['named_params'][':tam_bermuda'];
        }

        if((($options['named_params'][':tam_calcado']) != "NULL") && (($options['named_params'][':tam_calcado']) != "")  ){                  
          $sql .= " AND dados_anuais.tam_calcado = " . $options['named_params'][':tam_calcado'];
        }

        if((($options['named_params'][':tam_meia']) != "NULL") && (($options['named_params'][':tam_meia']) != "")  ){                  
          $sql .= " AND dados_anuais.tam_meia = " . $options['named_params'][':tam_meia'];
        }

        
        

        

        

        $sql .= " ORDER BY nome_aluno ASC"; 
        //var_dump($sql);

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