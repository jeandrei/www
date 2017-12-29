<?php
class Bootstrap{
	// 1 por padrão o $_GET passa sempre os valores  [controller] => [action] => [id] => 
	//se ter um print_r($_GET) teremos como resultado Array ( [controller] => [action] => [id] => )
	
	private $controller;//ex users, shares
	private $action;//register, delete
	private $request;

	public function __construct($request){
		$this->request = $request;
		//2 $request recebe o que foi passado pelo $_GET imaginemos que foi Array ( [controller] =>shares [action] => [id] => )
		if($this->request['controller'] == ""){//** dev/users/register : users - controler ** register - action
			$this->controller = 'home';			//então se o controler for em branco vai jogar para a home	
		} else {
			$this->controller = $this->request['controller'];//3 $this->request['controller'];vai trazer shares, poderia ser users
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		} else {
			$this->action = $this->request['action'];
		}
	
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
	public function createController(){//4 vai passar o conroller shares
										//chamado lá no índex $controller = $bootstrap->createController(); 
		// Check Class
		if(class_exists($this->controller)){
			$parents = class_parents($this->controller);//vai trazer o parente da classe controller 
							  //$parents vai ficar com o valor Array ( [Controller] => Controller )			
			// Check Extend
			if(in_array("Controller", $parents)){
				if(method_exists($this->controller, $this->action)){//5 method_exists — Checks if the class method exists
																	//neste caso temos a classe shares dentro de shares.php	
					return new $this->controller($this->action, $this->request);//action index 
										//request o do passado pelo get Array ( [controller] => shares [action] => [id] => )
				} else {
					// Method Does Not exist
					echo '<h1>Method does not exist</h1>';
					return;
				}
			
			} else {
					// Base Controller Does Not exist
					echo '<h1>Base controller not found</h1>';
					return;
			}
		} else {
			// Controller Class Does Not exist
			echo '<h1>Controller Class does not exist</h1>';
			return;
		}
	}
}
?>