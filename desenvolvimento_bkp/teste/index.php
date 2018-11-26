<?php
require_once 'functions.php';   
setcookie('username', $_POST['username']);
$submitted = isset($_POST['username']) && isset($_POST['password']);
if($submitted){
    setcookie('username', $_POST['username']);
}

//lê o array contido no arquivo books.json
$booksJason = file_get_contents(__DIR__ . '/books.json');
$books = json_decode($booksJason, true);
//var_dump($books);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookstore</title>
</head>
<body>
       
    <p><?php echo loginMessage(); ?></p>

    <?php
        if (isset($_GET['title']) && isset($_GET['author'])){
    ?>
            <p>The book you are lookig for is</p>
            <ul>
                <li><b>Title</b>: <?php echo $_GET['title']; ?></li>
                <li><b>Author</b>: <?php echo $_GET['author']; ?></li>
            </ul>
    <?php
        }else{
    ?>
        <p>You are not looking for a book?</p>
    <?php
        }
    ?>

    <ul>
        <?php foreach ($books as $book) : ?>           
                <li><?php echo printableTitle($book); ?> </li>            
        <?php endforeach; ?>
    </ul>
    <?php echo "O diretório root deste arquivo é -> " . __DIR__ ; ?>
</body>
</html>