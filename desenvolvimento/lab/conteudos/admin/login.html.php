<?php  
include_once ('../../conteudos/includes/constantes.php');
include_once AUXILIARES.'/helpers.inc.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jeandrei Walter" />
	<meta name="description" content="Log In" />
	<link rel="stylesheet" type="text/css" href="http://salatecadolfo.atwebpages.com/conteudos/css/estilo.css">
	<title>Log In</title>
</head>
	<body onLoad="document.getElementById('email').focus();">
	<div id="login">
		<h1>Log In</h1>
		
		<div class="alerta">
			<p>Por favor efetue o login para ter acesso a pagina solicitada.</p>
		</div>

		<div>
			<?php if (isset($loginError)): ?>
				<p class="erro"><?php htmlout($loginError); ?></p>
			<?php endif; ?>
		</div>

		<form action="" method="post">
			<div>
				<label for="email">Email:<input class="inputText" type="text" 
					name="email" id="email" value=""></label>
			</div>

			<div>
				<label for="password">Password:<input class="inputPassword" type="password" 
					name="password" id="password" value=""></label>
			</div>
			
			<div>
				<input type="hidden" name="action" value="login">
				<input class="botao" type="submit" value="Log in">
			</div>
		</form>
		<a class="link" href="../index.php">Retornar</a>
	</div>
	</body>
</html>
