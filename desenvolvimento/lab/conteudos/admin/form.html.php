<?php 
include_once ('../../conteudos/includes/constantes.php');
include_once AUXILIARES.'/helpers.inc.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jeandrei Walter" />
	<meta name="description" content="Gerenciador de Endereços web" />
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title><?php htmlout($pageTitle); ?></title>
</head>
<body onLoad="document.getElementById('description').focus();">
<div id="area">
	<h1><?php htmlout($pageTitle); ?></h1>
	
	<?php if (isset($ValidarErro)): ?>
		<p class="erro"><?php echo nl2br($ValidarErro); ?></p>
	<?php endif; ?>
	
	<form id="formulario" autocomplete="off" action="?<?php htmlout($action); ?>" method="post">
		<fieldset>
			<legend>Formulário</legend>
				<label for="description">Descrição:</label><input class="campo_description" type="text" name="description" 
				id="description" value="<?php htmlout($description); ?>"><br>
			

			
				<label for="address">Endereço/URL:</label><input class="campo_address" type="text" name="address" 
				id="address" value="<?php htmlout($address); ?>" size="50"><br>
			

			
				<label for="objective">Objetivo:</label><br><textarea class="obj" name="objective" rows="5" cols="40"><?php echo $objective;?></textarea><br>		
				
				
		</fieldset>
		<input type="hidden" name="id" value="<?php htmlout($id); ?>">
		<input class="botao" type="submit" value="<?php htmlout($button); ?>">	
		<button class="botao"><a style="text-decoration:none; cursor:default; color:black;" href="index.php">Retornar</a></button>		
	</form>	
</div>
	
</body>
</html>
