<?php require APPROOT . '/views/inc/header.php';?>
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
                                                                                                                                               [is_checked=['interests','teste']],                                                                                                                                                                                                                                                                                                                                                                                                                                            
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
                        
                        //CPF
                        text('cpf', 'cpf', '<b class="obrigatorio">* </b>CPF' , 'Informe um cpf','text',$data['cpf_err']="");
                         

                        $options = array(
                            'acrobatics' => 'Acrobatics',
                            'acting' => 'Acting',
                            'antiques' => 'Antiques',
                            'sports' => 'Sports',
                          );

                        $checked = array(  
                            'acrobatics' => 'Acrobatics',                          
                            'antiques' => 'Antiques',
                            'sports' => 'Sports',
                          );
                         
                          checkbox( 'interests', 'interests', 'Select your interests', $options,  $checked, $data['interests_err']="");
                          

                         
                          $options = array(
                            'acrobatics' => 'Acrobatics',
                            'acting' => 'Acting',
                            'antiques' => 'Antiques',
                            'sports' => 'Sports',
                          );

                        $checked = array(  
                            'acrobatics' => 'Acrobatics',                          
                            'antiques' => 'Antiques',
                            'sports' => 'Sports',
                          );
                         
                          checkbox( 'teste', 'teste', 'Select your interests 2', $options,  $checked, $data['teste_err']="");
                          




                         
                          $options = array(
                            '01' => 'Centro',
                            '02' => 'Praia Alegre',
                            '03' => 'Armação',
                            '04' => 'São Cristovão',
                          );
                          $selected =['id' => '0'];
                          selectlist('bairro','bairro','Tipo de imóvel','Selecione um bairro',$options,$selected,$data['bairro']='');
                        
                        
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
    </div>   
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>  
    //ADICIONA MASCARA DE CPF
    addclass('cpf','cpfmask');   
</script>