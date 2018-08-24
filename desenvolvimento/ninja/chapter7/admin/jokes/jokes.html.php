<?php
include_once('../../includes/constants.inc.php');
include_once INCLUDES . '/helpers.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Jokes: Search Results</title>
	<script src="../../funcoes/javascript.js"></script>	
</head>
<body>
	<h1>Search Results</h1>
	<?php if (isset($jokes)): ?>
	<table>
		<tr><th>Joke Text</th><th>Options</th></tr>
		<?php foreach ($jokes as $joke): ?>
		<tr>			
			<td><?php htmlout($joke['text']); ?></td>
		<td>
			<form action="?" method="post">
				<div>
					<input type="hidden" name="id" value="<?php htmlout($joke['id']); ?>">
					<input type="submit" name="action" value="Edit">
					<input type="submit" name="action" value="Delete">
				</div>
			</form>
		</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>	
	<p><a href="?">New Search</a></p>
	<p><a href="..">Return to JMS home</a></p>
</body>
</html>