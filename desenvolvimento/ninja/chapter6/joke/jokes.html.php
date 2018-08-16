<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>List of Jokes</title>
</head>
<body>
	<p><a href="?addjoke">Add your own joke</a></p><!--?addjoke vai passar addjoke para o GET (isset($_GET['addjoke'])) se for verdadeiro entra no if-->
	<p>Here ara all tha jokes in the database:</p>
	<?php foreach ($jokes as $joke): ?>
		<form action="?deletejoke" method="post">
			<blockquote style="border: 1px solid black;">
				<p>
					<?php echo htmlspecialchars($joke['text'], ENT_QUOTES, 'UTF-8'); ?>
					<input type="hidden" name="id" value="<?php echo $joke['id']; ?>">
					<input type="submit" value="Delete">
					(by <a href="mailto:<?php echo htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8');?>">
						<?php echo htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8'); ?></a>)
				</p>
			</blockquote>
		</form>
	<?php endforeach; ?>
</body>
</html>