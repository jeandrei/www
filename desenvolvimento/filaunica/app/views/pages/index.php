<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row justify-content-center align-items-center">
    <div class="col-lg-12">
        <div class="alert alert-success text-center" role="alert">
            Critérios para a inscrição do Fila Única <a href="edital_fila_unica_2019.pdf" target="_blank" class="alert-link"><i class="fa fa-external-link" aria-hidden="true"></i> Abrir edital .</a>
        </div>
    </div>
</div>

<a href="?act=list" class="btn btn-default btn-lg btn-block" role="button">Lista de Chamada</a>


<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-6"><?php echo $data['title'];?></h1>
        <p class="lead"><?php echo $data['description']; ?></p>
        
    </div>
</div>



<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Consulta</h5>
        <p class="card-text">Para saber detalhes do seu protocolo, informe o número e clique em consultar!</p>
            <form class="form-inline" action="?act=search" class="form-inline" method="post" enctype="multipart/form-data" onsubmit="return validation()">                         
                <label class="sr-only" for="protocolo"></label> 
                <input type="text" class="form-control form-control-lg mb-2 mr-sm-2 onlynumbers" style="margin-left: 20px;" id="inlineFormInputName2" placeholder="Protocolo">                    
                <button type="submit" class="btn btn-primary btn-lg mb-2">Consultar</button>                        
            </form>        
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastrar</h5>
        <p class="card-text">Para entrar na fila única clique em cadastrar.</p>
            <a href="?act=add" class="btn btn-primary btn-lg btn-block" role="button">Cadastrar</a>
      </div>
    </div>
  </div>
</div> 



<?php require APPROOT . '/views/inc/footer.php'; ?>