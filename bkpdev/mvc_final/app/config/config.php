<?php
// DB Params
// Quando estiver trabalhando com container do docker-compose
// DB_HOST é o nome do container que está rodando o banco de dados
define('DB_HOST', 'localhost_se_for_usando_docker_nome_do_container');
define('DB_USER', 'USUARIO_DO_BANCO_DE_DADOS');
define('DB_PASS', 'SENHA');
define('DB_NAME', 'BANCO_DE_DADOS');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// valor que está nesta constante /var/www/html/mvc/app

// URL ROOT
define('URLROOT', '--URL-- exemplo http://localhost/mvc');

// Site Name
define('SITENAME', 'NOME DO SITE');