
<script src='http://localhost/efila/public/js/jquery-3.3.1.min.js'></script> 

<?php $conexao = new PDO("mysql:host=mysql;dbname=efila","root","rootadm");
$conexao->exec('SET CHARACTR SET utf8');?>

        <form action="<?php echo URLROOT; ?>/filas/add" method="post">     

    <select name="estabelecimento" id="estabelecimento">
        <?php 
        $select = $conexao->prepare("SELECT * FROM estabelecimento");
        $select->execute();
        $fetchAll = $select->fetchAll();
        foreach($fetchAll as $estabelecimento){
            echo "<option value=" . $estabelecimento['id'] . ">".$estabelecimento['nome']."</option>";
            
        }
        ?>
    </select>   
       
       
        <select id="atendimento" style="display:none;"></select>
    
        <script>
        $("#estabelecimento").on("change",function(){
            var idEstab = $("#estabelecimento").val();
            $.ajax({
                url: 'pega_atendimentos.php',
                type: 'POST',
                data:{id:idEstab},
                beforeSend: function(){
                    $("#atendimento").css({'display':'block'});
                    $("#atendimento").html("Carregando...");
                },
                success: function(data){
                    $("#atendimento").css({'display':'block'});
                    $("#atendimento").html(data);
                },
                error: function(data){
                    $("#atendimento").css({'display':'block'});
                    $("#atendimento").html("Houve um erro ao carregar");
                }

            });
            
            
        });
        </script>

       
        
</form>

