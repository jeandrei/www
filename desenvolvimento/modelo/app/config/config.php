<?php
// DB Params
// Quando estiver trabalhando com container do docker-compose
// DB_HOST é o nome do container que está rodando o banco de dados
define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', 'rootadm');
define('DB_NAME', 'modelo');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// valor que está nesta constante /var/www/html/mvc/app

// URL ROOT PARA LINKS
define('URLROOT', 'http://' . $_SERVER["SERVER_NAME"] . '/modelo');

// Site Name
define('SITENAME', 'MODELO');

//APP VERSION
define('APPVERSION', '1.0.0');