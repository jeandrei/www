<?php
// DB Params
// Quando estiver trabalhando com container do docker-compose
// DB_HOST é o nome do container que está rodando o banco de dados
define('DB_HOST', 'mysql');
define('DB_USER', 'spuser');
define('DB_PASS', 'mypassword');
define('DB_NAME', 'shareposts');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// valor que está nesta constante /var/www/html/mvc/app

// URL ROOT
define('URLROOT', 'http://localhost/shareposts');

// Site Name
define('SITENAME', 'SharePosts');

//App Version
define('APPVERSION', '1.0.0');