<?php

ini_set('default_charset', 'utf-8'); 

// DB Params
// Quando estiver trabalhando com container do docker-compose
// DB_HOST é o nome do container que está rodando o banco de dados
define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', 'rootadm');
define('DB_NAME', 'filaunica');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// valor que está nesta constante /var/www/html/mvc/app

// URL ROOT
define('URLROOT', 'http://' . $_SERVER["SERVER_NAME"] . '/filaunica');
//define('URLROOT', 'http://localhost/shareposts');

//App Version
define('APPVERSION', '1.0.0');

// Site Name
define('SITENAME', 'Fila Única de Penha/SC');