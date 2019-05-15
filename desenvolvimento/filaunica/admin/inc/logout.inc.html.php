<?php
$url = URLROOT . '/admin';
?>

<form action="" method="post">
	<div>
		<input type="hidden" name="action" value="logout">
		<input type="hidden" name="goto" value="<?php echo "$url";?>">
		<input style="float:right; margin-right:10px;" class="botao" type="submit" value="Sair">
	</div>
</form>
