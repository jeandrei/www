
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