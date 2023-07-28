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



	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0, 0,0);
    	$pdf->Text(20,40,"  "); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);

	$pdf->Cell(50,5,'Silabo:',2,0,'L',1);
	$pdf->MultiCell(120,5,utf8_decode($tema[0]->elsilabo),1,"L",0);


	$pdf->Cell(50,5,'Unidad:',2,0,'L',1);
	$pdf->MultiCell(120,5,$tema[0]->unidad."  -  ".utf8_decode($tema[0]->launidadsilabo),1,"L",0);


	$pdf->Cell(50,5,utf8_decode('Número de Sesión:'),2,0,'L',1);
	$pdf->MultiCell(120,5,$tema[0]->numerosesion,1,L,0);

	$pdf->Cell(50,5,'Tema',2,0,'L',1);
	$pdf->MultiCell(120,5,utf8_decode($tema[0]->nombrelargo),1,"L",0);


	$pdf->Cell(50,5,utf8_decode('Duración'),2,0,'L',1);
	$pdf->MultiCell(120,5,utf8_decode($tema[0]->duracionminutos."  minutos."),1,"L",0);

	$pdf->Cell(50,5,'Objetivo de Aprendizaje',2,0,'L',1);
	$pdf->MultiCell(120,5,utf8_decode($tema[0]->objetivoaprendizaje),1,"L",0);


	$pdf->Cell(50,5,'Experiencia:',2,0,'L',1);
	$pdf->MultiCell(120,5,utf8_decode($tema[0]->experiencia),1,"L",0);


	$pdf->Cell(50,5,utf8_decode('Reflexión:'),2,0,'L',1);
	$pdf->MultiCell(120,5,utf8_decode($tema[0]->reflexion),1,"L",0);



	$pdf->Cell(50,5,'Secuencia:',2,0,'L',1);
	$pdf->MultiCell(120,5,utf8_decode($tema[0]->secuencia),1,"L",0);


	$pdf->Cell(50,5,utf8_decode('Aprendizaje autónomo:'),2,0,'L',1);
	$pdf->MultiCell(120,5,utf8_decode($tema[0]->apendizajeautonomo),1,"L",0);




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
