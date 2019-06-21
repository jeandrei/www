<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-2">
                <h2>Criar uma conta</h2>
                <p>Por favor preencha os dados abaixo para se registrar</p> 
                <form action="<?php echo URLROOT; ?>/users/register" method="post" enctype="multipart/form-data" onsubmit="return validation()">   
                    
                    <?php
                         //Nome
                        text('name', 'name', 'Nome', 'Informe um nome','text',$data['name_err']);
                        //EMAIL
                        text('email', 'email', 'Email', 'Informe um email válido','text',$data['email_err']); 
                        //PASSWORD
                        text('password', 'password', 'Senha', 'Informe uma senha de 6 caracteres','password',$data['password_err']);
                        //PASSWORD
                        text('confirm_password', 'confirm_password', 'Confirmação de senha', 'Confirme a senha','password',$data['password_err']);

                    ?>           
                    
                    <!--BUTTONS-->
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Registrar-se" class="btn btn-success btn-block">                           
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT ;?>/users/login" class="btn btn-light btn-block">Já tem uma conta? Login</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<script> // noempty campos que não podem ficar em branco
    noempty.push('name');
    validemail.push('email');
    //validphone.push('telefone');
    //validacpf.push('cpf');    
    minchar.push([6,'password']);    
    //minchar.push([6,'minimo'],[7,'password']);     
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>