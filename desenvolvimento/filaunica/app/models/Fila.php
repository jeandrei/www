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

/***********************************************************************MÉTODOS QUE RETORNAM DADOS DE ETAPAS******************************************************/
   
        // RETORNA A DESCRIÇÃO DE UMA ETAPA A PARTIR DE UM ID
        public function getDescricaoEtapa($id) {
            $this->db->query("SELECT descricao FROM etapa WHERE id = :id");
            $this->db->bind(':id', $id);    
            $row = $this->db->single();           

            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            } 
        }

        // RETORNA O ID DE UMA ETAPA A PARTIR DA DATA DE NASCIMENTO
        public function getEtapaId($nasc) {  
            //pega o id da etapa
            $this->db->query("SELECT * FROM etapa WHERE :nasc>=data_ini AND :nasc<=data_fin");
            $this->db->bind(':nasc',$nasc);                  
            $etapa =$this->db->single();  
            if(!empty($etapa->id)){
                return $etapa->id;
            }
            else{
                return false;
            }
        
        }

        // RETORNA A DESCRIÇÃO DE UMA ETAPA A PARTIRA DE UMA DATA
        public function getEtapaDescricao($nasc) {
            if(!$this->getEtapaId($nasc)){
                return false;
            } else {
                $etapa_id = $this->getEtapaId($nasc);
            }
            //verifica se tem mínimo de 4 meses
            $this->db->query("SELECT descricao from etapa WHERE id = :id");
            $this->db->bind(':id', $etapa_id); 
            $result = $this->db->single();             
            if(!empty($result->descricao)){
                return $result->descricao;
            }
            else{
                return false;
            }
        
        }

        // RETORNA TODAS AS ETAPAS
        public function getEtapas() {
            $this->db->query("SELECT * FROM etapa ORDER BY descricao");
            $result = $this->db->resultSet();     
            
            foreach ($result as $row)
            {
            $etapas[] = array(
                'id' => $row->id,
                'data_ini' => $row->data_ini,
                'data_fin' => $row->data_fin,
                'descricao' => $row->descricao
            );
            }
        return $etapas;
        }  

        // RETORNA A ETAPA A PARTIR DE UMA DATA DE NASCIMENTO
        public function getEtapa($nasc) {
            //verifica se tem mínimo de 4 meses
            $this->db->query("SELECT TIMESTAMPDIFF(MONTH, :datanasc, NOW()) AS meses");
            $this->db->bind(':datanasc',$nasc); 
            $num_meses = $this->db->single();            
            
            if($num_meses->meses<4){        
                return false;
            }
        
            //pega o id da etapa
            $this->db->query("SELECT * FROM etapa WHERE :nasc>=data_ini AND :nasc<=data_fin");
            $this->db->bind(':nasc',$nasc);                  
            $etapa =$this->db->single();  
            if(!empty($etapa->id)){
                return $etapa->id;
            }
            else{
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
                                        fila.status as status,
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


       public function getFilaPorEtapaRelatorio($etapa_id,$status) {   
            $this->db->query("SET @contador = 0");
           // $stmt = $pdo->prepare($sql);
            $this->db->execute();
            
            $this->db->query("
                    SELECT 
                        (SELECT @contador := @contador +1) as posicao,                    
                        fila.registro as registro, 
                        fila.responsavel as responsavel, 
                        fila.nomecrianca as nome, 
                        fila.nascimento as nascimento,
                        fila.protocolo as protocolo,                 
                        (SELECT descricao FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) as etapa
                    FROM 
                        fila 
                    WHERE
                        (SELECT id FROM etapa WHERE fila.nascimento>=etapa.data_ini AND fila.nascimento<=etapa.data_fin) = :etapa_id 
                    AND
                        fila.status = :reg_status
                    ORDER BY
                        fila.registro        
                    ");
            
            $this->db->bind(':reg_status', $status);
            $this->db->bind(':etapa_id', $etapa_id);        
            
            
            $result = $this->db->resultSet();   
            
        
            //verifica se obteve algum resultado
            if($this->db->rowCount() > 0)
            {
                foreach ($result as $row){
                    $aguardando[] = array(
                        "nome" => $row->nome
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
                                        (SELECT fila.status FROM fila WHERE fila.protocolo=:protocolo) as statusprotocolo
                                FROM 
                                        fila, etapa
                                WHERE 
                                        fila.nascimento>=data_ini
                                AND 
                                        fila.nascimento<=data_fin
                                AND 
                                        etapa.id = (
                                                    SELECT 
                                                        etapa.id 
                                                    FROM etapa,
                                                        fila 
                                                    WHERE 
                                                        fila.nascimento>=data_ini
                                                    AND 
                                                        fila.nascimento<=data_fin
                                                    AND 
                                                        fila.protocolo = :protocolo
                                                )
                                AND 
                                        fila.registro <= (SELECT fila.registro FROM fila WHERE fila.protocolo = :protocolo)
                                
                                AND
                                        fila.status = "Aguardando"                            
        
                            ');
        
        
        
            $this->db->bind(':protocolo',$protocolo);            
            
            $row = $this->db->single();  
            //var_dump($row);
                    
            if(($row->statusprotocolo == "Aguardando") && ($row->posicao <> 0)){
                return $row->posicao . 'º';
            } else {
                return false;
            }       
            
        
        }
            
        















        
        
    
    
    }