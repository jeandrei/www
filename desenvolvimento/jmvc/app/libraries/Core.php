<?php
/*
    * App Core Class
    * Creates URL and loads core controller
    * URL FORMAT - /controller/method/param
*/

class Core{   
    // por padrão se o usuário digitar /mvc
    // o currentController será Pages o currentMethod será index e o params será um array vazio
    // logo ele carregará a Classe Pages método Index -> /mvc/Pages/Index 
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    // 2 chamamos a função pela construct para iniciar automaticamente
    // 3 instanciamos a classe Core no arquivo /mvc/index.php init = new Core;
    public function __construct(){
        //print_r($this->getUrl());
        $url = $this->getUrl();

        // Look in controllers for first value
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            // If exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        //Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of url
        if(isset($url[1])){
            // Check to see if method exist in the controller mvc/controllers/Classe/Método
            // se existir a dentro da pasta mvc/controllers a Classe Pages com o Método about por exemplo 
            // o about vai ser atribuido ao currentMethod
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];                
                // Unset 1 Index
                unset($url[1]);
            }
        }
        
        // Get params
        // essa linha diz o seguinte
        // se tiver um valor no array $url retorna o valor do array
        // caso contrário retorna um array vazio array_values($url) : []
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // 1 criamos uma função para pegar a url
    public function getUrl(){
        if(isset($_GET['url'])){            
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            //var_dump($url);
            return $url;
        }
    }
}


?>