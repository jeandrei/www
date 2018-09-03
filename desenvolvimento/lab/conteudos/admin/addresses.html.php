<?php 
include_once ('../../conteudos/includes/constantes.php');
include_once AUXILIARES.'/helpers.inc.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jeandrei Walter" />
	<meta name="description" content="Conteúdos para estudo" />
	<link rel="stylesheet" type="text/css" href="http://salatecadolfo.atwebpages.com/conteudos/css/estilo.css">
	<title>Conteúdos</title>
</head>
<body>
<a class="link" href="users/index.php">Gerenciar Usuários</a>

<div id="logout">	
	<?php include 'logout.inc.html.php';?>
</div>

<div id="titulo">
	<p>Endereços cadastrados</p>
</div>

<p><a class="link" href="?add">Adicionar um novo endereço</a></p>
<div id="enderecos">	
		<?php foreach ($addresses as $address): ?>
		<ul>
			<li>
				<form action="" method="post">
					<div><?php if (isset($address['name'])){echo "Usuário " . $address['name'] . " - ";}?>
						<a href="<?php echo ($address['address']); ?>" target="_blank"><?php htmlout($address['description']); ?></a>
						<div id="objetivo"><?php htmlout($address['objective']); ?></div>
						<input type="hidden" name="id" value="<?php echo $address['id']; ?>">
	              		<input class="botao" type="submit" name="action" value="Editar">
	              		<input class="botao" type="submit" name="action" value="Deletar">	              		
					</div>	
				</form>
			</li>
		</ul>			
		<?php endforeach; ?>		
</div>
</body>
</html>


