<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//todos os erros deixar só a linha abaixo
//error_reporting(E_ALL);
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);


// DB Params
define('DB_HOST', 'mysql');
define('DB_USER', '_YOUR_USER_');
define('DB_PASS', '_YOUR_PASS_');
define('DB_NAME', '_YOUR_DBNAME_');
    
/* App Root
 Temos que pegar do root até a pasta app
 só __FILE__ traz todo o caminho
 /var/www/html/mvc/app/config/config.php
 para tirar um nível no final usamos a função
 dirname() que tira um nível, como temos que tirar o config.php
 e config temos que usar duas vezes a função
 resultado será /var/www/html/jmvc/app
 Sepre que quiser adicionar algo da pasta app use
 APPROOT
 */
define('APPROOT', dirname(dirname(__FILE__)));

//URL Root usado para links
// sempre que quiser usar link do public ou frontend
// use URLROOT
define('URLROOT', 'http://' . $_SERVER["SERVER_NAME"] . '/jmvc');    

// Site Name
define('SITENAME', '_YOUR_SITE_NAME_');

// Site Description
define('DESCRIPTION' , '_YOUR_DESCRIPTION_');

// App Version
define('APPVERSION', '1.0.0');


?>