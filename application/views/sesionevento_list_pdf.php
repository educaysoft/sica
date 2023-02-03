<?php


	include 'plantilla.php';



        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="hjas";
	


	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(10,5,'id',1,0,'C',1);
	$pdf->Cell(15,5,'fecha',1,0,'C',1);
	$pdf->Cell(15,5,'inicio',1,0,'C',1);
	$pdf->Cell(15,5,'fin',1,0,'C',1);
	$pdf->Cell(90,5,'tema',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);


	$id=0;
	$persona="";
	$i=0;
	foreach ($sesioneventos as $row){  //Recorre todas la participaciones realiadas por los participantes
	       
		    $i=$i+1;
		    $pdf->Cell(10,10,$row->idsesionevento,1,0,'R',0); 

$start_x=$pdf->GetX(); //initial x (start of column position)
$current_y = $pdf->GetY();
$current_x = $pdf->GetX();
$cell_width = 15;  //define cell width
$cell_height=10;    //define cell height
		    //$pdf->Cell(15,5,utf8_decode($row->fecha),1,0,'L',0);
		    //$pdf->Cell(15,5,utf8_decode($row->horainicio),1,0,'L',0);
		    //$pdf->Cell(15,5,utf8_decode($row->horafin),1,0,'L',0);
		   // $pdf->Cell(90,5,utf8_decode($row->tema),1,1,'L',0);


		    $pdf->MultiCell($cell_width,5,utf8_decode($row->fecha),1);
	 	 	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->horainicio),1);
	 	 	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->horafin),1);
	 	 	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
			$cell_width=90;
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->tema),1);
	 	 	$current_x+=$cell_width;
    }

    



 





















	$pdf->Output();
?>
