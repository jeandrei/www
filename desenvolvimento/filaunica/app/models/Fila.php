<?php
//aula 31 do curso
    class Fila {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }

/********************************************************************MÉTODOS QUE RETORNAM DADOS DIVERSOS******************************************************/

        public function getBairros(){
            $this->db->query("SELECT * FROM bairro");

            return $this->db->resultSet();
        }

          // Busca etapa por id
          public function getBairroByid($id){
            $this->db->query('SELECT * FROM bairro WHERE id = :id');
            // Bind value
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return $row->nome;
            } else {
                return false;
            }
        } 

        public function getEscolas(){
            $this->db->query("SELECT id, nome FROM escola");

            return $this->db->resultSet();
        }

        public function getEscolasById($id){
            $this->db->query("SELECT nome FROM escola WHERE id = :id");
            $this->db->bind(':id',$id);

            $row = $this->db->single();           

            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }           
        }       
     
/***************************************************************************MÉTODOS DE VALIDAÇÃO**********************************************************/
            
        //retorna se já existe um nome e data de nascimento cadastrado
        public function nomeCadastrado($nome,$nasc){
            $this->db->query("SELECT * FROM fila where nomecrianca = :nomecrianca AND nascimento = :nascimento");
            $this->db->bind(':nomecrianca',$nome);
            $this->db->bind(':nascimento',$nasc);
            $row = $this->db->single();           

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }           
        }
                
        public function validaNascimento($data){
            $formatado = date('Y-m-d',strtotime($data));
            $ano = date('Y', strtotime($formatado));
            $mes = date('m', strtotime($formatado));
            $dia = date('d', strtotime($formatado));
            $anominimo = date('Y', strtotime('-5 year'));
            
                if ( !checkdate( $mes , $dia , $ano )                   // se a data for inválida
                     || $ano < $anominimo                                // ou o ano menor que a data mínima
                     || mktime( 0, 0, 0, $mes, $dia, $ano ) > time() )  // ou a data passar de hoje
                    {
                        return false;
                    }else{
                        return true;
                    }
            } 
       
/***********************************************************************METODO PARA GRAVAR NA FILA**********************************************************/
       
        public function register($data){
           
                    
            $this->db->query('INSERT INTO fila SET                    
                                responsavel = :responsavel,  
                                email = :email, 
                                telefone = :telefone, 
                                celular = :celular, 
                                bairro_id = :bairro_id, 
                                logradouro = :logradouro,
                                numero = :numero, 
                                complemento = :complemento, 
                                nomecrianca = :nomecrianca,
                                nascimento = :nascimento,                                
                                certidaonascimento = :certidaonascimento,
                                opcao1_id = :opcao1_id,
                                opcao2_id = :opcao2_id,
                                opcao3_id = :opcao3_id,
                                opcao_turno = :opcao_turno,                                   
                                cpfresponsavel = :cpfresponsavel,
                                protocolo = :protocolo,                                                   
                                observacao = :observacao,                                
                                deficiencia = :deficiencia         
                                ');
                                
             // Bind values
             $this->db->bind(':responsavel', $data['responsavel']);
             $this->db->bind(':email', $data['email']);
             $this->db->bind(':telefone', $data['telefone']);
             $this->db->bind(':celular', $data['celular']);
             $this->db->bind(':bairro_id', $data['bairro']);
             $this->db->bind(':logradouro', $data['rua']);
            

            if(empty($data['numero'])){
                 $this->db->bind(':numero', 0);
            }
            else
            {
                 $this->db->bind(':numero', $data['numero']);   
            }

            
            $this->db->bind(':complemento', $data['complemento']);
            $this->db->bind(':nomecrianca', $data['nome']);
            $this->db->bind(':nascimento', $data['nascimento']);            
            $this->db->bind(':certidaonascimento', $data['certidao']);
            $this->db->bind(':opcao1_id', $data['opcao1']);
            $this->db->bind(':opcao2_id', $data['opcao2']);
            $this->db->bind(':opcao3_id', $data['opcao3']);
            $this->db->bind(':opcao_turno', $data['opcao_turno']);             
            $this->db->bind(':cpfresponsavel', $data['cpf']);
            $this->db->bind(':protocolo', $data['protocolo']);        
            $this->db->bind(':observacao', $data['obs']);             
            
            if(isset($data['portador']) && ($data['portador'] == '1'))
            {
                $this->db->bind(':deficiencia', '1');
            }else{
                $this->db->bind(':deficiencia', '0');
            }
                 
             
            // Execute            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        

/********************************************************************MÉTODOS QUE RETORNAM DADOS DE PROTOCOLO******************************************************/
   
        //FUNÇÃO QUE GERA O PROTOCOLO
        public function generateProtocol(){
            $lastid = $this->getLastid();
            $id = $lastid + 1;
            $year = date('Y');           
            $protocol = $id . $year; 
            return $protocol;
        }

        //FUNÇÃO QUE BUSCA OS DADOS DE UM PROTOCOLO
        public function buscaProtocolo($protocolo) {
            $this->db->query("
                                    SELECT      
                                        fila.registro as registro, 
                                        fila.responsavel as responsavel, 
                                        fila.nomecrianca as nome, 
                                        fila.nascimento as nascimento,
                                        fila.protocolo as protocolo,
                                        fila.situacao_id as situacao_id,
                                        (SELECT descricao FROM situacao WHERE fila.situacao_id = id) as status,
                                        (SELECT descricao FROM etapa WHERE fila.nascimento>=data_ini AND fila.nascimento<=data_fin) as etapa
                                        
                                    FROM                               
                                        fila 
                                    WHERE 
                                        fila.protocolo=:protocolo
                                ");
            
            
            $this->db->bind(':protocolo', $protocolo);
            $row = $this->db->single(); 
            
            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }  
        }


/*********************************************************************MÉTODOS QUE RETORNAM DADOS DA FILA******************************************************/

        // RETORNA O ÚLTIMO ID REGISTRADO NA FILA
        public function getLastid(){
            $this->db->query("SELECT max(id) as id FROM fila");             
            $lastId = $this->db->single();
            return $lastId->id;            
        }


        // RETORNA O ÚLTIMO HISTÓRICO O REGISTRO DA FILA
        public function getLastHistorico($id){
            $this->db->query("SELECT 
                                * 
                              FROM 
                                historico_id_fila 
                              WHERE 
                                fila_id = $id 
                              ORDER BY 
                                registro 
                              DESC 
                              LIMIT 
                                1"
                            );             
            $result = $this->db->single();           
            return $result;            
        }


        public function getFilaPorEtapaRelatorio($etapa_id) {  
            
            $this->db->query("
                    SELECT                                           
                        fila.registro as registro, 
                        fila.responsavel as responsavel, 
                        fila.nomecrianca as nome, 
                        fila.nascimento as nascimento,
                        fila.protocolo as protocolo,  
                        (SELECT descricao FROM situacao WHERE fila.situacao_id = id) as status,               
                        (SELECT descricao FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) as etapa
                    FROM 
                        fila, situacao
                    WHERE
                        (SELECT id FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) = :etapa_id                     
                    AND 
                        fila.situacao_id = situacao.id
                    AND 
                        situacao.ativonafila = 1
                    ORDER BY
                        fila.registro        
                    ");            
           
            $this->db->bind(':etapa_id', $etapa_id);        
            
            
            $result = $this->db->resultSet();   
            
        
            //verifica se obteve algum resultado
            if($this->db->rowCount() > 0)
            {
                foreach ($result as $row){
                    $aguardando[] = array(
                        "posicao" => $this->buscaPosicaoFila($row->protocolo),
                        "registro" => date('d/m/Y H:i:s', strtotime($row->registro)),
                        "responsavel" => $row->responsavel,
                        "nome" => $row->nome,
                        "nascimento" => date('d/m/Y', strtotime($row->nascimento)), 
                        "etapa" => $row->etapa,
                        "protocolo" => $row->protocolo                        
                    );
                }
            
            return $aguardando;
            }
            else
            {
                return false;
            } 
        }      
              


        function buscaPosicaoFila($protocolo) {
            $this->db->query(' 
            SELECT 
                    count(fila.id) as posicao,
                    (SELECT situacao.ativonafila FROM situacao, fila WHERE situacao.id = fila.situacao_id AND fila.protocolo = :protocolo) as ativo
                FROM 
                    fila, situacao
                WHERE 
                    fila.situacao_id = situacao.id
                AND 
                    fila.nascimento >= (SELECT etapa.data_ini FROM etapa WHERE etapa.data_ini <= (SELECT fila.nascimento FROM fila WHERE fila.protocolo = :protocolo) AND etapa.data_fin >= (SELECT fila.nascimento FROM fila WHERE fila.protocolo = :protocolo))
                AND 
                    fila.nascimento <= (SELECT etapa.data_fin FROM etapa WHERE etapa.data_ini <= (SELECT fila.nascimento FROM fila WHERE fila.protocolo = :protocolo) AND etapa.data_fin >= (SELECT fila.nascimento FROM fila WHERE fila.protocolo = :protocolo))
                AND 
                    fila.registro <= (SELECT fila.registro FROM fila WHERE fila.protocolo = :protocolo)
                AND 
                    situacao.ativonafila = 1
                AND 
                    fila.situacao_id = situacao.id                              
            ');
        
        
        
            $this->db->bind(':protocolo',$protocolo);            
            
            $row = $this->db->single();  
            //var_dump($row);
                    
            if($row->ativo == 0){
                return false;
            } elseif($row->ativo == 1 && $row->posicao > 0){
                return $row->posicao . 'º';  
            }else{
                if($row->posicao == 0)
                {
                    return "FE";
                }
            }              
        }




        function buscaFilaById($id) {
            $this->db->query(' 
                                SELECT 
                                       *
                                FROM 
                                        fila
                                WHERE 
                                        fila.id = :id                                                            
        
                            ');
        
        
        
            $this->db->bind(':id',$id);            
            
            $row = $this->db->single();             
                    
            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }       
            
        
        }

        public function getTurno($num){
            if ($num == 1){
                $turno = "Matutino";
            }
            if ($num == 2){
                $turno = "Vespertino";
            }
            return $turno;
        }


        public function update($data){             
            $this->db->query('UPDATE fila SET opcao_matricula = :opcao_matricula, situacao_id = :situacao_id, turno_matricula = :turno_matricula WHERE id = :id');
            // Bind values
            $this->db->bind(':id',$data['id']);
            $this->db->bind(':opcao_matricula',$data['opcao_matricula']);            
            $this->db->bind(':situacao_id',$data['situacao_id']);            
            $this->db->bind(':turno_matricula',$data['turno_matricula']); 
            // Execute
            if($this->db->execute()){
                return true;                
            } else {
                return false;
            }
        }
         
        

          //FUNÇÃO QUE EXECUTA A SQL PAGINATE
          public function getFilaBusca($page, $options){             
        

            $sql = "SELECT *,  (SELECT descricao FROM etapa WHERE fila.nascimento>=data_ini AND fila.nascimento<=data_fin) as etapa FROM fila";           
            
            // SE A ETAPA É IGUAL A TODOS EU CLOCO O COMANDO WHERE FILA.ID QUE TRAZ TODOS OS REGISTROS
            if(($options['named_params'][':etapa_id']) == "Todos"){                    
                $sql .= " WHERE fila.id";
            } else {
                // SE FOR DIFERENTE DE TODOS QUER DIZER QUE O USUÁRIOS SELECIONOU ALGUM OUTRO VALOR DAÍ EU MONTO A SQL
                $sql .= " WHERE (SELECT id FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) = " . $options['named_params'][':etapa_id'];          
               
            }

            if(!empty($options['named_params'][':nome'])){
                $sql .= " AND nomecrianca LIKE " . "'%" . $options['named_params'][':nome'] . "%'";
            }
          

            if(($options['named_params'][':situacao_id']) <> "Todos"){
                $sql .= " AND situacao_id = " . "'" . $options['named_params'][':situacao_id'] ."'";
            }
            
             

            $sql .= " ORDER BY registro ASC"; 
            
            if(($options['named_params'][':protocolo']) <> ""){
                $sql = "SELECT *,  (SELECT descricao FROM etapa WHERE fila.nascimento>=data_ini AND fila.nascimento<=data_fin) as etapa FROM fila WHERE protocolo = " . $options['named_params'][':protocolo'];                      
            }

               
            $paginate = new pagination($page, $sql, $options);
            return  $paginate;
        }  



         //FUNÇÃO QUE EXECUTA A SQL PAGINATE
          public function getFilaBuscaRelatorio($options){             
        

            $sql = "SELECT *,  (SELECT descricao FROM etapa WHERE fila.nascimento>=data_ini AND fila.nascimento<=data_fin) as etapa FROM fila";           
            
            // SE A ETAPA É IGUAL A TODOS EU CLOCO O COMANDO WHERE FILA.ID QUE TRAZ TODOS OS REGISTROS
            if(($options['named_params'][':etapa_id']) == "Todos"){                    
                $sql .= " WHERE fila.id";
            } else {
                // SE FOR DIFERENTE DE TODOS QUER DIZER QUE O USUÁRIOS SELECIONOU ALGUM OUTRO VALOR DAÍ EU MONTO A SQL
                $sql .= " WHERE (SELECT id FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) = " . $options['named_params'][':etapa_id'];          
               
            }

            if(!empty($options['named_params'][':nome'])){
                $sql .= " AND nomecrianca LIKE " . "'%" . $options['named_params'][':nome'] . "%'";
            }
          

            if(($options['named_params'][':situacao_id']) <> "Todos"){
                $sql .= " AND situacao_id = " . "'" . $options['named_params'][':situacao_id'] ."'";
            }
            
             

            $sql .= " ORDER BY etapa, registro ASC"; 
            
            /*if(($options['named_params'][':protocolo']) <> ""){
                $sql = "SELECT *,  (SELECT descricao FROM etapa WHERE fila.nascimento>=data_ini AND fila.nascimento<=data_fin) as etapa FROM fila WHERE protocolo = " . $options['named_params'][':protocolo'];                      
            }*/

            $this->db->query($sql);
            $result = $this->db->resultSet();
            
            return  $result;
        }  


        
        //FUNÇÃO QUE EXECUTA A SQL PAGINATE
        public function getFilaTodos($page, $options){              
            $paginate = new pagination($page, "SELECT * FROM fila ORDER BY id", $options);
            return  $paginate;
        } 
        
        
    
    
    }