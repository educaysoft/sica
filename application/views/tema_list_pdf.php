<?php


	include 'plantilla.php';
	


        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="Plan de clase";
	


	$pdf->AliasNbPages();
	$pdf->AddPage();



	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(0, 0,0);
    	$pdf->Text(20,40,"Tema:  ".$tema[0]->nombrelargo); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(10,5,'Objetivo de Aprendizaje',1,0,'C',1);
	$pdf->Cell(50,5,$tema[0]->objetivoaprendizaje,1,1,'C',1);
 
/*	 


	$pdf->SetFont('Arial','',7);
	$id=0;
	$persona="";
	$i=0;
	foreach ($estudios as $row){  //Recorre todas la participaciones realiadas por los participantes
	       
		    $i=$i+1;
		    $pdf->Cell(10,5,$row->idestudio,1,0,'R',0); 
		    $pdf->Cell(60,5,utf8_decode($row->lainstitucion),1,0,'L',0);
		    $pdf->Cell(10,5,utf8_decode($row->nivel),1,0,'L',0);
		    $pdf->Cell(70,5,utf8_decode($row->titulo),1,1,'L',0);

    }
 */
    



 





















	$pdf->Output();
?>
