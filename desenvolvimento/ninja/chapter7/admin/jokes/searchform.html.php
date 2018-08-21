<?php
include INCLUDES . '/helpers.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage jokes</title>
</head>
<body>
	<h1>Manage Jokes</h1>
	<p><a href="?add">Add new joke</a></p>
	<form action="" method="get">
		<p>View jokes satisfying the following criteria:</p>
		<dir>
			<label for="author">By author:</label>
			<select name="author" id="author">
				<option value="">Any author</option>
				<?php foreach ($authors as $author): ?>
					<option value="<?php htmlout($author['id']); ?>"> <?php htmlout($author['name']); ?> </option>
				<?php endforeach; ?>
			</select>
		</dir>
	</form>
</body>
</html>