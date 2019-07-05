<?php
    class Pages extends Controller{
        public function __construct(){
            // 1 Chama o model
          //$this->postModel = $this->model('Post');
        }

        public function index(){
            // Posso passar valores aqui pois no view está definido um array para isso
            // public function view($view, $data = []){
                // 2 Chama um método
                //$posts = $this->postModel->getPosts();
                
                // 3 coloca os valores no array
                $data = [
                'title' => 'MVC Login',
                'description'=> 'MVC com login pronto'
            ];

            // 4 Chama o view passando os dados
            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'title' => 'Sobre Nós',
                'description'=> 'Modelo MVC com login para novos projetos'
            ];
            $this->view('pages/about', $data);           
        }
}