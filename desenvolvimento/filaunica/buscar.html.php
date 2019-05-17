<?php
require 'inc/header.inc.php';
?>

<body>

<img src="img/LOGO.png" class="img-fluid" alt="Responsive image">
<hr>
<h1 align="center">RESULTADO DA BUSCA POR PROTOCOLO</h1>
    <div class="text-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Registro</th>
                    <th scope="col">Protocolo</th>
                    <th scope="col">Posição na fila</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Nome da Criança</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Etapa</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($registro['registro']));?>
                    <td><?php echo $protocolo;?>
                    <td><?php echo $posicao['posicao'];?>
                    <td><?php echo $registro['responsavel'];?>
                    <td><?php echo iniciais($registro['nome']);?>
                    <td><?php echo date('d/m/Y', strtotime($registro['nascimento']));?>
                    <td><?php echo $registro['etapa'];?>
                    <td>
                        <span class="badge 
                                <?php echo (($registro['status']) == "Aguardando") ? 'badge-success' : 'badge-danger'; ?>
                                align-middle">        
                                <?php echo $registro['status']; ?>
                        </span> 
                    </td>        
                </tr>
              <hr>
            </tbody>
        </table>    
    <a class="btn btn-secondary" href="<?php echo URLROOT; ?>">Voltar</a>
    </div> 


</body>

<?php
require 'inc/footer.inc.php';
?>