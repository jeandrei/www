<?php



function html($text)
{
	return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}


function htmlout($text)
{	//função para imprimir dados passados pelo método POST de forma segura
	//previne usuários mal intencionados de injetar código através do método post
	//utilização htmlout($variavel['item']);
	echo html($text);
}



?>