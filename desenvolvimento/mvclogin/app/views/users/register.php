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
                                                                                                                                               [selectlist=['bairro','funcao']],
                                                                                                                                               [is_checked=['interests','teste']],
                                                                                                                                               [validacpf=['cpf']],
                                                                                                                                               [noemptytextarea=['conceito','infadicional']],                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                                                                                                                                               [minchar=[[6,'password']]],
                                                                                                                                               [confirmasenha=['password','confirm_password']],   
                                                                                                                                               [validaradio=['moradia']]                                                                                                                                               
                                                                                                                                               )">   
                    
                    <?php
                         //Nome                        
                        text($attributes = [
                          'id' => 'name',
                          'name' => 'name',
                          'type' => 'text',
                          'label' => '<b class="obrigatorio">* </b>Nome',
                          'placeholder' => 'Informe um nome',                          
                          'error' => $data['name_err'] = ""
                      ]);
                        
                        
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
                          'error' => $data['password_err'] = ""
                      ]);
                        
                        //CONFIRM PASSWORD                       
                        text($attributes = [
                          'id' => 'confirm_password',
                          'name' => 'confirm_password',
                          'type' => 'password',
                          'label' => '<b class="obrigatorio">* </b>Senha',
                          'placeholder' => 'Informe uma senha de 6 caracteres',                          
                          'error' => $data['confirm_password_err'] = ""
                      ]);


                        //CPF                       
                        text($attributes = [
                          'id' => 'cpf',
                          'name' => 'cpf',
                          'type' => 'text',
                          'label' => '<b class="obrigatorio">* </b>CPF',
                          'placeholder' => 'Informe um CPF',                          
                          'error' => $data['cpf_err'] = ""
                      ]);
                                         
                        

                        
                      //INTERESTS
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

                          checkbox($attributes = [
                            'id' => 'interests',
                            'name' => 'interests',                            
                            'label' => 'Select your interests', 
                            'options' => $options,
                            'checked' => $checked,                            
                            'error' => $data['interests_err'] = ""
                        ]);
                        
                        
                        
                        
                        
                        // COMPROVANTE
                        $options = array(
                            'agua' => 'Água',
                            'luz' => 'Luz',
                            'telefone' => 'Telefone',
                            'aluguel' => 'Aluguel',
                          );

                        $checked = array(  
                            'luz' => 'Luz',                          
                            'telefone' => 'Telefone',                            
                          );
                          
                          checkbox($attributes = [
                            'id' => 'teste',
                            'name' => 'teste',                            
                            'label' => 'Comprovantes anexados', 
                            'options' => $options,
                            'checked' => $checked,                            
                            'error' => $data['teste_err'] = ""
                        ]);
                        


                              
                          //MORADIA
                          $options = array(
                            '01' => 'Casa',
                            '02' => 'Apartamento',
                            '03' => 'Comércio',
                            '04' => 'Sítio',
                            '05' => 'Sobrado'                            
                          );

                                                  
                         
                          radionovo($attributes = [
                            'name' => 'moradia',
                            'id' => 'moradia',                            
                            'label' => 'Tipo de moradia', 
                            'options' => $options,                                                        
                            'error' => $data['moradia_err'] = ""
                          ]);




                          //FUNÇÃO
                          $options = array(
                            '01' => 'Aluno',
                            '02' => 'Professor',
                            '03' => 'Especialista',
                            '04' => 'Secretária',
                          );
                          
                                                
                          selectlist($attributes = [
                            'name' => 'funcao',
                            'id' => 'funcao',                            
                            'label' => 'Função', 
                            'placeholder' => 'Selecione uma função',
                            'options' => $options,                                                       
                            'error' => $data['funcao_err'] = ""
                          ]);
                          
                          

                          
                          textarea($attributes = [
                            'name' => 'infadicional',
                            'id' => 'infadicional',                            
                            'label' => 'Informação adicional',                             
                            'rows' => 03,                                                                                   
                            'error' => $data['infadicional_err'] = ""
                          ]);
                       
                        
                         
                          
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