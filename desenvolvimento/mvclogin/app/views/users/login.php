<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php // Segunda parte da menságem        
                flash('register_success');
                ?>
                <h2>Login</h2>
                <p>Por favor informe suas credenciais para logar no sistema</p>                               
                <form action="<?php echo URLROOT; ?>/users/login" method="post">  
                <?php 
                    //EMAIL
                    text('email', 'email', 'Email', 'Informe um email válido','text',$data['email_err']); 
                    //PASSWORD
                    text('password', 'password', 'Senha', 'Informe uma senha de 6 caracteres','text',$data['password_err']); 
                    ?>       

                    <!--BUTTONS-->
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block">                           
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT ;?>/users/register" class="btn btn-light btn-block">Não tem uma conta? Registre-se</a>
                        </div>
                    </div>                     
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>