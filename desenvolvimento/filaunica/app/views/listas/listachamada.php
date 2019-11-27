<?php

require APPROOT . '/views/inc/fpdf/fpdf.php';

$pdf = new FPDF();
//AddPage('P') RETRATO AddPage('L') PAISAGEM
//$pdf->AddPage('L');
$pdf->SetFont('Arial','B',8);
$colunas =array("Pos", "Registro", "Iniciais Nome", "Responsável", "Nascimento", "Etapa", "Protocolo");
//largura das colunas
$larguracoll = array(1 => 10, 2 => 30, 3 => 30, 4 => 130, 5 => 20, 6 => 25, 7 => 35);
$tam_fonte = 10;
var_dump($data['registros']);
/*
foreach ($data['etapas'] as $etapa){
    echo $etapa['descricao'];
}
*/


    foreach($data['registros'] as $registros)
    { 
    
        if($data['registros'] <> NULL ){
        }
    }

?>