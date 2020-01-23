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

//FILEUPLOAD2 ESTÁ COM PROBLEMAS, NÃO FAZ O UPLOAD CORRETAMENTE - VERIFICAR
function upload_file2($myfile,$newname,$description){ 
    
    $fileExtensions = ['jpeg','jpg','png','pdf']; // tipos de arquivos permitidos

    if(isset($_FILES[$myfile])){             

        if(is_uploaded_file($_FILES[$myfile]['tmp_name'])){
            $file     = $_FILES[$myfile]['tmp_name'];
            $fileSize = $_FILES[$myfile]['size'];            
            $fileType = $_FILES[$myfile]['type'];
            $fileName = $_FILES[$myfile]['name'];
            $strings =  explode('.',$fileName);
            $fileExtension = strtolower(end($strings));

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
                    'data' => addslashes(file_get_contents($file))
                ];        
                
            } 
                             
        } else {
            $file_uploaded['error'] = "Erro ao realizar o upload do arquivo.";
            // se der esse erro é provavel que o php está bloqueando o upload devido ao temanho do arquivo
            // tem que mudar no php.ini o tamanho de upload post_max_size e upload_max_filesize coloca os dois 100M
            // no container copie o arquivo /usr/local/etc/php/php.ini-production no mesmo local como php.ini
            // faça as alterações de post_max_size e upload_max_filesize no php.ini 
            // depois systemctl restart apache2.service ou /etc/init.d/apache2 restart
        }
    
        
    } else {
        $file_uploaded['error'] = "Erro ao anexar o arquivo.";
    }
     
return $file_uploaded;      
}//fim função upload


function upload_file3($myfile,$newname,$description){
    // Access the $_FILES global variable for this specific file being uploaded
    // and create local PHP variables from the $_FILES array of information
    $fileName = $_FILES[$myfile]["name"]; // The file name
    $fileTmpLoc = $_FILES[$myfile]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES[$myfile]["type"]; // The type of file it is
    $fileSize = $_FILES[$myfile]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES[$myfile]["error"]; // 0 for false... and 1 for true
    $fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter the $filename
    $kaboom = explode(".", $fileName); // Split file name into an array using the dot
    $fileExt = end($kaboom); // Now target the last array element to get the file extension

    // START PHP Image Upload Error Handling --------------------------------
    if (!$fileTmpLoc) { // if file not chosen
        echo "ERROR: Please browse for a file before clicking the upload button.";
        exit();
    } else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
        echo "ERROR: Your file was larger than 5 Megabytes in size.";
        unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
        exit();
    } else if (!preg_match("/.(gif|jpg|jpeg|png)$/i", $fileName) ) {
        // This condition is only if you wish to allow uploading of specific file types    
        echo "ERROR: Your image was not .gif, .jpg, or .png.";
        unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
        exit();
    } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
        echo "ERROR: An error occured while processing the file. Try again.";
        exit();
    }

}//UPLOAD_FILE3


function uploadtodir($myfile){
    
    $currentDir = getcwd();
    //vai jogar na pasta filaunica/public/uploads
    $uploadDirectory = "/uploads/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES[$myfile]['name'];
    $fileSize = $_FILES[$myfile]['size'];
    $fileTmpName  = $_FILES[$myfile]['tmp_name'];
    $fileType = $_FILES[$myfile]['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
   
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
    //retorna o caminho onde ficou o arquivo ex /var/www/html/filaunica/public/uploads/aquivo.jpg
    return $uploadPath;
/*
    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }   */
    

}//UPLOAD_FILE4




function recizeimage($myfile){
    /*
    * PHP GD
    * resize an image using GD library
    */

    // File and new size
    //the original image has 800x600
    $filename = $myfile;
    //the resize will be a percent of the original size
    $percent = 0.5;

    // Content type
    //header('Content-Type: image/jpeg');

    // Get new sizes
    list($width, $height) = getimagesize($filename);
    $newwidth = $width * $percent;
    $newheight = $height * $percent;

    // Load
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($filename);

    // Resize
    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    // Output and free memory
    //the resized image will be 400x300
     
    return imagejpeg($thumb);    
   // imagedestroy($thumb);

}//UPLOAD_FILE4



//retorna as iniciais de um nome
function iniciais($str){
    
    preg_match_all('/\b\w/u', $str, $m);
    $iniciais = implode('',$m[0]);
    return $iniciais;    
}


?>