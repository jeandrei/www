<?php
require 'classes/Database.php';

$database = new Database;

$database->query('SELECT * FROM posts WHERE id = :id');
$database->bind(':id', 1);
$rows = $database->resultset();
?>

<h1>Post</h1>
<div>
<?php foreach($rows as $row) : ?>
	<div>
		<h3><?php echo $row['title'];?>
		<h3><?php echo $row['body'];?>
	</div>
<?php endforeach; ?>
</div>
