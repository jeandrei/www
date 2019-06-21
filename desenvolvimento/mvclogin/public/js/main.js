
  
  
  // 2 noempty *******************************************************************************************
  // 3 em login.php
      


  // pego os valores de cada elemento e coloco em fieldvalue
  function validation(){ 
    var count = 0; 
    
    // valida campos em branco
    // adiciono os campos que não podem ser em branco no final do formulário<script>noempty.push('nome','password');</script>
    // dou um for no array noempty para varrer todos os campos
    for(var i=0; i<noempty.length;){
      // atribuo o valor do valor noempty[0]).value a variável fieldsvalue
      fieldsvalue = document.getElementById(noempty[i]).value;
      // monto o id que vai receber a mensagem de erro noempty=nome concateno com _err vai ficar nome_err que é o id que receberá o erro
      fielderror = noempty[i].concat('_err');
      // verifico se o campo está em branco
      if(fieldsvalue == ''){
        // se sim imprimo o erro no id de erro neste caso nome_err
        document.getElementById(fielderror).innerHTML = 'Campo obrigatório';
        count++;
      } else {
        // caso contrário limpo o id de erro nome_err
        document.getElementById(fielderror).innerHTML = '';
      }          
      i++;
    }
      

    // valida emails
    for(var i=0; i<validemail.length;){
      email = document.getElementById(validemail[i]).value;
      emailerr = validemail[i].concat('_err'); 
      if(!validaemail(email)){     
        document.getElementById(emailerr).innerHTML = 'Email inválido';
        count++;
        } else {
          document.getElementById(emailerr).innerHTML = '';
        }
      i++;
    }
    
     // valida telefones
     for(var i=0; i<validphone.length;){
      phone = document.getElementById(validphone[i]).value;
      phoneerr = validphone[i].concat('_err'); 
      if(!validatetelefone(phone)){     
        document.getElementById(phoneerr).innerHTML = 'Telefone inválido';
        count++;
        } else {
          document.getElementById(phoneerr).innerHTML = '';
        }
      i++;
    }

     // valida cpf
     for(var i=0; i<validacpf.length;){
      cpf = document.getElementById(validacpf[i]).value;
      cpferr = validacpf[i].concat('_err'); 
      if(!validacaocpf(cpf)){     
        document.getElementById(cpferr).innerHTML = 'CPF inválido';
        count++;
        } else {
          document.getElementById(cpferr).innerHTML = '';
        }
      i++;
    }

    
    // minimo caracteres no final do formulário chama <script> minchar.push([6,'minimo'],[7,'password']);</script> 
    //onde 6 é o numero mínimo de caracteres e minimo é o nome do campo
    //[linha][coluna]
    for(var i=0; i<minchar.length;){  
      qtdchar = document.getElementById(minchar[i][1]).value.length;
      qtderr = minchar[i][1].concat('_err'); 
      if(qtdchar<minchar[i][0]){
        document.getElementById(qtderr).innerHTML = 'Número de caracteres inválido';
        count++;        
      } else {
        document.getElementById(qtderr).innerHTML = '';
      }
      i++;
    }  

    

  
    // se count é maior que um tem valor em branco então atribuo a menságem Campo obrigatório em cada campo em branco e retorno falso para não submeter o formulário
    if(count>0){        
        return false;  
      } else {
      return true;
    } 
	
};  
//**fim no empty************************************************************************************ */


function validaemail(email)
	{
	  er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
	  
	  if(er.exec(email))
		{
		  return true;
		} else {
		  return false;
		}
	}


//função para validar telefona
function validatetelefone(txtPhone) {
  var a = txtPhone;
  var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  if (filter.test(a)) {
      return true;
  }
  else {
      return false;
  }
}


//****************VALIDAÇÃO DE CPF******************* */
function validacaocpf(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
			return false;		
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return false;		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return false;		
	return true;   
}
//**********************FIM FUNÇÃO VALIDAÇÃO DE CPF */







//mascaras para os formulários todas se aplicam a classe
// no caso de aplicar mascara a telefone é só 
//fazer <input type="tel" class="telefone"
//vai aplicar somente depois de carregar o documento 
//por isso esta dentro da (document).ready()
//tem que colocar o footer que está neste projeto para lincar com maskedinput.min.js
$(document).ready(function() {
	$('.cpf').mask('000.000.000-00', {reverse: true});
	$(".telefone").mask("(00) 00000-0009");
	});
//********************fim mascaras**************** */