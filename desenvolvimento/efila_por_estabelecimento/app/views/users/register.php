<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-ligth mt-5">
            <h2>Crie uma conta</h2>
            <p>Por favor preencha o formulário para se registrar</p>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">
                
                <!--NOME-->
                <div class="form-group">
                <label for="name">Nome: <sup>*</sup></label>
                <!--is-invalid é uma classe do bootstrap que deixa o texto em vermelho então verificamos se tem valor no name_err se sim aplicamos essa classe-->
                <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data
                ['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>
                <!--EMAIL-->
                <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>               
                <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data
                ['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <!--TELEFONE 1-->
                <div class="form-group">
                <label for="telefone1">Telefone 1: <sup>*</sup></label>               
                <input type="tel" name="telefone1" class="form-control telefone form-control-lg <?php echo (!empty($data
                ['telefone1_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['telefone1']; ?>" placeholder="(99) 99999-9999">
                <span class="invalid-feedback"><?php echo $data['telefone1_err']; ?></span>
                </div>
                 <!--TELEFONE 1 DESCRIÇÃO-->
                 <div class="form-group">
                <label for="desctel1">Descrição:</label>               
                <input type="tel" name="desctel1" class="form-control form-control-lg <?php echo (!empty($data
                ['desctel1_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['desctel1']; ?>">
                <span class="invalid-feedback"><?php echo $data['desctel1_err']; ?></span>
                </div>
                 <!--TELEFONE 2-->
                 <div class="form-group">
                <label for="telefone2">Telefone 2:</label>               
                <input type="tel" name="telefone2" class="form-control telefone form-control-lg <?php echo (!empty($data
                ['telefone2_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['telefone2']; ?>" placeholder="(99) 99999-9999">
                <span class="invalid-feedback"><?php echo $data['telefone2_err']; ?></span>
                </div>
                 <!--TELEFONE 2 DESCRIÇÃO-->
                 <div class="form-group">
                <label for="desctel1">Descrição:</label>               
                <input type="tel" name="desctel2" class="form-control form-control-lg <?php echo (!empty($data
                ['desctel2_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['desctel2']; ?>">
                <span class="invalid-feedback"><?php echo $data['desctel2_err']; ?></span>
                </div>
                <!--PASSWORD-->
                <div class="form-group">
                <label for="password">Pasword: <sup>*</sup></label>               
                <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data
                ['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <!--CONFM PASSWORD-->
                <div class="form-group">
                <label for="confirm_password">Pasword: <sup>*</sup></label>                
                <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data
                ['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>                
                </div>

                 <!--BOTÕES-->
                 <div class="row">
                    <div class="col">                    
                        <input type="submit" value="Register" class="btn btn-success btn-block">                        
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Já possui uma? Login</a>
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>