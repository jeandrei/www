<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['pagina']['title']; ?></h1>
<p><?php echo $data['pagina']['description']; ?></p>
<pre>
<?php 

//print_r($data['registros']);

echo 'num row is ' . $data['registros']['numrows'];
$numrows = $data['registros']['numrows']; 

?>
</pre>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Protocolo</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data['registros']['result'] as $registro):?>        
        <tr>        
            <td><?php echo strtoupper($registro->nomecrianca); ?></td>
            <td><?php echo date('d/m/Y h:i:s', strtotime($registro->nascimento)); ?></td>
            <td><?php echo $registro->protocolo;?></td>
            <td><?php echo $registro->status;?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
 <!--PAGINAÇÃO-->
 <ul class="pagination list-inline justify-content-center">

        <?php
        

        $pagLink = "";
    
   
    
    
    if(isset($data)){
            $total_records =  $data['registros']['numrows'];       
            $total_pages = ceil($total_records / 10);              
               
            for ($i=1; $i<=$total_pages; $i++) {
                        // SE O CONTADOR FOR IGUAL AO NÚMERO DA PAGINA PASSADA PELO GET ATRIBUI O VALOR ACTIVE A VARIÁVEL ACTIVE
                        // E COLOCA NA CLASSE class=page-item
                        if(isset($_GET['page']) && $i == $_GET['page']){$active = 'active';}else{ $active = "";}                          
                        // AQUI PARA CADA PÁGINA MONTA UM LINK PASSANDO OS VALORES PELO GET DAÍ ESSES VALORES SÃO PASSADOS PARA A FUNÇÃO
                        // QUE FAZ A BUSCA NO BANCO DE DADOS COM O PARÂMETRO DE ONDE INÍCIAR COM OS REGISTROS E ONDE TERMINAR
                        $pagLink .= "<li class='page-item $active'><a class='page-link' href=" . URLROOT . "/paginators/index?page=".$i ."&nome=". $buscaNome . "&etapa=". $buscaEtapa ."&status=". $buscaStatus .">".$i."</a></li>";  

            }      
            echo $pagLink . "</div>"; 
    } 
    ?>  

    </ul>                
        
        
       




<?php require APPROOT . '/views/inc/footer.php'; ?>

