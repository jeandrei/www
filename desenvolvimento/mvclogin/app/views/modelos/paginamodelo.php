<?php require APPROOT . '/views/inc/header.php';?>
    
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-2">
                <h2>Criar uma conta</h2>
                <p>Por favor preencha os dados abaixo para se registrar</p> 
                <form id="modelo" class="form" action="<?php echo URLROOT; ?>/modelos/paginamodelo" method="post" enctype="multipart/form-data" >   
                    
                    <?php

                    $checked = array(  
                      'volei' => 'Volei',                          
                      'basquete' => 'Basquete',
                      'natacao' => 'Natação',
                    );    

                      $options = array(
                        'futebol' => 'Futebol',
                        'volei' => 'Volei',
                        'basquete' => 'Basquete',
                        'natacao' => 'Natação',
                      );

                        customcheck($attributes = [
                          'id' => 'esportes',
                          'name' => 'esportes',    
                          'options' => $options,  
                          'checked' => $checked,   
                          'error' => $data['custom_err'] = ""
                      ]);
                    
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
                          'error' => $data['email_err'] = ""
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
 $(document).ready(function(){
	$('#modelo').validate({
		rules : {
			name : {
				required : true,
				minlength : 3
			},
			email : {
				required : true,
				email : true
			},
			password : {
				required : true,
				minlength : 3,
				maxlength : 20
			},
			confirm_password : {
				required : true,
				equalTo : '#senha'
      },     
      cpf : {
        cpf: true,
				required : true				
      },
      'esportes[]' : {
        required : true,
        minlength: 1				
      }
		},
		messages : {
			name : {
				required : 'Informe o seu nome.',
				minlength : 'O seu nome deve ter no mínimo 3 caracteres.'
			},
			email : {
				required : 'Informe o seu e-mail.',
				email : 'Informe um e-mail válido.'
			},
			password : {
				required : 'Informe a sua senha.',
				minlength : 'A senha deve ter, no mínimo, 3 caracteres.',
				maxlength : 'A senha deve ter, no máximo, 20 caracteres.'
			},
			confirm_password : {
				required : 'Confirme a sua senha.',
				equalTo : 'As senhas não se correspondem.'
      },
      cpf : {
				required : 'Informe um CPF válido.',
				equalTo : 'CPF inválido.'
      },
      'esportes[]' : {
        required : 'Selecione ao menos um valor.',  
      }   
		}
  });

  $("#teste").validate();


});

/* Adiciona mascara no cpf */
addclass('cpf','cpfmask');
</script>
