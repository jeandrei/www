<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php // Segunda parte da menságem        
                flash('register_success');
                ?>
                <h2>Login</h2>
                <p>Por favor informe suas credenciais para logar no sistema</p>                               
                <form action="<?php echo URLROOT; ?>/users/login" method="post" enctype="multipart/form-data" onsubmit="return validation(
                                                                                                                                            [noempty=['password']],
                                                                                                                                            [validemail=['email']]
                                                                                                                                            )">
                <?php 
                   //EMAIL                       
                   text($attributes = [
                    'id' => 'email',
                    'name' => 'email',
                    'type' => 'text',
                    'label' => '<b class="obrigatorio">* </b>Email',
                    'placeholder' => 'Informe um email válido',                          
                    'error' => $data['email_err']
                ]);
                  
                  
                  //PASSWORD                        
                  text($attributes = [
                    'id' => 'password',
                    'name' => 'password',
                    'type' => 'password',
                    'label' => '<b class="obrigatorio">* </b>Senha',
                    'placeholder' => 'Informe uma senha de 6 caracteres',                          
                    'error' => $data['password_err']
                ]);    
                              
                    ?>       

                    <!--BUTTONS-->
                    <div class="row">
                        <div class="col">
                            <?php  submit('Login'); ?>                            
                        </div>
                        <div class="col">                            
                            <?php linkbutton(URLROOT.'/users/register', 'Não tem uma conta? Registre-se'); ?>
                        </div>
                    </div>                     
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
