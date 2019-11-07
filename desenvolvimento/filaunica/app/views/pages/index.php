<?php require APPROOT . '/views/filas/header.php'; ?>

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

<?php require APPROOT . '/views/filas/footer.php'; ?>