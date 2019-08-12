
<?php require APPROOT . '/views/inc/header.php';?>
   
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-2">
                <h2>Criar uma conta</h2>
                <p>Por favor preencha os dados abaixo para se registrar</p> 
                <form id="modelo" class="form" action="<?php echo URLROOT; ?>/modelos/paginamodelo" method="post" enctype="multipart/form-data" >   
                    
                    <?php
                    //MORADIA
                    $options = array(
                      '10' => '10 - 20',
                      '20' => '20 - 30',
                      '30' => '30 - 40',
                      '40' => '40 - 50',
                      '50' => '50 - 60'                            
                    );

                                            
                   
                    customradio($attributes = [
                      'name' => 'faixa',
                      'id' => 'faixa',                            
                      'label' => 'Faixa etária', 
                      'inline' => true,
                      'options' => $options,                                                        
                      'error' => $data['faixa_err'] = ""
                    ]);

                    $checked = array(  
                      'volei' => 'Volei',
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
                          'label' => '<b class="obrigatorio">* </b>Esportes:', 
                          'inline' => true,   
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
                          );    

                          checkbox($attributes = [
                            'id' => 'interests',
                            'name' => 'interests',                            
                            'label' => 'Select your interests',
                            'inline' => true,  
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
                          );
                          
                          checkbox($attributes = [
                            'id' => 'documentos',
                            'name' => 'documentos',                            
                            'label' => 'Comprovantes anexados',
                            'inline' => true,  
                            'options' => $options,
                            'checked' => $checked,                            
                            'error' => $data['documentos_err'] = ""
                        ]);
                        


                              
                          //MORADIA
                          $options = array(
                            '01' => 'Casa',
                            '02' => 'Apartamento',
                            '03' => 'Comércio',
                            '04' => 'Sítio',
                            '05' => 'Sobrado'                            
                          );                                                  
                         
                          radio($attributes = [
                            'name' => 'moradia',
                            'id' => 'moradia',                            
                            'label' => 'Tipo de moradia',
                            'inline' => false,   
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

                            

                          ffile($attributes = [
                            'name' => 'arquivo1',
                            'id' => 'arquivo1',                            
                            'label' => 'Informação adicional',                             
                            'text' => 'Selecione um arquivo',                                                                                   
                            'error' => $data['arquivo1_err'] = ""
                          ]);


                        // Colunas da primeira linha da tabela
                          $columns = array(
                            'Nome',
                            'Sobrenome',
                            'Sexo',
                            'Cor',
                            'Telefone',                            
                          );


                          // Valores da tabela
                          $values[] = array(
                            'nome' => 'Jeandrei',
                            'sobrenome' => 'Walter',
                            'sexo' => 'Masculino',
                            'cor' => 'Branca',
                            'telefone' => '99999999'
                          );
                          $values[] = array(
                            'nome' => 'Mari',
                            'sobrenome' => 'Walter',
                            'sexo' => 'Feminina',
                            'cor' => 'Branca',
                            'telefone' => '99999999'
                          );
                          $values[] = array(
                            'nome' => 'Dexter',
                            'sobrenome' => 'Walter',
                            'sexo' => 'Macho',
                            'cor' => 'Preto',
                            'telefone' => '000000'
                          );
                          $values[] = array(
                            'nome' => 'Biju',
                            'sobrenome' => 'Walter',
                            'sexo' => 'Femea',
                            'cor' => 'Preta',
                            'telefone' => '8888888'
                          );
                          
                          table2($attributes = [
                            'label' => 'tabteste', 
                            'columns' => $columns,
                            'values' => $values                           
                          ]);

                        /*  $arr = $values[1];

                          $keys = array_keys($arr);
                          echo "The keys array: "; 
                         print_r($keys); 
                         
                         // Getting the size of the sample array 
                          $size = sizeof($arr); 
      
                          //Accessing elements of $arr using 
                          //integer index using $x 
                          echo "The elements of the sample array: " . "\n"; 
  
                          for($x = 0; $x < $size; $x++ ) { 
                              echo "key: ". $keys[$x] . ", value: " 
                                      . $arr[$keys[$x]] . "\n"; 
                          } 
                          */

                          //função que monta a tabela
                          
                       
                        
                         
                          
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
				minlength : 6,
				maxlength : 30
			},
			confirm_password : {
				required : true,
				equalTo : '#password'
      },     
      cpf : {
        cpf: true,
				required : true				
      },
      'esportes[]' : {
        required : true,
        minlength: 1				
      },
      'interests[]' : {
        required : true,
        minlength: 1				
      },
      'documentos[]' : {
        required : true,
        minlength: 1				
      },
      moradia : {
        required : true								
      },
      funcao : {
        required : true								
      },
      infadicional : {
        required : true
      },
      'faixa[]' : {
        required : true
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
      },
      'interests[]' : {
        required : 'Selecione ao menos um valor.',  
      },
      'documentos[]' : {
        required : 'Selecione ao menos um valor.',  
      },
      moradia : {
				required : 'Selecione uma opção.'				
      },
      funcao : {
				required : 'Selecione uma opção.'				
      },
      infadicional : {
        required : 'Campo obrigatório.'
      },
      'faixa[]' : {
        required : 'Selecione uma opção.',  
      }         
		}
  });

  $("#teste").validate();


});

/* Adiciona mascara no cpf */
addclass('cpf','cpfmask');
</script>
