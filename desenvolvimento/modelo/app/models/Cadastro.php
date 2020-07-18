<?php
//aula 31 do curso
    class Cadastro {
        private $db;

        public function __construct(){
            //inicia a classe Database
            $this->db = new Database;
        }

        public function getBairros(){
            $this->db->query("SELECT * FROM bairro");

            return $this->db->resultSet();
        }

      

     

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
            
                if ( !checkdate( $mes , $dia , $ano )                 // se a data for inválida                                                                        
                     || mktime( 0, 0, 0, $mes, $dia, $ano ) > time() )  // ou a data passar de hoje
                    {
                        return false;
                    }else{
                        return true;
                    }
            }

        
       

        public function getLastid(){
            $this->db->query("SELECT max(id) as id FROM fila");             
            $lastId = $this->db->single();
            return $lastId->id;            
        }

        
        public function generateProtocol(){
            $lastid = $this->getLastid();
            $id = $lastid + 1;
            $year = date('Y');           
            $protocol = $id . $year; 
            return $protocol;
        }



        // Grava na fila
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

             
        
        public function getCPF($cpf){
            $this->db->query("SELECT * FROM fila WHERE cpfresponsavel = :cpf");
            $this->db->bind(':cpf',$cpf);

            $row = $this->db->single();           

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }           
        }

        /* MÉTODO PARA VERIFICAR SE UM REGISTRO TEM O CPF INFORMADO OU NÃO */
        public function isthereCPFbyId($id){
            $this->db->query("SELECT cpfresponsavel FROM fila WHERE id = :id AND (cpfresponsavel IS NULL OR
            cpfresponsavel = ' ')");
            $this->db->bind(':id',$id);

            $row = $this->db->single();           

            if($this->db->rowCount() > 0){
                return false;
            } else {
                return true;
            }           
        }


        public function getRegistros(){
            $this->db->query("SELECT * FROM fila ORDER BY registro DESC"); 
            $result = $this->db->resultSet(); 
            if($this->db->rowCount() > 0){
                return $result;
            } else {
                return 'Sem dados para emitir';
            }           
        }


        public function BuscaRegistros($nome,$nascimento,$status){
            
            $sql = "SELECT * FROM fila WHERE 1";
            
            if(!empty($nome)){
                $sql .= " AND nomecrianca LIKE " . "'%" . $nome . "%'";
            }

            if(!empty($nascimento)){
                $sql .= " AND nascimento = " . "'" . $nascimento ."'";
            }

            if((!empty($status)) && ($status <> "Todos")){
                $sql .= " AND status = " . "'" . $status ."'";
            }

            $sql .= " ORDER BY registro DESC";            
            
            $this->db->query($sql); 
            $result = $this->db->resultSet(); 
            if($this->db->rowCount() > 0){
                return $result;
            } else {
                return false;
            }           
        }



        public function getRegistroByid($id){
            $this->db->query("SELECT * FROM fila WHERE id = :id"); 
            $this->db->bind(':id',$id);

            $row = $this->db->single();           

            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }           
        }

        // Deleta etapa por id
        public function delRegByid($id){
            $this->db->query('DELETE FROM fila WHERE id = :id');
            // Bind value
            $this->db->bind(':id', $id);

            $row = $this->db->execute();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }



         // Update 
         public function update($data){
            $this->db->query('UPDATE fila SET 
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
                                cpfresponsavel = :cpfresponsavel,
                                protocolo = :protocolo,                                                   
                                observacao = :observacao,                                
                                deficiencia = :deficiencia
                            WHERE id = :id');
            // Bind values
             // Bind values
             $this->db->bind(':id', $data['id']);
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



               
        
    
    
    }