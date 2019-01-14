<?php
$conexao = new PDO("mysql:host=mysql;dbname=efila","root","rootadm");
$conexao->exec('SET CHARACTR SET utf8');

$pegaAtendimento = $conexao->prepare("SELECT * FROM atendimento WHERE estabelecimento_id='".$_POST['id']."'");
$pegaAtendimento->execute();

$fetchAll = $pegaAtendimento->fetchAll();

foreach($fetchAll as $atendimento){
    echo "<option>" . $atendimento['descricao'] . "</option>";
}
?>