<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('mensagem');?>

<div class="row align-items-center mb-3"> 
    <div class="col-md-6">
        <h1>Alunos</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/datausers/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Adicionar
        </a>
    </div>
</div> 



<?php

// Caso ainda não tenham registros de aluno para o usuário
if(empty($data)){ 
  $data = ['error' => "Ainda não existem alunos cadastrados"]; 
}

if(isset($data['error'])){ 
  die($data['error']);
} 

?>    


<!-- MONTO A TABELA DENTRO DE UM CONTAINER FLUID PARA OCUPAR TODA A TELA -->
<div class="row">
    <div class="col text-center small">
        <table class="table table-striped table-sm" style="font-size: 15px;">
            <thead>
            <tr>                             
                <th scope="col">Nome da Criança</th>
                <th scope="col">Data de Nascimento</th>   
                <th scope="col"></th> 
                <th scope="col"></th>   
            </tr>
            </thead>   
            <tbody>             
                <?php foreach ($data as $registro): ?>
                    <tr>
                        <td><?php echo $registro->nome_aluno;?></td>
                        <td><?php echo date('d/m/Y', strtotime($registro->nascimento)); ?></td>   
                        <td><a href="<?php echo URLROOT; ?>/datausers/edit/<?php echo $registro->id_aluno; ?>" class="fa fa-edit btn btn-success pull-right btn-sm">Editar</a></td>                
                        <td><a 
                                href="<?php echo URLROOT; ?>/datausers/delete/<?php echo $registro->id_aluno;?>" 
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




<?php require APPROOT . '/views/inc/footer.php'; ?>