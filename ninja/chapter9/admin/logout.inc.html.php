<?php 
include_once '../../includes/constants.inc.php';
?>
<form action="" method="post">
	<div>
		<input type="hidden" name="action" value="logout">
		<input type="hidden" name="goto" value="<?php echo RAIZ . 'admin/';?>">
		<input type="submit" value="Log out">
	</div>
</form>