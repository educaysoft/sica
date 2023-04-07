<?php


	include 'plantilla2.php';



        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);
	$pdf->SetAutoPageBreak(true,40); //page created doesn't have template attached


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='UNIDAD DE NIVELACION';
	$pdf->departamento='PERIODO: 2022-2S';
	$pdf->titulo="CONTROL ACADÉMICO - LECCIONARIO";
	
 //   	$pdf->asignatura="Evento(Clase):  ".$sesioneventos[0]->elevento; 
    	$pdf->docente="Distributivo:  ".$distributivo[0]->eldistributivo; 
//	if($mesnumero>0){
  //  	$pdf->mes="Mes:  ".$mesletra[$mesnumero]; 
//	}



	$pdf->AliasNbPages();
	$pdf->AddPage('L');


  //  	$pdf->Text(20,40,"Evento(Clase):  ".$sesioneventos[0]->elevento); 
  //  	$pdf->Text(20,45,"Docente:  ".$instructor[0]->nombres); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(10,5,'#sesion',1,0,'C',1);
	$pdf->Cell(45,5,'Docente',1,0,'C',1);
	$pdf->Cell(15,5,'Cedula',1,0,'C',1);
	$pdf->Cell(15,5,'Correo',1,0,'C',1);
	$pdf->Cell(15,5,'Dedicacion',1,0,'C',1);
	$pdf->Cell(25,5,'Area',1,0,'C',1);
	$pdf->Cell(60,5,'Asignatura',1,0,'C',1);
	$pdf->Cell(15,5,'Paralelo',1,0,'C',1);
	$pdf->Cell(15,5,'Horas',1,0,'C',1);
	$pdf->Cell(15,5,'Estado',1,0,'C',1);
	$pdf->Cell(15,5,'Sesiones',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);


$current_y2 = $pdf->GetY();
$current_x2 = $pdf->GetX();
$current_x = $pdf->GetX();
	$id=0;
	$persona="";
	$i=0;
	foreach ($asignaturadocentes as $row){  //Recorre todas la participaciones realiadas por los participantes

		    $i=$i+1;
		    $pdf->Cell(10,5,$i,1,0,'R',0); 
		    $pdf->Cell(45,5,utf8_decode($row->eldocente),1,0,'L',0);
		    $pdf->Cell(15,5,"00000000",1,0,'L',0);
		    $pdf->Cell(15,5,utf8_decode("sin@correo"),1,0,'L',0);
		    $pdf->Cell(15,5,"",1,0,'L',0);
		    $pdf->Cell(25,5,utf8_decode($row->area),1,0,'L',0);
		    $pdf->Cell(60,5,utf8_decode($row->laasignatura),1,0,'L',0);
		    $pdf->Cell(15,5,utf8_decode($row->nivel." - ".$row->paralelo),1,0,'L',0);
		    $pdf->Cell(15,5,utf8_decode($row->horas),1,0,'L',0);
		    $pdf->Cell(15,5,utf8_decode($row->estado),1,0,'L',0);
		    $pdf->Cell(15,5,utf8_decode($row->nsesion),1,1,'L',0);
		    
    }

    



 





















	$pdf->Output();
?>
