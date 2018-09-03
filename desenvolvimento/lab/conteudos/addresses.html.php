<?php  
include_once ('includes/constantes.php');
include_once AUXILIARES.'/helpers.inc.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jeandrei Walter" />
	<meta name="description" content="Conteúdos para estudo" />		
	<title>Conteúdos</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

<div id="linkLogin">	
	<a href="admin/">Login</a>
</div>

<div id="titulo">
	<p>Endereços cadastrados</p>
</div>

<div id="enderecos">
	<?php foreach ($addresses as $address): ?>
	<ul>	
		<li>
			<a href="<?php echo ($address['address']); ?>"><?php htmlout($address['description']); ?></a>
			<div id="objetivo"><?php htmlout($address['objective']); ?></div>
		</li>
	</ul>
	<?php endforeach; ?>	
</div>

</body>
</html>


