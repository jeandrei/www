<?php
/*
* MVC framework
* na url tudo irá acontecer através do nosso arquivo index.php
* iremos usar um arquivo .htaccess para fazer isso
* pois permite reescrever nossas urls 
* queremos também passar parametros pela url
* por exemplo app.com/index.php?url=post
* sendo assim com a url podemos ler o post controller
* teremos uma pasta chamada controller com um arquivo chamado post.php
* e dentro do arquivo post.php teremos a classe Posts{ }
* se a url passar app.com/index.php?url=post/add
* dentro da classe Posts será chamado o método function add(){}
* também passaremos parâmetros como IDs por exemplo
* supondo a url app.com/index.php?url=post/edit/1
* iremos chamar o controlador post, o método edit function edit($id){} passando o id 1
* e por padrão se nada for passado através da url a classe Post tem que
* chamar o método function index{ } que vai carregar o nosso index.php
*/

