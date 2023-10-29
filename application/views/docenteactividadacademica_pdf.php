<?php


	include 'plantilla2023.php';
	


        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="Indicador No1: Docente con 4to Nivel";
	


	$pdf->AliasNbPages();
	$pdf->AddPage();



	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(0, 0,0);
//    	$pdf->Text(20,40,"Docente:  ".$estudios[0]->cedula." - ". $estudios[0]->lapersona); 

   	$pdf->Text(20,40,"Distributivo docente : ". $distributivodocente['eldistributivodocente']); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);

	$pdf->Cell(8,5,'No',1,0,'C',1);
	$pdf->Cell(10,5,'Item',1,0,'C',1);
	$pdf->Cell(30,5,'Tipo',1,0,'C',1);
	$pdf->Cell(100,5,'Actividad',1,0,'C',1);
	$pdf->Cell(20,5,'horas',1,1,'R',1);
	 


	$pdf->SetFont('Arial','',7);
	$id=0;
	$persona="";
	$i=0;
//	print_r($docentes);
//	die();
	foreach ($docenteactividadacademicas as $row){  //Recorre todas la participaciones realiadas por los participantes
	
	       
		    $i=$i+1;
		    $pdf->Cell(8,5,$i,1,0,'R',0); 
		    $pdf->Cell(10,5,utf8_decode($row->item),1,0,'C',0);
		    $pdf->Cell(30,5,utf8_decode($row->tipoactividad),1,0,'L',0);
		    $current_y = $pdf->GetY();
		    $current_x = $pdf->GetX();
		    $cell_width = 100;
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->nombreactividad),1,'L',0,0);

		    $current_y2 = $pdf->GetY();
		    $pdf->SetXY($current_x + $cell_width, $current_y);

		    $current_x = $pdf->GetX();

		    $cell_width = 20;
		    $pdf->Cell(20,5,utf8_decode($row->numerohoras),1,0,'R',0);

		    $pdf->SetXY($current_x + $cell_width, $current_y2);
		    $pdf->Ln(0);
    }

    



 





















	$pdf->Output();
?>
