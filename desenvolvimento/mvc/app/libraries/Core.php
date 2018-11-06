<?php
/*
* App Core Class
* Creates URL and Loads core controller
* URL Format - /controller/method/params
*/
// 1) CRIAMOS A CLASSE, DEFINIMOS OS ATRIBUTOS E DEFINIMOS OS VALORES PADRÃO
//esta classe Core é iniciada no arquivo mvc/public/index.pp
class Core{
    //se for para o endereço localhost/mvc vai automáticamente para o controlador Pages
    protected $currentController = 'Pages';
    // se não for passado nenhum metodo como localhost/mvc/post ele vai direto para o public/index.php
    protected $currentMethd = 'index';
    // se não passar nenhum parâmetro ex localhost/mvc/post/edit/1 que aqui 1 é o parâmetro
    // montamos um array vazio
    protected $params = [];

    // 3) PASSAMOS A URL TRATADA PARA A VARIÁVEL $url
    public function __construct(){
        // print_r($this->getUrl());
        // ao iniciar a classe Core
        // passamos a url já tratada pela função getUrl();
        // ex: Array ( [0] => post [1] => edit [2] => 1 )
        $url = $this->getUrl();


        // 4) VERIFICAMOS SE O ARQUIVO REFERENTE AO CONTROLAOR EXISTE DENTRO DA PASTA CONTROLLERS
        // E CARREGAMOS NO SCRIPT
        //***************MANIPULAÇÃO DO CONTROLLER POST**********************************

        // Look in contrller for first value
        // na linha abaixo ele vai verificar a existencia de um arquivo dentro da pasta /app/controllers
        // função file_exists
        // para o Array ( [0] => post [1] => edit [2] => 1 )
        // [0] => post logo verificamos
        // dentro do if se o arquivo /app/controllers/Post.php existe
        //ucwords coloca a primeira letra em maúsculo        
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            // if exists, set as controller
            // passamos o controller para a propriedade currentController vai substituir
            // Pages que é o valor padrão pelo valor do indice 0 da variável url neste caso Post
            $this->currentController = ucwords($url[0]);
            // Unset 0 Indexs                   
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';       
        //Instantiate controller class
        // exemplo que está montando na linha abaixo $pages = new Pages;
        $this->currentController = new $this->currentController;
        //**************************FIM MANIPULAÇÃO DO CONTROLLER**********************************
        
        // 5) Check for second part of URL aula 17
        
        }//construct

   
    // 2) EXTRAIMOS E PREPARAMOS A URL
    /*   
    dentro do metodo getUrl se dermos um echo $_GET['url'];
    ele vai retornar apenas o que está depois do /mvc
    isso foi configurado em nosso arquivo public/.htasses
    se a url for loclhost/mvc/post/edit/1
    o resultado do $_GET['url'] seria post/edit/1
    */
    public function getUrl(){
        //testamos se existe alguma coisa no GET
        if(isset($_GET['url'])){
            //tiramos a / no final da url rtrim retira espaço em branco ou caractere no final de uma string
            $url = rtrim($_GET['url'], '/');
            // vamos usar filter_var para validar/verificar se é uma url válida
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // quebamos a url em todas as / e transformamos em um array
            $url = explode('/', $url);
            // retornamos o array com os dados da url
            // ao final se tivermos a url /mvc/post/edit/1
            // o método vai retornar o seguinte array
            // Array ( [0] => post [1] => edit [2] => 1 )
            return $url;
        }
    }
}

//verificaremos agora o método ex mvc/pages/about
// procuraremos dentro da classe Pages se tem o métdo about pegará dentro do array da url
// a posição [1] Array ( [0] => post [1] => edit [2] => 1 )