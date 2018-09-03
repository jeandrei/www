<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/lab/conteudos/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jeandrei Walter" />
	<meta name="description" content="Conteúdos para estudo" />
	<title>Conteúdos</title>
</head>
<body>
<p>Sites registrados</p>

	<?php foreach ($addresses as $address): ?>
		<p>
			<a href="<?php htmlout($addresses['address']); ?>"><?php htmlout($addresses['description']); ?></a>
		</p>

	<?php endforeach; ?>	

<pre>
<?php //print_r($addresses);?>
</pre>
</body>
</html>


