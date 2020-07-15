<!-- HEADER DA PAGINA -->
<?php require APPROOT . '/views/inc/header.php'; ?>


<?php flash('mensagem');?>

<div class="row align-items-center mb-3"> 
    <div class="col-md-6">
        <h1>Registros da fila</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/cadastros/new" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Adicionar
        </a>
    </div>
</div> 



<!-- MONTO A TABELA DENTRO DE UM CONTAINER FLUID PARA OCUPAR TODA A TELA -->
<div class="container">
    <div class="row">
        <div class="col text-center small">
            <table class="table table-striped table-sm" style="font-size: 11px;">
                <thead>
                <tr>                             
                    <th scope="col">Nome da Criança</th>
                    <th scope="col">Data de Nascimento</th>                             
                    <th scope="col">Responsável</th> 
                    <th scope="col">Protocolo</th>
                    <th scope="col">Registro</th>        
                    <th scope="col">Status</th>                    
                </tr>
                </thead>
                    
                <tbody>        
                    <?php foreach ($data as $registro): ?>
                        <tr>
                            <td><?php echo $registro->nomecrianca;;?></td>
                            <td><?php echo date('d/m/Y h:i:s', strtotime($registro->nascimento)); ?></td>
                            <td><?php echo $registro->responsavel; ?></td>
                            <td><?php echo $registro->protocolo; ?></td>
                            <td><?php echo date('d/m/Y h:i:s', strtotime($registro->registro)); ?></td>
                            <td><?php echo $registro->status; ?></td> 
                            <td><a href="<?php echo URLROOT; ?>/cadastros/edit/<?php echo $registro->id; ?>" class="fa fa-edit btn btn-success pull-right btn-sm">Editar</a></td>                
                            <td><a 
                                    href="<?php echo URLROOT; ?>/cadastros/delete/<?php echo $registro->id;?>" 
                                    class="fa fa-remove btn btn-danger pull-left btn-sm"
                                    onclick="if(question('Tem certeza que deseja remover o registro?') == true)
                                            {
                                                document.forms[0].submit();
                                            }
                                            else
                                            {										
                                                return false;
                                            }"                       
                                >                        
                                    Remover
                                </a></td>                           
                        </tr>   
                    <?php endforeach; ?>
                </tbody>
            </table>  
        </div>
    </div>
</div>



                                                         



<?php require APPROOT . '/views/inc/footer.php'; ?>



