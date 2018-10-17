<?php
// Database Connection Constants

/*
	Se estiver usando o PHP 7 vai dar um erro de função não definida mysqli
	se isso acontecer entre no container com o servidor apache
	docker exec -it container bash
	E dentro do container execute
	docker-php-ext-install mysqli 
	docker-php-ext-enable mysqli
	apachectl restart

	Ou simplesmente adicione a linha no arquivo www\docker\webserver\Dockerfile
	RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

	Se estiver trabalhando com docker no host define('DB_HOST','mysql'); mysql é o nome do container que verificamos com docker-composer ps
*/

define('DB_HOST','mysql');
define('DB_USER','root');
define('DB_PASS','rootadm');
define('DB_NAME','gallery_db');


?>