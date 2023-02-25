<?php


	include 'plantilla.php';
	


        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
//	$pdf->unidad=$distributivo[0]->launidad;
//	$pdf->departamento=$distributivo[0]->eldepartamento;
	$pdf->titulo="Distributivo ".$distributivoacademicos[0]->eldistributivo;
	


	$pdf->AliasNbPages();
	$pdf->AddPage();



	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(0, 0,0);
   // 	$pdf->Text(20,40,"Docente:  ".$distributivoacademicos[0]->cedula." - ". $estudios[0]->lapersona); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(10,5,'dist',1,0,'C',1);
	$pdf->Cell(20,5,'periodo',1,0,'C',1);
	$pdf->Cell(70,5,'docente',1,0,'C',1);
	$pdf->Cell(10,5,'horas',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);
	$id=0;
	$persona="";
	$i=0;
	foreach ($distributivodocentes as $row){  //Recorre todas la participaciones realiadas por los participantes
		    $i=$i+1;
		    $pdf->Cell(10,5,$row->iddistributivo,1,0,'R',0); 
		    $pdf->Cell(20,5,utf8_decode($row->elperiodoacademico),1,0,'L',0);
		    $pdf->Cell(70,5,utf8_decode($row->eldocente),1,0,'L',0);
		    $pdf->Cell(10,5,utf8_decode($row->horas),1,1,'L',0);
    }

    



 





















	$pdf->Output();
?>
