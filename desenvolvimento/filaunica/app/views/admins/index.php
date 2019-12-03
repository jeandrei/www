<?php require APPROOT . '/views/inc/nav_header.php'; ?>
<h1>Lista de Espera</h1>

<script>
      //espera a página carregar completamente
        $(document).ready(function(){  
           //seleciona o objeto select da página    
            $(document).on('change','select', function(){ 
                //atribui os valores do id e do status as variáveis
                var idRegistro=$("#id_reg_fila").val();
                var statusRegistro=$("#status_reg_fila").val(); 
                    //monta a url chamando o método updateStatus no controller e passa através do GET o id e o Status  
                    $.get("<?php echo URLROOT; ?>/admins/updateStatus?id=" + idRegistro + "&status=" + statusRegistro, function(data){                       
                    //remove todos os valores do option primeiro para não acumular a cada mudança
                    //$("#atendimento").find("option").remove();                         
                    //adiciona o que veio do método /filas/getAtendimentos no objeto #atendimento
                    //$("#atendimento").append(data);
                });
            });
        });


</script>


<!--TABELA COM OS DADOS-->   
<div class="text-center small">
  <table class="table table-sm">
    <thead>
      <tr>  
        <th scope="col">Posição</th>        
        <th scope="col">Nome da Criança</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Etapa</th>          
        <th scope="col">Responsável</th> 
        <th scope="col">Protocolo</th>
        <th scope="col">Registro</th>
        <th scope="col">Comp Residência</th>
        <th scope="col">Comp Nascimento</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
          
    <tbody>        
        <?php foreach ($data as $registro): ?>
            <tr class="<?php 
                            if($registro['status'] == "Aguardando")
                            echo "table-primary";
                            if($registro['status'] == "Cancelado")
                            echo "table-danger";
                            if($registro['status'] == "Matriculado")
                            echo "table-success";                        
                        ?>"
              >
                <td><?php echo $registro['posicao']; ?></td>
                <td><?php echo $registro['nome']; ?></td>
                <td><?php echo $registro['nascimento']; ?></td>
                <td><?php echo $registro['etapa']; ?></td>
                <td><?php echo $registro['responsavel']; ?></td>
                <td><?php echo $registro['protocolo']; ?></td>
                <td><?php echo $registro['registro']; ?></td>
                <td><a download="<?php echo $registro['comprovante_res_nome'];?>"  target="_blank" href='<?php echo URLROOT; ?>/admins/download?tipo=res&id=<?php echo $registro['fila_id'];?>'>abrir</a></td>
                <td><a download="<?php echo $registro['comprovante_nasc_nome'];?>" target="_blank" href='<?php echo URLROOT; ?>/admins/download?tipo=nasc&id=<?php echo $registro['fila_id'];?>'>abrir</a></td>
                <td>
                  <select class="form-control form-control-sm"
                        name="statuslista" 
                        id="<?php echo  $registro['fila_id'];?>" 
                        class="form-control" 
                        onChange="
                                  document.getElementById('id_reg_fila').value = <?php echo $registro['fila_id']; ?>;
                                  document.getElementById('status_reg_fila').value = this.value;
                                  ">                   
                        <?php 
                        $status = array('Aguardando','Matriculado','Cancelado');                    
                        foreach($status as $row => $value) : ?> 
                            <option value="<?php echo $value; ?>" 
                                        <?php echo $value == $registro['status'] ? 'selected':'';?>
                            >
                                <?php echo $value;?>
                            </option>
                        <?php endforeach; ?>  
                        </select>
                        <!--JOGO O VALOR DA ID QUE ESTÁ NO SELECT ATRAVÉS DO EVENTO onChange para id_reg_fila PARA DEPOIS CHAMAR NO AJAX-->
                        <input type="hidden" id="id_reg_fila" name="id_reg_fila" value="">
                        <!--JOGO O VALOR DO STATUS DO SELECT ATRAVÉS DO EVENTO onChange para status_reg_fila PARA DEPOIS CHAMAR NO AJAX--> 
                        <input type="hidden" id="status_reg_fila" name="status_reg_fila" value=""> 
                    </select> 
                </td>
            </tr>            
        <?php endforeach; ?>
    </tbody>
  </table>                  

<?php require APPROOT . '/views/inc/nav_footer.php'; ?>