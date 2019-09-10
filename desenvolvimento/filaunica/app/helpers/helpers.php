<?php

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


//função para fazer upload do arquivo
// obs tem que ter enctype="multipart/form-data no cabeçalho do form para funcionar
// para fazer upload de arquivos tem que ter essa parte
function upload_file($myfile,$newname,$description){ 
    
    $fileExtensions = ['jpeg','jpg','png','pdf']; // tipos de arquivos permitidos
    $file     = $_FILES[$myfile]['tmp_name'];
    $fileSize = $_FILES[$myfile]['size'];
    $fileType = $_FILES[$myfile]['type'];
    $fileName = $_FILES[$myfile]['name']; 
    die($fileSize);
  
    $strings =  explode('.',$fileName);
    $fileExtension = strtolower(end($strings));

    //$uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    

        if (! in_array($fileExtension,$fileExtensions)) {
            $file_uploaded['error'] = "Por favor informe arquivos do tipo JPEG, PNG ou PDF.";            
        }

        if ($fileSize > 20971520) {
            $file_uploaded['error'] = "Apenas arquivos até 20MB são permitidos";            
        }

        if (empty($newname)){
            $file_uploaded['error'] = "Você deve informar o nome do responsável!";            
        }

        if (empty($file_uploaded['error'])){
            $file_uploaded = [
                'nome' => $newname . "_" . $description,
                'extensao' => $fileExtension,
                'tipo' => $fileType,
                'data' => file_get_contents($file)
            ];        
            
        } 
        
return $file_uploaded;    
}//fim função upload

?>