<?php ini_set('default_charset', 'utf-8');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo SITENAME; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <!--Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
   
   <!--Font Awesome CDN-->
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   
   <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">   
  
</head>
<body>
<?php //require APPROOT . '/views/inc/navbar.php'; ?>
<!-- a linha abaixo inicia um container do bootstrap ela vai fechr no arquivo footer.php-->
  <div class="container">  
<body>

<img src="<?php echo URLROOT; ?>/img/LOGO.png" class="img-fluid" alt="Responsive image">

<!-- comentário automático no visual studio control + k + c -->

<div class="container text-center">

            <div class="row justify-content-center align-items-center">
              <div class="col-lg-12">
                  <div class="alert alert-success text-center" role="alert">
                      Critérios para a inscrição do Fila Única <a href="edital_fila_unica_2019.pdf" target="_blank" class="alert-link"><i class="fa fa-external-link" aria-hidden="true"></i> Abrir edital .</a>
                  </div>
              </div>
            </div>


            <!-- FILA ÚNICA DESCRIÇÃO-->
            <div class="jumbotron jumbotron-fluid text-center">
                <div class="container">
                    <h1 class="display-3"><?php echo SITENAME;?></h1>
                    <p class="lead"><?php echo DESCRIPTION; ?></p>
                </div>
            </div>



    
          <div class="row justify-content-center align-items-center">         
              <div class="col-lg-4">
                    <a href="<?php echo URLROOT; ?>/filas/cadastrar" class="btn btn-success btn-lg btn-block" role="button">Cadastrar</a>                         
                    <a href="<?php echo URLROOT; ?>/filas/listachamada" class="btn btn-default btn-lg btn-block" role="button">Lista de Chamada</a>                                      
              </div>
          </div>

        <hr>        
        
        <!--  -->
        <div class="row justify-content-center align-items-center">            
            <div class="col-lg-6">
                <form action="<?php echo URLROOT; ?>/filas/consultar" class="form-inline" method="post" enctype="multipart/form-data" onsubmit="return validation()">                                
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="protocolo" class="sr-only"></label>                                 
                    <input 
                        type="number" 
                        class="form-control onlynumbers <?php echo (!empty($data['protocolo_err'])) ? 'is-invalid' : ''; ?>" 
                        id="protocolo" 
                        name="protocolo" 
                        placeholder="Protocolo"
                    >               
                  </div>             
                  <button type="submit" class="btn btn-primary btn-lg mb-2">Consultar</button>
                </form>     
            </div>
        </div>
        <span id="protocolo_err" class="text-danger"> 
              <?php if(!empty($data['protocolo_err']))
                {
                  echo $data['protocolo_err'];
                }
              ?>
        </span>
</div> 


<?php require APPROOT . '/views/inc/footer.php'; ?>