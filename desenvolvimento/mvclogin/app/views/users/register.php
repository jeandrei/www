<?php require APPROOT . '/views/inc/header.php';?>;
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-2">
                <h2>Criar uma conta</h2>
                <p>Por favor preencha os dados abaixo para se registrar</p> 
                <form action="<?php echo URLROOT; ?>/users/register" method="post" enctype="multipart/form-data" onsubmit="return validation(
                                                                                                                                               [noempty=['name']],
                                                                                                                                               [validemail=['email']],
                                                                                                                                               [validphone=['telefone']],
                                                                                                                                               [selectlist=['bairro']],
                                                                                                                                               [minchar=[[6,'password']]]                                                                                                                                              

                                                                                                                                            ),confirmasenha(
                                                                                                                                                document.getElementById('password').value,
                                                                                                                                                document.getElementById('confirm_password').value,
                                                                                                                                                'confirm_password_err'
                                                                                                                                                )">   
                    
                    <?php
                         //Nome
                        text('name', 'name', '<b class="obrigatorio">* </b>Nome' , 'Informe um nome','text',$data['name_err']);
                        //EMAIL
                        text('email', 'email', '<b class="obrigatorio">* </b>Email', 'Informe um email válido','text',$data['email_err']); 
                        //PASSWORD
                        text('password', 'password', '<b class="obrigatorio">* </b>Senha', 'Informe uma senha de 6 caracteres','password',$data['password_err']);
                        //PASSWORD
                        text('confirm_password', 'confirm_password', '<b class="obrigatorio">* </b>Confirmação de senha', 'Confirme a senha','password',$data['password_err']);
                        $options = array(
                            'acrobatics' => 'Acrobatics',
                            'acting' => 'Acting',
                            'antiques' => 'Antiques',
                            'sports' => 'Sports',
                          );
                          checkbox( 'interests', 'interests', 'Select your interests', $options );
                         
                       
                         $valores = [['01','Praia alegre'],['02','Armação'],['03','Centro']];
                         $selected =['0'];
                         selectlist('bairro','bairro','Bairro','Selecione um bairro',$valores,$selected,$data['bairro_err']='');

                         $valores = [['01','Casa'],['02','Apartamento'],['03','Sala comercial']];
                         $selected =['1'];
                         selectlist('imovel','imovel','Tipo de imóvel','Selecione um imóvel',$valores,$selected,$data['imovel_err']='');
                        
                    ?>           
                    
                    <!--BUTTONS-->
                    <div class="row">
                        <div class="col">                            
                           <?php  submit('Registrar-se'); ?>                           
                        </div>
                        <div class="col">                            
                            <?php linkbutton(URLROOT.'/users/login', 'Já tem uma conta? Login'); ?>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div
<?php require APPROOT . '/views/inc/footer.php'; ?>