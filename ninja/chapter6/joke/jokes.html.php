<?php
include_once ROOT . '/includes/helpers.inc.php';//Funões criadas pelo desenvolvedor que facilitam a programação ex: htmlout
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>List of Jokes</title>
</head>
<body>
	<p><a href="?addjoke">Add your own joke</a></p>
	<!--?addjoke vai passar addjoke para o GET (isset($_GET['addjoke'])) se for verdadeiro entra no if-->
	<p>Here ara all tha jokes in the database:</p>
	<?php 
	foreach ($jokes as $joke): ?>
		<form action="?deletejoke" method="post">
			<blockquote style="border: 1px solid black;">
				<p>
					<?php echo htmlout($joke['text']); ?>
					<input type="hidden" name="id" value="<?php echo $joke['id']; ?>">
					<input type="submit" value="Delete">
					(by <a href="mailto:<?php echo htmlout($joke['email']);?>">
						<?php echo htmlout($joke['name']); ?></a>)
				</p>
			</blockquote>
		</form>
	<?php endforeach; ?>
</body>
</html>