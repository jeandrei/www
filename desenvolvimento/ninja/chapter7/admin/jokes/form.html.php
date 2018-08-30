<?php
include_once('../../includes/constants.inc.php');
include INCLUDES . '/helpers.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php htmlout($pageTitle); ?></title>
	<script src="../../funcoes/javascript.js"></script>
	<style type="text/css">
		textarea{
			display: block;
			width: 100%;
		}
	</style>
</head>
<body>	
		
<script type="text/javascript">
	//seta o foco no campo name
	window.onload = function(){focofield("text");}		
</script>
<h1><?php htmlout($pageTitle); ?></h1>
	<form action="?<?php htmlout($action);?>" method="post">		
		
		<!--JOKE TEXT-->
		<div>
			<label for="text">Type your joke here:</label>
			<textarea id="text" name="text" rows="3" cols="40"><?php htmlout($text); ?></textarea>
		</div>


		<!--DROP DOWN AUTHORS-->
		<div>
			<label for="author">Author:</label>
			<select name="author" id="author">
				<option value="">Select one</option>
				<?php foreach ($authors as $author): ?>
					<option value="<?php htmlout($author['id']); ?>"<?php
					if ($author['id'] == $authorid)
						{
							echo ' selected';
						}
					?>><?php htmlout($author['name']); ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		
		<!--CHECKBOX CATEGORIES-->
		<fieldset>
			<legend>Categories:</legend>
			<?php foreach ($categories as $category): ?>
				<div><label for="category<?php htmlout($category['id']);
				?>"><input type="checkbox" name="categories[]" 
				id="category<?php htmlout($category['id']); ?>"
				value="<?php htmlout($cagetory['id']); ?>"<?php 
				if ($category['selected'])
					{
						echo 'checked';
					}
					?>><?php htmlout($category['name']); ?></label>
				</div>
			<?php endforeach; ?>
		</fieldset>


		<div>			
				<input type="hidden" name="id" id="id" value="<?php htmlout($id); ?>">
				<input type="submit" name="submit" value="<?php htmlout($button); ?>">	
		</div>
	</form>
</body>
</html>