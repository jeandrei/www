<?php
  class Escolauser {
    private $db;

    public function __construct(){
        $this->db = new Database;        
    }
 
    
     
    public function GetEscolasUserById($id){
        $this->db->query("SELECT eu.id as id, eu.escola_id as escola_id, eu.user_id as user_id, es.nome as nome FROM escolas_user eu, escola es WHERE eu.escola_id = es.id AND user_id = :user_id;");
        $this->db->bind(':user_id',$id); 
        $result = $this->db->resultSet(); 
        if($this->db->rowCount() > 0){
            return $result;
        } else {
            return false;
        }           
    }  

    public function GetEscolas(){
        $this->db->query("SELECT * FROM escola");        
        $result = $this->db->resultSet(); 
        if($this->db->rowCount() > 0){
            return $result;
        } else {
            return false;
        }           
    }  

    public function register($data){       
        $this->db->query('INSERT INTO escolas_user SET
                                            user_id  = :user_id,
                                            escola_id = :escola_id
                                                          
                                        '
                        );
                  
        // Bind values
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':escola_id',$data['escola_id']);  
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteEscolasUser($id){
        //die($id);
        $this->db->query('DELETE FROM escolas_user WHERE id = :id');
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



    public function checkUserEscola($user_id,$escola_id){
        $this->db->query("SELECT * FROM escolas_user WHERE user_id = :user_id AND escola_id = :escola_id");
        $this->db->bind(':user_id',$user_id);
        $this->db->bind(':escola_id',$escola_id);  
        $result = $this->db->single(); 
        if($this->db->rowCount() > 0){
            return $result;
        } else {
            return false;
        }           

    }


    public function getUserIdEscolasUser($id){
        $this->db->query("SELECT user_id FROM escolas_user WHERE id = :id");
        $this->db->bind(':id',$id);         
        $result = $this->db->single(); 
        if($this->db->rowCount() > 0){
            return $result;
        } else {
            return false;
        }           

    }



      
    
    

}