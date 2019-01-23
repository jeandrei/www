
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



function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

$("#responsavel").on("change", function () {

	return validaCampo(this, 10);

});


function submeterCadasstro() 
{
	var responsavel = $("#responsavel").val();
	var cpf = $("#cpf").val();
	var email = $("#email").val();
	var telefone1 = $("#telefone1").val();
	var telefone2 = $("#telefone2").val();
	var bairro = $("#bairro").val();
	var rua = $("#rua").val();
	var numero = $("#numero").val();
	var complemento = $("#complemento").val();


	var nome = $("#nome").val();
	var nascimento = $("#nascimento").val();
	var certidao = $("#certidao").val();

	var setor1 = $("#setor1").val();
	var setor2 = $("#setor2").val();
	var setor3 = $("#setor3").val();

	var turno1 = $("#turno1").val();
	var turno2 = $("#turno2").val();
	var turno3 = $("#turno3").val();

	var certidaonascimento_upload = $("#certidaonascimento_upload").val();
	var comprovante_residencia_upload = $("#comprovante_residencia_upload").val();

	if (!validaCampo($("#responsavel"), 10)) {
		return MsgModal('#myModal', 'Por favor informe o nome do responsável corretamente.', '<i class="fa fa-exclamation" aria-hidden="true"></i> Atenção !');
		//console.log('campo');
	}


	
}

function validaCampo(campo, tamanho) {

	if ($(campo).val() === undefined || $(campo).val() === null || $(campo).val() === "") {
		// ✖️ inválido
		$(campo.parentElement).removeClass("has-success");
		$(campo.parentElement).addClass("has-error");
		return false;
	}

	if ($(campo).val().length >= tamanho) {
		// ✔️ válido
		$(campo.parentElement).removeClass("has-error");
		$(campo.parentElement).addClass("has-success");
		return true;
	} else {
		// ✖️ inválido
		$(campo.parentElement).removeClass("has-success");
		$(campo.parentElement).addClass("has-error");
		return false;
	}
}

