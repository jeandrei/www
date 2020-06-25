<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Bootstrap CSS-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
   
   <!--Font Awesome CDN-->
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   
   <!--CSS MIDIFICAÇÕES SOBESCREVER Botstrap-->
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">   
    
    <!--jquery-->
    <script src="<?php echo URLROOT; ?>/js/jquery-3.1.1.js"></script> 

    <!--jquery validation-->
    <script src="<?php echo URLROOT; ?>/js/jquery.validate.js"></script> 

    <!--jquery mask-->
    <script src="<?php echo URLROOT; ?>/js/jquery.mask.js" data-autoinit="true"></script> 

    <!--Botstrap main-->
    <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
    
    <!--Javascript funções-->
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>

    
    <title><?php echo SITENAME; ?></title>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php // Segunda parte da menságem        
                flash('register_success');
                ?>
                <h2>Login</h2>
                <p>Por favor informe suas credenciais</p>                               
                <form action="<?php echo URLROOT; ?>/users/login" method="post">  
                         
                     <!--EMAIL-->
                     <div class="form-group">   
                        <label 
                            for="email">Email: <sup>*</sup>
                        </label>                        
                        <input 
                            type="text" 
                            name="email" 
                            class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"                             
                            value="<?php echo $data['email'];?>"
                        >
                        <span class="invalid-feedback">
                            <?php echo $data['email_err']; ?>
                        </span>
                    </div>

                     <!--PASSWORD-->
                     <div class="form-group">   
                        <label 
                            for="password">Senha: <sup>*</sup>
                        </label>                        
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"                             
                            value="<?php echo $data['password'];?>"
                        >
                        <span class="invalid-feedback">
                            <?php echo $data['password_err']; ?>
                        </span>
                    </div>                     

                    <!--BUTTONS-->
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block">                           
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT ;?>/pages/index" class="btn btn-light btn-block">Voltar</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


</div>
</body>
</html>