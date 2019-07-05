<?php require APPROOT . '/views/inc/header.php';?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-2">
                <h2>Criar uma conta</h2>
                <p>Por favor preencha os dados abaixo para se registrar</p> 
                <form action="<?php echo URLROOT; ?>/users/register" method="post" enctype="multipart/form-data" onsubmit="return validation(
                                                                                                                                               [noempty=['name','mytest']],
                                                                                                                                               [validemail=['email']],
                                                                                                                                               [validphone=['telefone']],
                                                                                                                                               [selectlist=['bairro','funcao']],
                                                                                                                                               [is_checked=['interests','teste']],
                                                                                                                                               [noemptytextarea=['conceito','infadicional']],                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
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
                        
                        
                        
                        
                        
                        text2($attributes = [
                            'id' => 'mytest',
                            'name' => 'mytest',
                            'type' => 'text',
                            'label' => 'Informe seu nome teste',
                            'placeholder' => 'Informe um nove válido',
                            'div_class' => 'form-group',
                            'input_class' => 'form-control form-control-sm',
                            'error' => $data['mytest_err'] = ""
                        ]);





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
                            'agua' => 'Água',
                            'luz' => 'Luz',
                            'telefone' => 'Telefone',
                            'aluguel' => 'Aluguel',
                          );

                        $checked = array(  
                            'luz' => 'Luz',                          
                            'telefone' => 'Telefone',                            
                          );
                          
                          checkboxnovo($attributes = [
                            'id' => 'teste',
                            'name' => 'teste',                            
                            'label' => 'Comprovantes anexados', 
                            'options' => $options,
                            'checked' => $checked,                            
                            'error' => $data['teste_err'] = ""
                        ]);
                        








                          $options = array(
                            '01' => 'A pé',
                            '02' => 'Carro',
                            '03' => 'Ônibus',
                            '04' => 'Moto',
                            '05' => 'Bicicleta'                            
                          );

                          $default =['id' => '01'];                          
                          radio( 'escolha', 'escolha', 'Como você vem ao trabalho?', $options,  $default, $data['escolha_err']="");

                          



                          $options = array(
                            '01' => 'Casa',
                            '02' => 'Apartamento',
                            '03' => 'Comércio',
                            '04' => 'Sítio',
                            '05' => 'Sobrado'                            
                          );

                          $default =['id' => '02'];                          
                          radionovo($attributes = [
                            'name' => 'moradia',
                            'id' => 'moradia',                            
                            'label' => 'Tipo de moradia', 
                            'options' => $options,
                            'default' => $default,                            
                            'error' => $data['moradia_err'] = ""
                          ]);




                         
                          $options = array(
                            '01' => 'Centro',
                            '02' => 'Praia Alegre',
                            '03' => 'Armação',
                            '04' => 'São Cristovão',
                          );
                          $selected =['id' => '0'];                          
                          selectlist('bairro','bairro','Tipo de imóvel','Selecione um bairro',$options,$selected,$data['bairro_err']='');
                        

                          $options = array(
                            '01' => 'Aluno',
                            '02' => 'Professor',
                            '03' => 'Especialista',
                            '04' => 'Secretária',
                          );
                                                
                          selectlistnovo($attributes = [
                            'name' => 'funcao',
                            'id' => 'funcao',                            
                            'label' => 'Função', 
                            'placeholder' => 'Selecione uma função',
                            'options' => $options,                                                       
                            'error' => $data['funcao_err'] = ""
                          ]);
                          
                          

                          
                          textareanovo($attributes = [
                            'name' => 'infadicional',
                            'id' => 'infadicional',                            
                            'label' => 'Informação adicional',                             
                            'rows' => 03,                                                                                   
                            'error' => $data['infadicional_err'] = ""
                          ]);




                       
                          textarea('conceito','conceito','Digite seu conceito',3,'valor passado pelo post do php',$data['conceito_err']='');
                         
                          
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