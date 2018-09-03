<?php
include_once ('../../conteudos/includes/constantes.php');
include_once AUXILIARES.'/helpers.inc.php';
//$url = DIR."/conteudos/admin/index.php"; //local
$url = "http://salatecadolfo.atwebpages.com/conteudos/index.php"; //web
?>

<form action="" method="post">
	<div>
		<input type="hidden" name="action" value="logout">
		<input type="hidden" name="goto" value="<?php echo "$url";?>">
		<input style="float:right; margin-right:10px;" class="botao" type="submit" value="Sair">
	</div>
</form>
