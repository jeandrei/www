<?php
class Bootstrap{
	private $controller;
	private $action;
	private $request;

	public function __construct($request){
		$this->request = $request;
		if($this->request['controller'] == ""){
			$this->controller = 'home';
		} else {
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		} else {
			$this->action = $this->request['action'];
		}
	echo $this->controller;
	}
	/*
	No debian para funcionar o Mod_Rewrite que permite criar URLs simples e customizadas.
	primeiro temos que ativar o modulo a2enmod rewrite
	# sudo a2enmod rewrite
	Depois criamos o arquivo .htaccess dentro do diretório raiz do projeto
	# sudo vim .htaccess e colocamos o conteúdo abaixo
	Options +FollowSymLinks
	RewriteEngine on
	RewriteRule ^([a-zA-Z]*)/?([a-zA-Z]*)?/?([a-zA-Z0-9]*)?/?$ index.php?controller=$1&action=$2&id=$3 [NC,L]
	Por fim alteramos o arquivo
	# sudo vim /etc/apache2/sites-available/000-default.conf
	e no final do arquivo colocamos o seguinte
	<Directory /var/www/>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
 	</Directory>
 	Reiniciamos o apache
 	#/etc/init.d/apache2 restart
 	se tudo tiver dado certo no navegador quando digitar a url do projeto/qualquercoisa ele vai passar o qualquercoisa para a classe Bootstrap __construct($request) e vai trazer o valor para ser atribuido a URL final.
 	O objetivo é ter uma pasta para cada função do projeto e a url será montada automaticamente por exemplo
 	se digitar dev/usuario ele vai passar para o controller usuario mesmo que a pasta usuario não exista
	*/
}
?>