<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>List of Jokes</title>
</head>
<body>
	<p>Here ara all tha jokes in the database:</p>
	<?php foreach ($jokes as $joke): ?>
		<blockquote style="border: 1px solid black;">
			<p>
				<?php echo htmlspecialchars($joke, ENT_QUOTES, 'UTF-8'); ?>
			</p>
		</blockquote>
	<?php endforeach; ?>
</body>
</html>