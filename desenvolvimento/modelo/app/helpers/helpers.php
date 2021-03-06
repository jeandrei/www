<?php


/* HELPERS COM FUNCOES DO PHP */


function html($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	return $data;
}

function htmlout($text)
{
	echo html($text);
}

//PARA FAZER O DEBUG DE SQL BEM SIMPLES
/**
 * EXEMPLO $placeholders = ['id' => '1'];
 * $sql = 'SELECT * FROM fila WHERE id = :id ORDER BY id';
 * $sql = pdo_sql_debug($sql,$placeholders);
 * echo $sql;
 * 
 */
function pdo_sql_debug($sql,$placeholders){
    foreach($placeholders as $k => $v){
        $sql = preg_replace('/:'.$k.'/',"'".$v."'",$sql);
    }
    return $sql;
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


//retorna as iniciais de um nome
function iniciais($str){
    
    preg_match_all('/\b\w/u', $str, $m);
    $iniciais = implode('',$m[0]);
    return $iniciais;    
}


function imprimeuf($ufsec){
    $arrayEstados = array(
        'AC',
        'AL',
        'AM',
        'AP',
        'AC',
        'BA',
        'CE',
        'DF',
        'ES',
        'GO',
        'MA',
        'MT',
        'MS',
        'MG',
        'PA',
        'PB',
        'PR',
        'PE',
        'PE',
        'PI',
        'RJ',
        'RN',
        'RN',
        'RO',
        'RS',
        'RR',
        'SC',
        'SE',
        'SP',
        'TO' 
      );  
      foreach($arrayEstados as $uf){ 
        //iduf tem que ser passada pelo post
        if($uf == $ufsec){
          $html .= '<option selected value="'.$uf.'" '.'>'.$uf.'</option>';
        }
        else{
        $html .='<option value="'.$uf.'" '.'>'.$uf.'</option>';           
    
      }
    
    }
    return $html;
    }


?>