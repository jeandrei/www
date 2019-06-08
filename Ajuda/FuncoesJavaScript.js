
//mascaras para os formulários todas se aplicam a classe
// no caso de aplicar mascara a telefone é só 
//fazer <input type="tel" class="telefone"
//vai aplicar somente depois de carregar o documento 
//por isso esta dentro da (document).ready()
$(document).ready(function() {
	$('.cpf').mask('000.000.000-00', {reverse: true});
	$(".telefone").mask("(00) 00000-0009");
	});
//********************fim mascaras**************** */


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
function validacpf(cpf) {	
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

//***************** VALIDAÇÃO DE EMAIL
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
//************* */FIM VALIDAÇÃO DE EMAIL



//FUNÇÃO PARA PERMITIR APENAS NÚMEROS
//PARA USAR BASTA COLOCAR O CAMPO COMO CLASSE onlynumbers
//E PARA EXIBIR A MENSAGEM COLOCAR UM <span id="errmsg"></span>
//USE TAMBÉM O TIPO NUMBER NO INPUT type="number" 
$(document).ready(function () {
	//called when key is pressed in textbox
	$(".onlynumbers").keypress(function (e) {
	   //if the letter is not digit then display error and don't type anything
	   if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		  //display error message
		  alert("Ops! Apenas números são permitidos.");
				 return false;
	  }
	 });
  });


  

//função seta o foco para o campo passado na funçao
//um exemplo para dar o foco no campo name ao carregar a página
//window.onload = function(){focofield("name");}
function focofield(field)
{
	document.getElementById(field).focus();
}

//Função faz a pergunta e retorna verdadeiro se o usuário clicar ok e falso se cancelar
/*
Um exemplo da utilização da função confirmação para deletar registro
onclick="if(question('Are you sure you want to delete?') == true)
{
	document.forms[0].submit();
}
else
{										
	return false;
}");
*/
function question(ask)
{
	return confirm (ask);
}	


//função para validação de arquivo
//fileValidation(campo tipo field,id do span para apresentar o erro);"
// onchange="return fileValidation('comprovante_residencia','res_erro');"
function fileValidation(myfiel,span)
{
	var fileInput = document.getElementById(myfiel);
	var filePath = fileInput.value;
	var errorspan = span;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){				
		document.getElementById(errorspan).textContent="Apenas arquivo do tipo JPEG, PNG ou PDF são permitidos!";
		fileInput.value = '';			
        return false;
    }else{
		document.getElementById(errorspan).textContent="";
        return true;
    }
}
	
	
/*
Para chamar a função uperCaseF no input
onkeydown="upperCaseF(this)" 
*/
function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

//função para o botão avançar do formulário
/*no formulário
    <a class="next-step btn btn-primary btn-block" style="color:white;">
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
        Proximo
    </a>
*/
$(document).ready(function () {
	//Initialize tooltips
	$('.nav-tabs > li a[title]').tooltip();
	
	//Wizard
	$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

		var $target = $(e.target);
	
		if ($target.parent().hasClass('disabled')) {
			return false;
		}
	});

	$(".next-step").click(function (e) {

		var $active = $('.nav-tabs li>a.active');
		$active.parent().next().removeClass('disabled');
		nextTab($active);

	});
	$(".prev-step").click(function (e) {

		var $active = $('.nav-tabs li>a.active');
		prevTab($active);

	});
});

function nextTab(elem) {
	$(elem).parent().next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
	$(elem).parent().prev().find('a[data-toggle="tab"]').click();
}




// tem que colocar no <form action="" ...onsubmit="return validation()"
function validation(){
	var responsavel = document.getElementById('responsavel').value;
	var cpf = document.getElementById('cpf').value;
	var email = document.getElementById('email').value;
	var telefone1 = document.getElementById('telefone1').value;
	var telefone2 = document.getElementById('telefone2').value;
	var bairro = document.getElementById('bairro').value;
	
	
	if(responsavel == ""){			
		document.getElementById('responsavel_err').innerHTML = "Por favor informe o responsável";
		document.getElementById('voltar').click();
		focofield('responsavel');
		return false;
	}

	if(cpf !== ""){			
		if(!validacpf(cpf)){
			document.getElementById('cpf_err').innerHTML = "CPF inválido";
			document.getElementById('voltar').click();
			focofield('cpf');
			return false;	
	
		}	
	}
	
		
	

	if(email !== ""){		
		if(!validaemail(email)){
			document.getElementById('email_err').innerHTML = "e-mail inválido";
			document.getElementById('voltar').click();
			focofield('email');
			return false;	
	
		}	
	}
	

	
	if(telefone1 == ""){
		document.getElementById('telefone1_err').innerHTML = "Você deve informar ao menos um telefone";
		document.getElementById('voltar').click();
		focofield('telefone1');
		return false;	
	}
	else
	{
		if(!validatetelefone(telefone1)){
			document.getElementById('telefone1_err').innerHTML = "Telefone inválido";
			document.getElementById('voltar').click();
			focofield('telefone1');
			return false;	
		}

	}


	if(telefone2 !== ""){
		if(!validatetelefone(telefone2)){
			document.getElementById('telefone2_err').innerHTML = "Telefone inválido";
			document.getElementById('voltar').click();
			focofield('telefone2');
			return false;	
		}	
	}

	if(bairro == null){
		document.getElementById('bairro_err').innerHTML = "Por favor selecione um bairro";
		document.getElementById('voltar').click();
		focofield('bairro');
		return false;	
	}


}//validation	

/*
Chamar função onclic getElementById
no index.html
<a id="special" class="link" href="http://yourpage.com">Your page</a>
Observe a id special
No arquivo .js*/
document.getElementById("special").onclick = function() {
    alert("You clicked me?");
    }
