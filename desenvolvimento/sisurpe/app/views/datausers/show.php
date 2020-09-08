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



   
               
                <?php foreach ($data as $registro): ?>
                    <div class="card card-body mb-3">
                        
                        <!--text-right para alinhar os botões no lado direito-->
                        <div class="text-right" style="margin-bottom:2rem;">
                            <!--btn-group para agrupar os botões--> 
                            <div class="btn-group"> 

                                    <a href="<?php echo URLROOT; ?>/datausers/edit/<?php echo $registro['id_aluno']; ?>" class="fa fa-edit btn btn-success btn-lg">Editar</a>

                                    <a 
                                        href="<?php echo URLROOT; ?>/datausers/delete/<?php echo $registro['id_aluno'];?>" 
                                        class="fa fa-remove btn btn-danger btn-lg <?php echo ($this->dadosModel->getDadosAnuaisByid($registro['id_aluno'])) ? 'disabled' : ''; ?>"
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
                                    </a>    

                            </div>
                        </div> 
                        
                        <h4 class="card-title"><?php echo strtoupper($registro['nome_aluno']); ?></h4>
                        
                        <div class="bg-light p-2 mb-3">
                        Nascimento: <?php echo date('d/m/Y', strtotime($registro['nascimento'])); ?> 
                        </div>
                        
                        <div class="bg-light p-2 mb-3">
                        Ultima atualização dos Dados Escolares em: <b><?php echo ($this->dadosModel->getDadosAnuaisByid($registro['id_aluno'])) ? date('d/m/Y', strtotime($registro['ultima_atualizacao']->ultima_atual)) : 'Aluno sem informação de Dados Escolares'; ?></b>
                        </div>     
                        
                        <a href="<?php echo URLROOT; ?>/anuals/index/<?php echo $registro['id_aluno']; ?>" class="btn btn-dark">
                        Dados Escolares</a>

                          
                    </div>
                <?php endforeach; ?>
             
    





<?php require APPROOT . '/views/inc/footer.php'; ?>