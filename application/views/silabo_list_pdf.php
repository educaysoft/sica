<?php


	include 'plantilla2.php';



        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);
	$pdf->SetAutoPageBreak(true,40); //page created doesn't have template attached


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad= $departamento[0]->nombre;
	$pdf->departamento='SILABO';
//	$pdf->titulo="CONTROL ACADÉMICO - LECCIONARIO";
    	$pdf->asignatura="Asignatura: ".$asignatura[0]->nombre; 
	
    
    	$pdf->mes="Periodo:  ".$calendarioacademico[0]->nombre; 
    	//$pdf->docente="unidad:  ".$temas[0]->launidadsilabo; 



	$pdf->AliasNbPages();
	$pdf->AddPage('L');



	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);





	$pdf->Cell(10,5,'#id',1,0,'C',1);
	$pdf->Cell(15,5,'unidad',1,0,'C',1);
	$pdf->Cell(100,5,'nombre',1,1,'C',1);


	$pdf->SetFont('Arial','',7);


	foreach ($unidadsilabo as $row){  //Recorre todas la participaciones realiadas por los participantes
		$pdf->Cell(10,5,$row->idunidadsilabo,1,0,'R',0); 
		$pdf->Cell(15,5,$row->unidad,1,0,'R',0); 
		$pdf->Cell(100,5,utf8_decode($row->nombre),1,1,'L',0); 

    }

    

$pdf->Ln(20);





	$current_y2 = $pdf->GetY();
	$current_x2 = $pdf->GetX();
	$current_x = $pdf->GetX();
	$id=0;
	$persona="";
	$i=0;





	$pdf->Cell(10,5,'#tema',1,0,'C',1);
	$pdf->Cell(15,5,'unidad',1,0,'C',1);
	$pdf->Cell(15,5,'numerosesion',1,0,'C',1);
	$pdf->Cell(70,5,'Tema',1,0,'C',1);
	$pdf->Cell(150,5,'Detalle',1,1,'C',1);


	$pdf->SetFont('Arial','',7);


	$current_y2 = $pdf->GetY();
	$current_x2 = $pdf->GetX();
	$current_x = $pdf->GetX();
	$id=0;
	$persona="";
	$i=0;
	foreach ($temas as $row){  //Recorre todas la participaciones realiadas por los participantes
		$current_y = $current_y2;
		$pdf->SetXY($current_x, $current_y);   
		$i=$i+1;
		$pdf->setFillColor(230,230,230);
		if($row->idmodoevaluacion>1)
		{
		$fill=1;
		}else{
		$fill=0;
		}
		$pdf->Cell(10,5,$row->idtema,1,0,'R',$fill); 
		$start_x=$pdf->GetX(); //initial x (start of column position)
		$current_x = $pdf->GetX();
		$cell_width = 15;  //define cell width
		$cell_height=10;    //define cell height

		    $pdf->MultiCell($cell_width,5,utf8_decode($row->unidad),1,'L',$fill);
	 	 	$current_x+=$cell_width;
			$current_y = $pdf->GetY()-5;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->numerosesion),1,'L',$fill);
	 	 	$current_x+=$cell_width;
			if($current_y==$pdf->GetY()-5){
				$current_y = $pdf->GetY()-5;
			}else{
				$current_y = $pdf->GetY()-10;
			}

			$pdf->SetXY($current_x, $current_y);   
			$cell_width=70;
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->nombrecorto),1);
	 	 	$current_x+=$cell_width;
			$current_y2 = $pdf->GetY();
			if($current_y==$pdf->GetY()-5){
				$current_y = $pdf->GetY()-5;
			}else{
				$current_y = $pdf->GetY()-10;
			}
			$pdf->SetXY($current_x, $current_y);   
			$cell_width=150;
			$l=strlen($row->nombrelargo);
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->nombrelargo),1);
	 	 	$current_x+=$cell_width;
			if($current_y2< $pdf->GetY()){
				$current_y2 = $pdf->GetY();
			}
			if($current_y==$pdf->GetY()-5){
				$current_y = $pdf->GetY()-5;
			}else{
				$current_y2 = $pdf->GetY();
				$current_y = $pdf->GetY()-10;
			}
			$pdf->SetXY($current_x, $current_y);   
			$cell_width=100;
	 	 	$current_x=$current_x2;
    }

    



 





















	$pdf->Output();
?>
