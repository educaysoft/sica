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

    	$pdf->Text(20,40,"Distributivo : ". $docenteactividadacademica[0]->eldistributivodocente); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(8,5,'No',1,0,'C',1);
	$pdf->Cell(10,5,'Item',1,0,'C',1);
	$pdf->Cell(80,5,'Actividad',1,0,'C',1);
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
		    $pdf->Cell(20,5,utf8_decode($row->item),1,0,'C',0);
		    $pdf->MultiCell(80,5,utf8_decode($row->nombreactividad),1,'L',0);
		    $pdf->Cell(50,5,utf8_decode($row->numerohoras),1,1,'R',0);
    }

    



 





















	$pdf->Output();
?>
