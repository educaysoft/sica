<?php


	include 'plantilla.php';
	


        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="Registro del docente";
	


	$pdf->AliasNbPages();
	$pdf->AddPage();


	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(0, 0,0);
    	$pdf->Text(20,40,"Distributivodocente:  ".$jornadadocente[0]->iddistributivodocente); 

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
	$horario1=array("07:00:00","08:00:00","09:00:00","10:00:00");
	$horario2=array();
	foreach ($horario1 as $hora){
		foreach ($jornadadocente as $row){
			if($row->horainicio==$hora){
				$horario2[$row->horainicio][$row->nombre]=$row->laasignatura."-".$row->nivel."-".$row->paralelo;
			}
		}
	}

//	print_r($horario2);	
//	die();
	foreach ($horario2 as $hora=>$dia){  //Recorre todas la participaciones realizadas por los participantes
		    $i=$i+1;
		    $pdf->Cell(10,5,$hora,1,0,'R',0); 
		    if(isset($dia['Lunes'])){
		    $pdf->Cell(60,5,utf8_decode($dia['Lunes']),1,0,'L',0);
		    }else{
		    $pdf->Cell(60,5,"",1,0,'L',0);
		    }

		    if(isset($dia['Martes'])){
		    $pdf->Cell(10,5,utf8_decode($dia['Martes']),1,0,'L',0);
		    }else{
		    $pdf->Cell(10,5,"",1,0,'L',0);

		    }

		    if(isset($dia['Miercoles'])){
		    $pdf->Cell(70,5,utf8_decode($dia['Miercoles']),1,1,'L',0);
		    }else{

		    $pdf->Cell(70,5,"",1,1,'L',0);
		    }
	}

    



 





















	$pdf->Output();
?>
