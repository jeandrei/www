<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>
<body>
    
</body>
</html>




<?php


/*
 * Show all errors (not required of course)
 */
ini_set('display_errors','On');
error_reporting(-1);


/*
 * Include the pagination.php class file
 */
require_once('../src/Pagination.php');


/*
 * Connect to the database (Replacing the XXXXXX's with the correct details)
 */
try
{
     $dbh = new PDO('mysql:host=mysql;dbname=paginacao', 'root', 'rootadm');
     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    print "Error!: " . $e->getMessage() . "<br/>";
}


/*
 * Get and/or set the page number we are on
 */
if(isset($_GET['page']))
{
$page = $_GET['page'];
}
else
{
$page = 1;
}


/*
 * Set a few of the basic options for the class, replacing the URL with your own of course
 */
$options = array(
    'results_per_page' => 6,
    'url' => 'http://localhost/paginacao/example/example_pdo.php?page=*VAR*',
    'db_handle' => $dbh
);


/*
 * Create the pagination object
 */
try
{
    $paginate = new pagination($page, 'SELECT * FROM demo_table ORDER BY id', $options);
}
catch(paginationException $e)
{
    echo $e;
    exit();
}


/*
 * If we get a success, carry on
 */
if($paginate->success == true)
{

    /*
     * Fetch our results
     */
    $result = $paginate->resultset->fetchAll();

    /*
     * Echo out the UL with the page links
     */
    echo '<p>'.$paginate->links_html.'</p>';

    /*
     * Echo out the total number of results
     */
    echo '<p style="clear: left; padding-top: 10px;">Total Results: '.$paginate->total_results.'</p>';

    /*
     * Echo out the total number of pages
     */
    echo '<p>Total Pages: '.$paginate->total_pages.'</p>';

    echo '<p style="clear: left; padding-top: 10px; padding-bottom: 10px;">-----------------------------------</p>';

    /*
     * Work with our data rows
     */
    foreach($result as $row)
    {
        echo '<p>'.$row['demo_field'].', '.$row['demo_field_two'].'</p>';
    }

}
