<?php

require APPROOT . '/views/inc/fpdf/fpdf.php'; 



class PDF extends FPDF
{            
            
            // Page header
            function Header()
            {   $currentdate = date("d-m-Y");
                // Logo
                $this->Image(APPROOT . '/views/inc/logo.png',10,6,110);
                // Date
                $this->SetFont('Arial','B',10); 
                $this->Cell(120);
                $this->Cell(260,10, utf8_decode('Data de impressão: ' . $currentdate),0,0,'C');
                // Arial bold 15
                $this->SetFont('Arial','B',15);    
                // Title
                $this->Ln(20);
                // Move to the right
                $this->Cell(120);
                $this->Cell(30,10, utf8_decode("Lista de Classificação da Fila Única"),0,0,'C');
                // Line break
                $this->Ln(20);                
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Page number
                $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');
            }
}

            // Instanciation of inherited class
            $pdf = new PDF();
            //$pdf->AliasNbPages();
            $pdf->SetFont('Times','',12);
            //$pdf = new FPDF();
            //AddPage('P') RETRATO AddPage('L') PAISAGEM
            //$pdf->AddPage('L');            
            $pdf->SetFont('Arial','B',8);
            $colunas =array("Pos", "Responsável pelo cadastro", "Nome da Criança", "Nascimento", "Etapa", "Protocolo");
            //largura das colunas
            $larguracoll = array(1 => 10, 2 => 95, 3 => 95, 4 => 20, 5 => 25, 6 => 25);
            $tam_fonte = 10;    
                        
               

                //se $data é falso não tem dados para emitir
                if($data == false){
                    $error = "Sem dados para emitir!";                   
                }
                // caso contrário monta o relatório
                else
                {
                     $error = "";
                     //adiciona uma nova pagina
                     $pdf->AddPage('L');
                     //SETA A FONTE PARA TAMANHO 8 NEGRITO
                     $pdf->SetFont('Arial','B',12);
                     $pdf->Cell(0, 5,utf8_decode("Listagem da Fila Única"), 0, 1, "C");                    
                     $i=0;
                     
                     foreach($colunas as $coluna){
                         $i++;
                         $pdf->SetFont('Arial','B',8);                   
                         $pdf->Cell($larguracoll[$i],$tam_fonte,utf8_decode($coluna),1);
                     }
 
                     foreach($data as $row) {       
                         $pdf->SetFont('Arial','',8);        
                         $pdf->Ln();                         
                         
                         $pdf->Cell($larguracoll[1],$tam_fonte,utf8_decode($row["posicao"]),1);                           
                         $pdf->Cell($larguracoll[2],$tam_fonte,utf8_decode($row["responsavel"]),1); 
                         $pdf->Cell($larguracoll[3],$tam_fonte,utf8_decode($row["nomecrianca"]),1); 
                         $pdf->Cell($larguracoll[4],$tam_fonte,utf8_decode($row["nascimento"]),1); 
                         $pdf->Cell($larguracoll[5],$tam_fonte,utf8_decode($row["etapa"]),1); 
                         $pdf->Cell($larguracoll[6],$tam_fonte,utf8_decode($row["protocolo"]),1);  
                         $pdf->Ln();    
                         
                         $pdf->Cell(90,$tam_fonte,utf8_decode("Op 01: " . $row["opcao1_id"]),1);                           
                         $pdf->Cell(90,$tam_fonte,utf8_decode("Op 02: " . $row["opcao2_id"]),1); 
                         $pdf->Cell(90,$tam_fonte,utf8_decode("Op 03: " . $row["opcao3_id"]),1);
                        
                     } 
                    
                }   


            if($error == "" && $pdf->Output())
            {
                $pdf->Output();  
            }
            else{
                $data['erro'] = $error;
                $this->view('relatorios/erroAoGerarRelatorio',$data);
                
            }            
?>

