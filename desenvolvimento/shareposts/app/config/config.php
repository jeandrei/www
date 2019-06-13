<?php
    // DB Params
    define('DB_HOST', 'mysql');
    define('DB_USER', 'root');
    define('DB_PASS', 'rootadm');
    define('DB_NAME', 'shareposts');

    /* App Root
     Temos que pegar do root até a pasta app
     só __FILE__ traz todo o caminho
     /var/www/html/mvc/app/config/config.php
     para tirar um nível no final usamos a função
     dirname() que tira um nível, como temos que tirar o config.php
     e config temos que usar duas vezes a função
     resultado será /var/www/html/mvc/app
     Sepre que quiser adicionar algo da pasta app use
     APPROOT
     */
    define('APPROOT', dirname(dirname(__FILE__)));

    //URL Root usado para links
    // sempre que quiser usar link do public ou frontend
    // use URLROOT
    define('URLROOT', 'http://' . $_SERVER["SERVER_NAME"] . '/shareposts');    

    // Site Name
    define('SITENAME', 'SharePosts');