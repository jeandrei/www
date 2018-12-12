<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-ligth mt-5">
            <?php flash('register_success'); ?>
            <h2>Login</h2>
            <p>Por favor insira sua chave de acesso</p>
            <form action="<?php echo URLROOT; ?>/users/login" method="post">
                                
                <!--CHAVE-->
                <div class="form-group">
                <label for="chave">Chave de acesso: <sup>*</sup></label>               
                <input type="text" name="chave" class="form-control form-control-lg <?php echo (!empty($data
                ['chave_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['chave']; ?>">
                <span class="invalid-feedback"><?php echo $data['chave_err']; ?></span>
                </div>                    

                 <!--BOTÕES-->
                 <div class="row">
                    <div class="col">                    
                        <input type="submit" value="Log in" class="btn btn-success btn-block">                        
                    </div>                    
                 </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>