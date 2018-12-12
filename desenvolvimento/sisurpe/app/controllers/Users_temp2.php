<?php
    Class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');            
        }
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){               
                $this->createUserSession(); 
            } else {               
                $this->view('users/login');
            }
        }
        public function createUserSession(){                                     
            redirect('posts');           
        }
    }//controller