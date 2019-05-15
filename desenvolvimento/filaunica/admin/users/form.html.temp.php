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
<body>
<div id="area">
	<h1><?php htmlout($pageTitle); ?></h1>
	
	<?php if (isset($ValidarErro)): ?>
		<p class="erro"><?php echo nl2br($ValidarErro); ?></p>
	<?php endif; ?>


	<form id="formulario" action="?<?php htmlout($action); ?>" method="post" autocomplete="off">
		
		<div>
			<label for="name">Name: <input type="text" name="name" id="name" value="<?php htmlout($name); ?>"></label>			
		</div>

		<div>
			<label for="email">Email: <input type="text" name="email" id="email" value="<?php htmlout($email); ?>"></label>
		</div>

		<div>
			<label for="password">Set password: <input type="password"
				name="password" id="password"></label>
		</div>

		<fieldset>
			<legend>Roles:</legend>
			<?php for ($i = 0; $i < count($roles); $i++): ?>
				<div>
					<label for="role<?php echo $i; ?>"><input
						type="checkbox"
						name="roles[]" id="role<?php echo $i; ?>"
						value="<?php htmlout($roles[$i]['id']); ?>"<?php 
						if ($roles[$i]['selected'])
						{
							echo ' checked';
						}
						?>><?php htmlout($roles[$i]['id']); ?>
					</label>:
					<?php htmlout($roles[$i]['description']); ?>
				</div>
		 	<?php endfor; ?>
		</fieldset>

		<div>
			<input type="hidden" name="id" value="<?php htmlout($id); ?>">
			<input type="submit" value="<?php htmlout($button); ?>">
		</div>
	</form>
</div>
	<a href="../index.php">Retornar</a>
</body>
</html>
