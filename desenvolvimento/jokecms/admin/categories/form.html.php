<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/jokecms/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jeandrei Walter" />	
	<title><?php htmlout($pageTitle); ?></title>
</head>
<body>
	<h1><?php htmlout($pageTitle); ?></h1>
	<form action="?<?php htmlout($action); ?>" method="post">
		<div>
			<label for="name">Name: <input type="text" name="name" id="id"
				value="<?php htmlout($name); ?>"></label>
		</div>

		<div>
			<input type="hidden" name="id" value="<?php htmlout($id); ?>">
			<input type="submit" value="<?php htmlout($button); ?>">
		</div>
</body>
</html>
