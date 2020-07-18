<script>
    function limpar(){
        document.getElementById('buscanome').value = "";
        document.getElementById('buscanascimento').value = "";
        document.getElementById('buscastatus').value = "Todos";
    }

    
    window.onload = function(){focofield("buscanome");}

</script>

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



<!-- BOTÕES DE BUSCA -->
<form id="filtrar" action="<?php echo URLROOT; ?>/cadastros/index" method="post" enctype="multipart/form-data">

<!-- LINHA E COLUNAS PARA OS CAMPOS DE BUSCA -->
<div class="botoes" style="margin-bottom:20px;">
    <div class="row">
        
        <!-- COLUNA 1 NOME DA CRIANÇA-->
        <div class="col-lg-4">
            <label for="buscanome">
                Buscar por Nome
            </label>
            <input 
                type="text" 
                name="buscanome" 
                id="buscanome" 
                maxlength="60"
                class="form-control"
                value="<?php if(isset($_POST['buscanome'])){htmlout($_POST['buscanome']);} ?>"
                >
        </div>


        <!-- COLUNA 2 NASCIMENTO CRIANÇA-->
        <div class="col-lg-4">
            <label for="buscanome">
                Buscar por Nascimento
            </label>
            <input 
                type="date" 
                name="buscanascimento" 
                id="buscanascimento" 
                maxlength="60"
                class="form-control"
                value="<?php if(isset($_POST['buscanascimento'])){htmlout($_POST['buscanascimento']);} ?>"
                >
        </div>



        <!-- COLUNA 3 SITUAÇÃO-->
        <div class="col-lg-4">
            <label for="buscastatus">
                Busca por Situação
            </label> 
            <!--BOTÃO BUSCA SITUAÇÃO-->
            <select 
                name="buscastatus" 
                id="buscastatus" 
                class="form-control"                                        
            >
                    <option value="Todos">Todos</option>
                    <?php 
                    $status = array('Aguardando','Matriculado','Cancelado');                    
                    foreach($status as $row => $value) : ?> 
                        <option value="<?php echo $value; ?>" 
                                        <?php if(isset($_POST['buscastatus'])){
                                                echo $_POST['buscastatus'] == $value ? 'selected':'';
                                            }
                                        ?>
                        >
                            <?php echo $value;?>
                        </option>
                    <?php endforeach; ?>  
            </select> 
        </div>



    <!-- div row -->
    </div>


    
    <!-- LINHA PARA OS BOTÕES ATUALIZAR E LIMPAR -->
    <div class="row" style="margin-top:30px;">
        
        
        <div class="col-lg-4" style="padding-left:0;">
            <div class="form-group mx-sm-3 mb-2">
                <!-- BOTÃO ATUALIZAR -->                            
                <input type="submit" class="btn btn-primary mb-2" value="Atualizar">
                <!-- BOTÃO LIMPAR LIMPO OS DADOS COM UMA FUNÇÃO JAVASCRIPT LÁ EM CIMA-->
                <input type="button" class="btn btn-primary mb-2" value="Limpar" onClick="limpar()">
                <span class="badge align-middle text-danger" name="busca_err" id="busca_err"></span> 
            </div>                                                
        </div>
        

    </div>
    <!-- FIM LINHA PARA OS BOTÕES ATUALIZAR E LIMPAR -->

    



<!-- div class botoes -->
</div>


</form>
<!-- FIM BOTÕES DE BUSCA -->

<!-- A função BuscaRegistros ou retorna os dados ou retorna falso para o array $data -->
<!-- logo se for falso não tem dados para emitir então apresento a mensagem e interrompo o código -->
<?php if(!$data){ die('Sem dados para emitir'); } ?>

<!-- MONTO A TABELA DENTRO DE UM CONTAINER FLUID PARA OCUPAR TODA A TELA -->
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




                                                         



<?php require APPROOT . '/views/inc/footer.php'; ?>



