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


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(45,5,'Docente',1,0,'C',1);
	$pdf->Cell(17,5,'Cedula',1,0,'C',1);
	$pdf->Cell(50,5,'Correo',1,0,'C',1);
	$pdf->Cell(5,5,'TD',1,0,'C',1);
	$pdf->Cell(35,5,'Area',1,0,'C',1);
	$pdf->Cell(55,5,'Asignatura',1,0,'C',1);
	$pdf->Cell(15,5,'Paralelo',1,0,'C',1);
	$pdf->Cell(10,5,'Horas',1,0,'C',1);
	$pdf->Cell(15,5,'Estado',1,0,'C',1);
	$pdf->Cell(10,5,'Ses',1,1,'C',1);
 
	 


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

	foreach ($asignaturadocentes as $row){  //Recorre todas la participaciones realiadas por los participantes
		if($idpersona != $row->idpersona){$factor=$factor+$x; $idpersona=$row->idpersona;}
							
			echo $factor; echo <br>;

		    $i=$i+1;
		    $pdf->Cell(5,5,$i,1,0,'R',0); 

			$pdf->SetTextColor(0,0,$factor);
		    $pdf->Cell(45,5,utf8_decode($row->eldocente),1,0,'L',0);
			$pdf->SetTextColor(0,0,0);
		    $pdf->Cell(17,5,utf8_decode($row->cedula),1,0,'L',0);
		    $pdf->Cell(50,5,utf8_decode($row->correo),1,0,'L',0);
		    $pdf->Cell(5,5,utf8_decode($row->dedicacion),1,0,'L',0);
		    $pdf->Cell(35,5,utf8_decode($row->area),1,0,'L',0);
		    $pdf->Cell(55,5,utf8_decode($row->laasignatura),1,0,'L',0);
		    $pdf->Cell(15,5,utf8_decode($row->nivel." - ".$row->paralelo),1,0,'L',0);
		    $pdf->Cell(10,5,utf8_decode($row->horas),1,0,'L',0);
		if($row->estado=='Asignada'){
			$pdf->SetTextColor(0,0,0);
		}else{
			$pdf->SetTextColor(0,0,255);
		}




		    $pdf->Cell(15,5,utf8_decode($row->estado),1,0,'L',0);
		    $pdf->Cell(10,5,utf8_decode($row->nsesion),1,1,'L',0);
    }

    die();



 





















	$pdf->Output();
?>
