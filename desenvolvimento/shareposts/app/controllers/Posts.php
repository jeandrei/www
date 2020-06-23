<?php 

    class Posts extends Controller {

        
        public function __construct(){
            //IMPEDE O ACESSO A POSTS SE NÃO ESTIVER LOGADO
            // isLoggedIn está no arquivo session_helper
            if(!isLoggedIn()){
                redirect('users/login');
            }

            // Carregamos o model
            // $this->model('Post') pq Posts extends Controller
            $this->postModel = $this->model('Post');
        }

        public function index(){

            // Get posts
            $posts = $this->postModel->getPosts();
            
            $data = [
                'posts' => $posts
            ];

            $this->view('posts/index', $data);
        }

        public function add(){

            $data = [
                'title' => '',
                'boddy' => ''
            ];

            $this->view('posts/add', $data);

        }
    }


?>