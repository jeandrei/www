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
  <script>
      function validation(){
          var protocolo = document.getElementById('protocolo').value;
         
          
          
          if(protocolo == ""){			
            document.getElementById('protocolo_err').innerHTML = "Por favor informe o número do protocolo!";           
            focofield('protocolo');
            return false;
          }
      }
  </script>
  

</head>
  <body>

<img src="img/LOGO.png" class="img-fluid" alt="Responsive image">


<div class="container text-center">

      <div class="row justify-content-center align-items-center">
        <div class="col-lg-12">
            <div class="alert alert-success text-center" role="alert">
                Critérios para a inscrição do Fila Única <a href="edital_fila_unica_2019.pdf" target="_blank" class="alert-link"><i class="fa fa-external-link" aria-hidden="true"></i> Abrir edital .</a>
            </div>
        </div>
    </div>



    
      <div class="row justify-content-center align-items-center">         
          <div class="col-lg-4">
                <a href="?act=add" class="btn btn-primary btn-lg btn-block" role="button">Cadastrar</a>                         
                <a href="?act=list" class="btn btn-default btn-lg btn-block" role="button">Lista de Chamada</a>                
          </div>
     </div>

     <hr>
     
     
     <div class="row justify-content-center align-items-center">                  
        <div class="col-lg-6">
            <form action="?act=search" class="form-inline" method="post" enctype="multipart/form-data" onsubmit="return validation()">                                
              <div class="form-group mx-sm-3 mb-2">
                <label for="protocolo" class="sr-only"></label>                                 
                <input type="text" class="form-control form-control-lg onlynumbers" id="protocolo" name="protocolo" placeholder="Protocolo">               
              </div>             
              <button type="submit" class="btn btn-primary btn-lg mb-2">Consultar</button>
            </form>     
        </div>
        
     </div>
     <span id="protocolo_err" class="text-danger"><?php echo $data['protocolo_err']; ?></span>     
</div>  
</body>
</html>