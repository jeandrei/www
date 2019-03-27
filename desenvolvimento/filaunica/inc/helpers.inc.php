<?php
session_start();


/*
sql para montar a lista
SET @contador := 0;
SELECT (SELECT @contador := @contador +1) as linha, fila.registro, fila.responsavel, fila.nomecrianca, fila.nascimento,
(SELECT descricao FROM etapa WHERE DATEDIFF(NOW(), fila.nascimento)>=idade_minima AND DATEDIFF(NOW(), fila.nascimento)<=idade_maxima) as etapa
FROM fila 
WHERE
(SELECT id FROM etapa WHERE DATEDIFF(NOW(), fila.nascimento)>=idade_minima AND DATEDIFF(NOW(), fila.nascimento)<=idade_maxima) = 19 id da etapa
ORDER BY fila.registro
*/



 // Flash message helper
  // Chama 2 vezes a função
  // 1 no Controller EXAMPLE - flash('register_succes', 'You are now registered', alert alert-danger);
  // 2 no formulário DISPLAY IN VIEW - <?php echo flash('register_success');
  function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }

            if(!empty($_SESSION[$name. '_class'])){
                unset($_SESSION[$name. '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name. '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }//elseif
    }
  }


  function redirect($page){
	header('location: ' . URLROOT . '/' . $page);        
}



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

function getEscola($pdo,$id) {
    $stmt = $pdo->prepare('SELECT nome FROM escola WHERE id=:id');
    $stmt->execute(['id' => $id]); 
    $escola = $stmt->fetch(); 
    $count = (is_array($escola) ? count($escola) : 0);
    if($count > 0){
        return $escola['nome'];
    }
    else{
        return false;
    }
}

function getEtapa($pdo,$dias) {
    $stmt = $pdo->prepare('SELECT * FROM etapa WHERE :dias>=idade_minima AND :dias<=idade_maxima');
    $stmt->execute(['dias' => $dias]);      
	$etapa = $stmt->fetch();  
    if(!empty($etapa['id'])){
        return $etapa['id'];
    }
    else{
        return false;
    }
}

function getDescricaoEtapa($pdo,$id) {
    $stmt = $pdo->prepare('SELECT descricao FROM etapa WHERE id = :id');
    $stmt->execute(['id' => $id]);      
	$descricao = $stmt->fetch();  
    if(!empty($descricao['descricao'])){
        return $descricao['descricao'];
    }
    else{
        return false;
    }
}

//retorna o número de dias de entre a data e a data atual formato 2018-07-10 ano mes e dia
// dias('2018-07-10');
function dias($data){
    $hoje = new DateTime();
    $date2=date_create($data);
    $diff=date_diff($hoje,$date2);
    $dias = $diff->format("%a");
    return $dias;
}


//função para fazer upload do arquivo
// obs tem que ter enctype="multipart/form-data no cabeçalho do form para funcionar
// para fazer upload de arquivos tem que ter essa parte
function upload_file($myfile,$newname,$description){ 
    
    $fileExtensions = ['jpeg','jpg','png','pdf']; // tipos de arquivos permitidos

    $fileName = $_FILES[$myfile]['name'];
    $fileSize = $_FILES[$myfile]['size'];
    $fileTmpName  = $_FILES[$myfile]['tmp_name'];
    $fileType = $_FILES[$myfile]['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    //$uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    

        if (! in_array($fileExtension,$fileExtensions)) {
            $file_uploaded['error'] = "Por favor informe arquivos do tipo JPEG, PNG ou PDF.";
            return $file_uploaded;
        }

        if ($fileSize > 20971520) {
            $file_uploaded['error'] = "Apenas arquivos até 20MB são permitidos";
            return $file_uploaded;
        }

        if (empty($newname)){
            $file_uploaded['error'] = "Você deve informar o nome do responsável!";
            return $file_uploaded;
        }

        if (empty($file_uploaded['error'])){
            $file_uploaded = [
                'nome' => $newname . "_" . $description,
                'extensao' => $fileExtension,
                'data' => $data
            ];        
            return $file_uploaded;
        } 
        
    
}//fim função upload


function verificaexistecrianca($conn,$nome,$nasc){
	$sql = "SELECT * FROM fila where nomecrianca = :nomecrianca AND nascimento = :nascimento";
	//$sql = "SELECT count(*) FROM fila where nomecrianca LIKE :nomecrianca AND nascimento = :nascimento";
	$s = $conn->prepare($sql);
	$s->bindValue(':nomecrianca',$nome);
    //$s->bindValue(':nomecrianca', '%' . $nome . '%');
    $s->bindValue(':nascimento', $nasc);     
    $s->execute();
	$result = $s->rowCount();	
	if($result >0)
	{
		return true;
	}  
	else
	{
		return false;
	}
}


?>

