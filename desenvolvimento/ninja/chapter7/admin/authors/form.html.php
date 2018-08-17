<?php
include_once('../../includes/constants.inc.php');
include INCLUDES . '/helpers.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php htmlout($pageTitle); ?></title>
</head>
<body>
	<form action="<?php htmlout($action);?>" method="post">
		<div>
			<label for="name">Name:>
				<input type="text" name="name" id="name" value="<?php htmlout($name); ?>">
			</label>
		</div>

		<div>
			<label for="name">Email:>
				<input type="text" name="email" id="email" value="<?php htmlout($email); ?>">
			</label>
		</div>

		<div>			
				<input type="hidden" name="id" id="id" value="<?php htmlout($id); ?>">
				<input type="submit" name="submit" value="<?php htmlout($button); ?>">	
		</div>
	</form>
</body>
</html>