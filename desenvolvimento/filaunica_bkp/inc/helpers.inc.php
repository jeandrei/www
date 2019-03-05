<?php

function html($text)
{
	return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function htmlout($text)
{
	echo html($text);
}

function markdown2html($text)
{
	$text = html($text);
	//Convert plain-text formatting to HTML
	// strong emphasis
	$text = preg_replace('/__(.+?)__/s', '<strong>$1</strong>', $text);
	$text = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);
	// emphasis
	$text = preg_replace('/_([^_]+)_/', '<em>$1</em>', $text);
	$text = preg_replace('/\*([^\*]+)\*/', '<em>$1</em>', $text);
	// Convert Windows (\r\n) to Unix (\n)
	$text = str_replace("\r\n", "\n", $text);
	// Convert Macintosh (\r) to Unix (\n)
	$text = str_replace("\r", "\n", $text);
	// Paragraphs
	$text = '<p>' . str_replace("\n\n", '</p><p>', $text) . '</p>';
	// Line breaks
	$text = str_replace("\n", '<br>', $text);
	// [linked text](link URL)
	$text = preg_replace('/\[([^\]]+)]\(([-a-z0-9._~:\/?#@!$&\'()*+,;=%]+)\)/i','<a href="$2">$1</a>', $text);
return $text;
}

function markdownout($text)
{
	echo markdown2html($text);
}


function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
}


function validacelular($celular){
	if (preg_match('/(\(?\d{2}\)?) ?9?\d{4}-?\d{4}/', $celular)) {
		return true;
	} else {
		return false;
	}
}




function validanascimento($data){
$formatado = date('Y-m-d',strtotime($data));
$ano = date('Y', strtotime($formatado));
$mes = date('m', strtotime($formatado));
$dia = date('d', strtotime($formatado));
$anominimo = date('Y', strtotime('-5 year'));

	if ( !checkdate( $mes , $dia , $ano )                   // se a data for inválida
     	|| $ano < $anominimo                                // ou o ano menor que a data mínima
     	|| mktime( 0, 0, 0, $mes, $dia, $ano ) > time() )  // ou a data passar de hoje
		{
			return false;
		}else{
			return true;
		}
}

function getBairros($conn) {
    $sql = 'SELECT * FROM bairro ORDER BY nome';
    $result = $conn->query($sql);      
	
	foreach ($result as $row)
	{
	$bairros[] = array(
		'id' => $row['id'],
		'nome' => $row['nome']
	);
	}
return $bairros;
}


function getEscolas($conn) {
    $sql = 'SELECT * FROM escola ORDER BY nome';
    $result = $conn->query($sql);      
	
	foreach ($result as $row)
	{
	$bairros[] = array(
		'id' => $row['id'],
		'nome' => $row['nome']
	);
	}
return $bairros;
}








?>