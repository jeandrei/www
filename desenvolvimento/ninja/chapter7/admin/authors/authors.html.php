<?php
include_once('../../includes/constants.inc.php');
include INCLUDES . '/helpers.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Authors</title>
	<script type="text/javascript">
		function question(ask){
			return confirm (ask);
		}	
	</script>
</head>
<body>
	<h1>Manage Authors</h1>
	<p><a href="?add">Add new author</a></p>
	<ul>
		<?php foreach ($authors as $author): ?>
			<li>
				<form action="" method="post">
					<div>
						<?php htmlout($author['name']); ?>
						<input type="hidden" name="id" value="<?php echo $author['id']; ?>">
						<input type="submit" name="action" id="Edit" value="Edit">
						<input type="submit" name="action" id="Delete" value="Delete" onclick="if(question('Are you sure you want to delete?') == true)
									{
										document.forms[0].submit();
									}
									else
									{										
										return false;
									}");  							
    					">						
					</div>
				</form>
			</li>
		<?php endforeach; ?>
	</ul>
	<p><a href="..">Return to JMS home</a></p>
</body>
</html>