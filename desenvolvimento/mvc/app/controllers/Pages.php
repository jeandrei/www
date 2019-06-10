<?php
    class Pages extends Controller{
        public function __construct(){
          $this->postModel = $this->model('Post');
        }

        public function index(){
            // Posso passar valores aqui pois no view está definido um array para isso
            // public function view($view, $data = []){
            $data = [
                'title' => 'Welcome'
            ];
            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'title' => 'About Us'
            ];
            $this->view('pages/about', $data);           
        }
}