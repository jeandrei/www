<?php
require ($_SERVER["DOCUMENT_ROOT"] . '/filaunica/inc/header.inc.php');
?>
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
            <p>Por favor informe seu email e senha</p>
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
                <label for="password">Senha: <sup>*</sup></label>               
                <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data
                ['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>               

                 <!--BOTÃ•ES-->
                 <div class="row">
                    <div class="col">
                        <input type="hidden" name="action" value="login">                    
                        <input type="submit" value="Entrar" class="btn btn-success btn-block">                        
                    </div>                    
                 </div>
            </form>
        </div>
    </div>
</div>
</body>

<?php
require ($_SERVER["DOCUMENT_ROOT"] . '/filaunica/inc/footer.inc.php');
?>