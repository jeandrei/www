<?php require APPROOT . '/views/inc/header.php'; ?>




<?php 

$status = "Aguardando";

// A CONEXÃO COM O BANCO DE DADOS É FEITO NA CONSTRUCT DO LIBRARIES/PAGINATOR
// PROCURE POR "AQUI EU ALTEREI FIZ A CONEXÃO COM O BANCO DE DADOS QUE ESTÁ NO DATABASE" 

/*
1 A BIBLIOTÉCA PAGINATION QUE ESTÁ EM libraries/Pagination E É CARREGADA AUTOMATICAMENTE PELO sql_autoload_register assim como as outras libraries Core, Database etc
2 Eu extendi a classe Pagination da biblioteca libraries/Pagination para a database Pagination extends Database assim eu consigo utilizar os mesmos parâmetros de conexão da classe database
- dúvida procure em libraries/Pagination "AQUI EU ALTEREI FIZ A CONEXÃO COM O BANCO DE DADOS QUE ESTÁ NO DATABASE"
3 Cria o controller com o código em comentário vai lá no controller Exemplo_paginacao.php index() que vc vai ver
4 Cria o model com um metodo para buscar os dados no banco de dados getfila($page, $options)
5 Atribua o resultado desse método a variável $paginate $paginate = $data['paginate'];
- a variável $data['paginate'] vem do resultado do método getfila

*/


$paginate = $data['paginate'];

if($paginate->success == true)
{

    /*
     * Fetch our results
     */
    $result = $paginate->resultset->fetchAll();


     /*
     * Work with our data rows
     */
    foreach($result as $row)
    {
        echo '<p>'.$row['id'].', '.$row['nomecrianca'].'</p>';
    }


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

   

}










?>







<?php require APPROOT . '/views/inc/footer.php'; ?>

