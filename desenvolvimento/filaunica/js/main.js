
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


//fileValidation(campo tipo field,id do span para apresentar o erro);"
// onchange="return fileValidation('comprovante_residencia','res_erro');"
function fileValidation(myfiel,span)
{
	var fileInput = document.getElementById(myfiel);
	var filePath = fileInput.value;
	var errorspan = span;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){				
		document.getElementById(errorspan).textContent="Apenas arquivo do tipo JPEG, PNG ou PDF são permitidos!";
        fileInput.value = '';
        return false;
    }else{
		document.getElementById(errorspan).textContent="";
        return true;
    }
}
	
	

function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

//função para o botão avançar do formulário
$(document).ready(function() {
		
	$('.btnNext').click(function() {
		$('.nav-tabs .active').parent().next('li').find('a').trigger('click');
		});

		$('.btnPrevious').click(function() {
			$('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
	});
});


