<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITENAME; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
   
   <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">

  <!--jquery-->
  <script src="<?php echo URLROOT; ?>/js/jquery-3.3.1.min.js"></script> 

   <!--jquery mask-->
   <script src="<?php echo URLROOT; ?>/js/jquery.mask.js" data-autoinit="true"></script>
   

  <!--Botstrap main-->
  <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>

  <!--Javascript funções-->
  <script src="<?php echo URLROOT; ?>/js/main.js"></script>
  <style>
    .Aguardando {	
    color: blue;
   }
   .Matriculado {	
    color: green;
   }
   .Cancelado {	
    color: red;
   }
  </style>
   
</head>

<img src="../img/LOGO.png" class="img-fluid" alt="Responsive image">
<hr>
<h1 align="center">FILA</h1>


<form class="form-inline" action="?act=search" method="post" enctype="multipart/form-data" onsubmit="return validation()"> 

  <div class="form-group mb-2">
    <label for="etapa" class="sr-only">Etapa</label>
    <input type="text" readonly class="form-control-plaintext" id="Etapa" value="Etapa:">
  </div>
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="etapas" class="sr-only">Selecione uma etapa</label>
    <select 
                  name="etapa" 
                  id="etapa" 
                  class="form-control <?php echo (!empty($data['etapa_err'])) ? 'is-invalid' : ''; ?>"                                        
              >
                      <option value="">Selecione a Etapa</option>
                      <?php 
                      $etapas = getEtapas($pdo);                     
                      foreach($etapas as $etapa) : ?> 
                          <option value="<?php echo $etapa['id']; ?>"
                                      <?php echo $_POST['etapa'] == $etapa['id'] ? 'selected':'';?>
                          >
                              <?php echo $etapa['descricao'];?>
                          </option>
                      <?php endforeach; ?>  
      </select>
  </div>         
  
  <input type="submit" class="btn btn-primary mb-2" value="Atualizar">
    


    <div class="text-center">
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


        <?php foreach ($fila as $registro): ?>
            <tr class="<?php echo $registro['status'];?>"> 
                <td><?php echo $registro['posicao'];?>          
                <td><?php echo $registro['nome'];?>
                <td><?php echo date('d/m/Y', strtotime($registro['nascimento']));?>
                <td><?php echo $registro['etapa'];?>
                <td><?php echo $registro['responsavel'];?>
                <td><?php echo $registro['protocolo'];?>
                <td><?php echo date('d/m/Y H:i:s', strtotime($registro['registro']));?> 
                <td><a download="<?php echo $registro['comprovante_res_nome'];?>" target="_blank" href='abrir_arquivo.php?tipo=res&id=<?php echo $registro['fila_id'];?>'>abrir</a></td>   
                <td><a download="<?php echo $registro['comprovante_nasc_nome'];?>" target="_blank" href='abrir_arquivo.php?tipo=nasc&id=<?php echo $registro['fila_id'];?>'>abrir</a></td>  
                <td>  
                      <select 
                          name="status" 
                          id="status" 
                          class="form-control"                                                                
                      >                   
                      <?php 
                      $status = array('Aguardando','Matriculado','Cancelado');                    
                      foreach($status as $row => $value) : ?> 
                          <option value="<?php echo $row; ?>"
                                      <?php echo $value == $registro['status'] ? 'selected':'';?>
                          >
                              <?php echo $value;?>
                          </option>
                      <?php endforeach; ?>  
                </td>        
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>    
              <a class="btn btn-secondary" href="<?php echo URLROOT; ?>">Voltar</a>
      </div> 
</form>
    <span class="badge align-middle"> <?php echo $error; ?></span> 
</body>
</html>