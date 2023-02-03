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


	$pdf->Cell(12,10,'HORA',1,0,'C',1);
	$pdf->Cell(30,10,'Lunes',1,0,'C',1);
	$pdf->Cell(30,10,'Martes',1,0,'C',1);
	$pdf->Cell(30,10,'Miercoles',1,0,'C',1);
	$pdf->Cell(30,10,'Jueves',1,0,'C',1);
	$pdf->Cell(30,10,'Viernes',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);
	$id=0;
	$persona="";
	$i=0;
	$horario1=array("07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00");
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
		    $pdf->Cell(12,10,$hora,1,0,'R',1); 
$start_x=$pdf->GetX(); //initial x (start of column position)
$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$cell_width = 30;  //define cell width
$cell_height=10;    //define cell height
	
		    if(isset($dia['Lunes'])){
		    	$pdf->MultiCell($cell_width,5,utf8_decode($dia['Lunes']),1);	    
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    }else{
		    	$pdf->Cell($cell_width,$cell_height,"",1,0,'L',0);
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    }

		    if(isset($dia['Martes'])){
		   // $pdf->Cell(30,10,utf8_decode($dia['Martes']),1,0,'L',0);
		    	$pdf->MultiCell($cell_width,5,utf8_decode($dia['Martes']),1);	    
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    }else{
		    //$pdf->Cell(30,10,"",1,0,'L',0);
		    	$pdf->Cell($cell_width,$cell_height,"",1,0,'L',0);
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    }


		    if(isset($dia['Miercoles'])){
		   // $pdf->Cell(30,10,utf8_decode($dia['Miercoles']),1,0,'L',0);
		    	$pdf->MultiCell($cell_width,5,utf8_decode($dia['Miercoles']),1);	    
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    }else{
		    //$pdf->Cell(30,10,"",1,0,'L',0);
		    	$pdf->Cell($cell_width,$cell_height,"",1,0,'L',0);
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    }


		    if(isset($dia['Jueves'])){
		    //$pdf->Cell(30,10,utf8_decode($dia['Jueves']),1,0,'L',0);
		    	$pdf->MultiCell($cell_width,5,utf8_decode($dia['Jueves']),1);	    
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    }else{
		    //$pdf->Cell(30,10,"",1,0,'L',0);
		    	$pdf->Cell($cell_width,$cell_height,"",1,0,'L',0);
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    }

		    if(isset($dia['Viernes'])){
		    //$pdf->Cell(30,10,utf8_decode($dia['Viernes']),1,1,'L',0);
		    	$pdf->MultiCell($cell_width,5,utf8_decode($dia['Viernes']),1);	    
	 	    	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
			$pdf->Ln();

		    }else{

		   	 $pdf->Cell(30,10,"",1,1,'L',0);
		    }
	}

    



 





















	$pdf->Output();
?>
