<?php require APPROOT . '/views/inc/header.php'; ?>




<?php 

require APPROOT . '/helpers/paginacao/src/Pagination.php';




/*
 * Connect to the database (Replacing the XXXXXX's with the correct details)
 */
try
{
     $dbh = new PDO('mysql:host=mysql;dbname=filaunica', 'root', 'rootadm');
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
    'results_per_page' => 16,
    'url' => 'http://localhost/modelo/exemplo_paginacaos/index.php?page=*VAR*&nome=' . $status,
    'db_handle' => $dbh,
);


/*
 * Create the pagination object
 */
try
{   
    if(isset($status)){
        $paginate = new pagination($page, "SELECT * FROM fila WHERE status = '$status' ORDER BY id", $options);    
    }
    else {
    $paginate = new pagination($page, 'SELECT * FROM fila ORDER BY id', $options);
    }
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
        echo '<p>'.$row['id'].', '.$row['nomecrianca'].'</p>';
    }

}










?>







<?php require APPROOT . '/views/inc/footer.php'; ?>

