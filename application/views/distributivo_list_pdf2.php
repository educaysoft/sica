<?php


	//include 'plantilla2.php';
	include 'plantilla2023-1.php';



        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);
	$pdf->SetAutoPageBreak(true,40); //page created doesn't have template attached


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="PRESENTACIÓN DEL SILABO";
	
 //   	$pdf->asignatura="Evento(Clase):  ".$sesioneventos[0]->elevento; 
    	$pdf->docente="Distributivo:  ".$distributivo[0]->eldistributivo; 
//	if($mesnumero>0){
  //  	$pdf->mes="Mes:  ".$mesletra[$mesnumero]; 
//	}



	$pdf->AliasNbPages();
	$pdf->AddPage('L');



	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(45,5,'Docente',1,0,'C',1);
	$pdf->Cell(15,5,'Area',1,0,'C',1);
	$pdf->Cell(55,5,'Asignatura',1,0,'C',1);
	$pdf->Cell(15,5,'Paralelo',1,0,'C',1);
	$pdf->Cell(10,5,'Horas',1,0,'C',1);
	$pdf->Cell(10,5,'Ses',1,0,'C',1);
	$pdf->Cell(35,5,'Silabopdf',1,0,'C',1);
	$pdf->Cell(35,5,'Planpdf',1,0,'C',1);
	$pdf->Cell(35,5,'Distib. Indiv',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);


	$current_y2 = $pdf->GetY();
	$current_x2 = $pdf->GetX();
	$current_x = $pdf->GetX();
	$id=0;
	$persona="";
	$i=0;
	$factor=1;
	$idpersona=0;
	$x=count($asignaturadocentes);
	$x=1; 

	foreach ($asignaturadocentes as $row){  
		$x=$x+1;
	}
	$x=round(255/$x,0);
	$cedula=0;
	foreach ($asignaturadocentes as $row){  //Recorre todas la participaciones realiadas por los participantes
							
		    if($cedula != $row->cedula){
		    $i=$i+1;
		    $pdf->Cell(5,5,$i,1,0,'R',0); 
		    $pdf->Cell(45,5,utf8_decode($row->eldocente),1,0,'L',0);
		    $cedula=$row->cedula;
		    }else{
		    $pdf->Cell(5,5,"",1,0,'R',0); 
		   // $pdf->Cell(17,5,utf8_decode(""),1,0,'L',0);
		    $pdf->Cell(45,5,utf8_decode(""),1,0,'L',0);
		    }




		    $pdf->Cell(15,5,utf8_decode($row->area),1,0,'L',0);
		    $pdf->Cell(55,5,utf8_decode($row->laasignatura),1,0,'L',0);
		    $pdf->Cell(15,5,utf8_decode($row->nivel." - ".$row->paralelo),1,0,'L',0);
		    $pdf->Cell(10,5,utf8_decode($row->horas),1,0,'L',0);




		    $pdf->Cell(10,5,utf8_decode($row->cantidadtemas),1,0,'L',0);
		    $link= 'https://repositorioutlvte.org/Repositorio/'.$row->archivopdf;
		    $pdf->Cell(35,5,utf8_decode($row->archivopdf),1,0,'L',0,$link);
		    $link= 'https://repositorioutlvte.org/Repositorio/'.$row->planpdf;
		    $pdf->Cell(35,5,utf8_decode($row->planpdf),1,0,'L',0,$link);
		    $link= 'https://repositorioutlvte.org/Repositorio/'.$row->distributivoindividualpdf;
		    $pdf->Cell(35,5,utf8_decode($row->distributivoindividualpdf),1,1,'L',0,$link);
    }




 





















	$pdf->Output();
?>
