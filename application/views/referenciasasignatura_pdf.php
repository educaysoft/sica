<?php


	include 'plantilla2023-2.php';
	


        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="Indicador No: Refeencias bibliografica";
	


	$pdf->AliasNbPages();
	$pdf->AddPage();



	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(0, 0,0);
//    	$pdf->Text(20,40,"Docente:  ".$estudios[0]->cedula." - ". $estudios[0]->lapersona); 

//    	$pdf->Text(20,40,"Distributivo : ". $distributivo[0]->eldistributivo); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


 


	$pdf->SetFont('Arial','',7);
	$id=0;
	$persona="";
	$i=0;
//	print_r($docentes);
//	die();
	foreach ($referenciasasignaturas as $row){  //Recorre todas la participaciones realiadas por los participantes

    $i=$i+1;
	$pdf->Cell(15,5,'No        : ',1,0,'C',1);  $pdf->Cell(8,5,$i,1,1,'R',0); 
	$pdf->Cell(15,5,'Tipo      :',1,0,'C',1);  $pdf->Cell(20,5,utf8_decode($row->tipo),1,1,'C',0);
	$pdf->Cell(15,5,'Asignatura:',1,0,'C',1);  $pdf->MultiCell(80,5,utf8_decode($row->laasignatura),1,1,'L',0);
	$pdf->Cell(15,5,'tiulo        :',1,0,'C',1);    $pdf->MultiCell(150,5,utf8_decode($row->titulo),1,'L',0);
	$pdf->Cell(15,5,'url       :',1,0,'C',1);     $pdf->MultiCell(150,5,utf8_decode($row->url),1,'L',0);
	$pdf->Cell(15,5,'Apa       :',1,0,'C',1);     $pdf->MultiCell(150,5,utf8_decode($row->apa),1,'L',0);
    $pdf->Cell(15,5,'bittext   :',1,0,'C',1);     $pdf->MultiCell(150,5,utf8_decode($row->bibtex),1,'L',0);
    $pdf->Ln();
    }

    



 





















	$pdf->Output();
?>
