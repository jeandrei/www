<?php
// URL ROOT
require_once '../inc/db.inc.php';
require_once '../inc/helpers.inc.php';

$idRegistro=$_POST["idRegistro"];
$statusRegistro=$_POST["statusRegistro"];



$sql="UPDATE fila SET fila.status='$statusRegistro' WHERE id=$idRegistro";
if(!$pdo->query($sql)===TRUE){
    echo "Erro ao tentar atualizar os dados";
}
?>