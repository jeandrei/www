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
       
        <script type="text/javascript">
       
            function mandar()
            {
                var meuform= document.getElementById("meuform");
                var login= document.getElementById("login");
                var senha= document.getElementById("senha");
                meuform.action="logar.php";
                meuform.method="post";
                var l=login.value;
                var s= senha.value;


                for(i=0;i<=6;i++)
                {
                    l=window.btoa(l);
                    s=window.btoa(s);
                }
               
                login.value=l;
                senha.value=s;
               
                meuform.appendChild(login);
                meuform.appendChild(senha);
               
                meuform.submit();
               
            }

        </script>
       
       
       
       
    </head>
    <body>
    <div class="row">
    <div class="col-md-4 mx-auto">
    
    <?php   
    if(!empty($GLOBALS['loginError'])){
        flash('alert-danger',$GLOBALS['loginError'],'alert alert-danger');
        echo flash('alert-danger');}
    ?>   


        <div class="card card-body bg-ligth mt-5">
            <?php flash('register_success'); ?>
            <h2>Login</h2>
            <p>Please fill your credentials to log in</p>
            <form action="" method="post">
                                
                <!--EMAIL-->
                <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>               
                <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data
                ['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <!--PASSWORD-->
                <div class="form-group">
                <label for="password">Pasword: <sup>*</sup></label>               
                <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data
                ['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>               

                 <!--BOTÃ•ES-->
                 <div class="row">
                    <div class="col">
                        <input type="hidden" name="action" value="login">                    
                        <input type="submit" value="Log in" class="btn btn-success btn-block">                        
                    </div>                    
                 </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>