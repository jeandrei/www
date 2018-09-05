<?php
include INCLUDES . '/helpers.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage jokes</title>
	<script src="../../funcoes/javascript.js"></script>
</head>
<body>
<script type="text/javascript">
	//seta o foco no campo name
	//window.onload = function(){focofield("text");}		
</script>
	<h1>Manage Jokes</h1>
	<p><a href="?add">Add new joke</a></p>
	<form action="" method="get">
		<p>View jokes satisfying the following criteria:</p>
		<div>
			<label for="author">By author:</label>
			<select name="author" id="author">
				<option value="">Any author</option>
				<?php foreach ($authors as $author): ?>
					<option value="<?php htmlout($author['id']); ?>"> <?php htmlout($author['name']); ?> </option>
				<?php endforeach; ?>
			</select>
		</div>
		<div>
			<label for="category">By category</label>
			<select name="category" id="category">
				<option value="">Any category</option>
				<?php foreach ($categories as $category): ?>
					<option value="<?php htmlout($category['id']); ?>"><?php htmlout($category['name']); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div>
			<label for="text">Containing text:</label>
			<input type="text" name="text" id="text">
		</div>
		<div>
			<input type="hidden" name="action" value="search">
			<input type="submit" value="search">
		</div>
	</form>
	<p><a href="..">Return to JMS home</a></p>
	<?php include '../logout.inc.html.php'; ?>
</body>
</html>