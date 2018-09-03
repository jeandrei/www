<?php 
include_once ('../../includes/constantes.php');
include_once AUXILIARES.'/helpers.inc.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jeandrei Walter" />
	<meta name="description" content="Editing Author" />
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
	<title><?php htmlout($pageTitle); ?></title>
</head>
<body onLoad="document.getElementById('name').focus();">
<div id="areaUser">
	<h1><?php htmlout($pageTitle); ?></h1>
	
	<?php if (isset($ValidarErro)): ?>
		<p class="erro"><?php echo nl2br($ValidarErro); ?></p>
	<?php endif; ?>


	<form id="formulario" action="?<?php htmlout($action); ?>" method="post" autocomplete="off">
		<fieldset>
		<legend>Formulário</legend>

			<label for="name">Name:</label>
			<input class="campo_name" type="text" name="name" id="name" value="<?php htmlout($name); ?>">
			<br>			
		

		
			<label for="email">Email:</label>
			<input class="campo_email" type="text" name="email" id="email" value="<?php htmlout($email); ?>">
			<br>

		
			<label for="password">Senha:</label>
			<input class="campo_password" type="password" name="password" id="password">
			<br>

		
			<legend>Atribuições:</legend>
			<?php for ($i = 0; $i < count($roles); $i++): ?>
				<div>
					<label style="position:relative;font-weight:bold;font-style:italic;font-size:18px;" for="role<?php echo $i; ?>"><input
						type="checkbox"
						name="roles[]" id="role<?php echo $i; ?>"
						value="<?php htmlout($roles[$i]['id']); ?>"<?php 
						if ($roles[$i]['selected'])
						{
							echo ' checked';
						}
						?>><?php htmlout($roles[$i]['id']); ?>
					</label>:
					<p style="position:relative; margin-left:22px;"><?php htmlout($roles[$i]['description']); ?></p>
				</div>
		 	<?php endfor; ?>
		</fieldset>	
			<input type="hidden" name="id" value="<?php htmlout($id); ?>">
			<input class="botao" type="submit" value="<?php htmlout($button); ?>">
			<button class="botao"><a style="text-decoration:none; cursor:default; color:black;" href="index.php">Retornar</a></button>	
	</form>
</div>	
</body>
</html>
