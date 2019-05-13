<?php 
require('inc/fpdf/fpdf.php');
$pdf = new FPDF();
//AddPage('P') RETRATO AddPage('L') PAISAGEM
//$pdf->AddPage('L');
$pdf->SetFont('Arial','B',8);
$colunas =array("Pos", "Registro", "Nome", "Responsável", "Nascimento", "Etapa", "Protocolo");
//largura das colunas
$larguracoll = array(1 => 10, 2 => 30, 3 => 80, 4 => 80, 5 => 20, 6 => 25, 7 => 30);
$tam_fonte = 10;



$etapas = getEtapas($pdo);
    foreach($etapas as $etapa)
    {      
        //VERIFICA SE EXISTEM DADOS PARA SER EMITIDO
        if($registros =getFilaPorEtapaRelatorio($pdo,$etapa['id'],'Aguardando')){
            $registros = getFilaPorEtapaRelatorio($pdo,$etapa['id'],'Aguardando');
        }
        else
        {
            $registros = NULL;
        }

        if($registros <> NULL ){
            //adiciona uma nova pagina
            $pdf->AddPage('L');
            $pdf->Cell(0, 5,utf8_decode("Listagem " . $etapa['descricao']), 0, 1, "C");
            $i=0;
            foreach($colunas as $coluna){
                $i++;  
                $pdf->Cell($larguracoll[$i],$tam_fonte,utf8_decode($coluna),1);
            }
            foreach($registros as $row) {       
                $pdf->SetFont('Arial','',8);        
                $pdf->Ln();
                $i=0;
                foreach($row as $column){
                    $i++;        
                    $pdf->Cell($larguracoll[$i],$tam_fonte,utf8_decode($column),1);
                }
            } 
        }
        else
        {
            $error = "Sem dados para emitir";
        }
    
    }

    if($pdf->Output())
    {
        $pdf->Output();  
    }
    else{
        echo $error;
    }

?>