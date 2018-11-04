FROM php:7-apache
RUN apt-get update -y && apt-get install -y libpng-dev curl libcurl4-openssl-dev
RUN apt-get install -y vim
RUN docker-php-ext-install pdo pdo_mysql gd curl
RUN a2enmod rewrite
# para instalar o mysqli descomente a linha abaixo
#RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN service apache2 restart
