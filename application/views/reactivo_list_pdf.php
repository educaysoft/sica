<?php

	include 'plantilla.php';
        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="Reactivo";
	


	$pdf->AliasNbPages();
	$pdf->AddPage();



	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(0, 0,0);
    	$pdf->Text(20,40,$reactivos[0]->nombre); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(10,5,'idestu',1,0,'C',1);
	$pdf->Cell(60,5,'institucion',1,0,'C',1);
	$pdf->Cell(10,5,'nivel',1,0,'C',1);
	$pdf->Cell(70,5,'titulo',1,1,'C',1);
 

	$pdf->SetFont('Arial','',7);
	$id=0;
	$persona="";
	$i=0;
	foreach ($preguntas as $row){  //Recorre todas la participaciones realiadas por los participantes
	       
		    $i=$i+1;
		    $pdf->Cell(10,5,$i,1,0,'R',0); 
		    $pdf->Cell(60,5,utf8_decode($row->pregunta),1,1,'L',0);

		foreach ($respuestas as $row1){  //Recorre todas la participaciones realiadas por los participantes

		    $pdf->Cell(60,5,utf8_decode($row1->respuesta),1,1,'L',0);
		}

    }

    



 





















	$pdf->Output();
?>
