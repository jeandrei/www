<?php
require 'classes/Database.php';

$database = new Database;


$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);//para não precisar usar $_POST podemos definir qualquer coisa ali por exemplo $recupera e para recuperar seria $recupera['title'];

if(isset($_POST['delete'])){
	$delete_id = $_POST['delete_id'];
	$database->query('DELETE FROM posts WHERE id = :id');
	$database->bind(':id', $delete_id);
	$database->execute();	
}

if(isset($post['submit'])){
	$title = $post['title'];
	$body = $post['body'];
	$database->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
	$database->bind(':title', $title);
	$database->bind(':body', $body);
	$database->execute();
	if($database->lastInsertId()){
		echo '<p>Post Added!</b>';
	}
}
$database->query('SELECT * FROM posts');
$rows = $database->resultset();
?>


<h1> Add Post</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<label>Post Title</label><br />
	<input type="text" name="title" placeholder="Add a Title..."/><br /><br /><br />
	<label>Post Body</label><br />
	<textarea name="body"></textarea><br /> <br />
	<input type="submit" name="submit" value="Submit" />
</form>

<h1>Posts</h1>
<div>
<?php foreach($rows as $row) : ?>
	<div>
		<h3><?php echo $row['title']; ?></h3>
		<p><?php echo $row['body']; ?></p>
		<br \>
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">			
			<input type="submit" name="delete" value="Delete" />
		</form>
	</div>
<?php endforeach; ?>
</div>
