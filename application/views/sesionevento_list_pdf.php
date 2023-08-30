<?php


	include 'plantilla2.php';



        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);
	$pdf->SetAutoPageBreak(true,40); //page created doesn't have template attached


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='UNIDAD DE NIVELACION';
	$pdf->departamento='PERIODO: 2023-1S';
	$pdf->titulo="CONTROL ACADÉMICO - LECCIONARIO";
	
    	$pdf->asignatura="Evento(Clase):  ".$sesioneventos[0]->elevento; 
    	$pdf->docente="Docente:  ".$instructor[0]->nombres; 
	if($mesnumero>0){
    	$pdf->mes="Mes:  ".$mesletra[$mesnumero]; 
	}



	$pdf->AliasNbPages();
	$pdf->AddPage('L');


  //  	$pdf->Text(20,40,"Evento(Clase):  ".$sesioneventos[0]->elevento); 
  //  	$pdf->Text(20,45,"Docente:  ".$instructor[0]->nombres); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(10,5,'#sesion',1,0,'C',1);
	$pdf->Cell(15,5,'Dia',1,0,'C',1);
	$pdf->Cell(15,5,'Fecha',1,0,'C',1);
	$pdf->Cell(15,5,'inicio',1,0,'C',1);
	$pdf->Cell(15,5,'Termino',1,0,'C',1);
	$pdf->Cell(15,5,'Conect',1,0,'C',1);
	$pdf->Cell(15,5,'NoConect',1,0,'C',1);
	$pdf->Cell(120,5,'Tema',1,0,'C',1);
	$pdf->Cell(18,5,'Control',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);


$current_y2 = $pdf->GetY();
$current_x2 = $pdf->GetX();
$current_x = $pdf->GetX();
	$id=0;
	$persona="";
	$i=0;
	foreach ($sesioneventos as $row){  //Recorre todas la participaciones realiadas por los participantes
		$nmes=date('m',strtotime($row->fecha));
		if($nmes==$mesnumero || $mesnumero==0){

$current_y = $current_y2;
	$pdf->SetXY($current_x, $current_y);   
		    $i=$i+1;
		    $pdf->Cell(10,5,$row->numerosesion,1,0,'R',0); 

$start_x=$pdf->GetX(); //initial x (start of column position)
$current_x = $pdf->GetX();
$cell_width = 15;  //define cell width
$cell_height=10;    //define cell height
		    //$pdf->Cell(15,5,utf8_decode($row->fecha),1,0,'L',0);
		    //$pdf->Cell(15,5,utf8_decode($row->horainicio),1,0,'L',0);
		    //$pdf->Cell(15,5,utf8_decode($row->horafin),1,0,'L',0);
		   // $pdf->Cell(90,5,utf8_decode($row->tema),1,1,'L',0);
  			$dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    			$dia = $dias[date('w', strtotime($row->fecha))];


		    $pdf->MultiCell($cell_width,5,utf8_decode($dia),1);
	 	 	$current_x+=$cell_width;
			$current_y = $pdf->GetY()-5;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->fecha),1);
	 	 	$current_x+=$cell_width;
			$current_y = $pdf->GetY()-5;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->horainicio),1);
	 	 	$current_x+=$cell_width;
			$current_y = $pdf->GetY()-5;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->horafin),1);
	 	 	$current_x+=$cell_width;
			$current_y = $pdf->GetY()-5;
			$pdf->SetXY($current_x, $current_y);   
			if($row->numeasis>0)
			{
		    		$pdf->MultiCell($cell_width,5,utf8_decode($row->numeasis),1);
			}else{
		    		$pdf->MultiCell($cell_width,5," ",1);
			}
	 	 	$current_x+=$cell_width;
			$current_y = $pdf->GetY()-5;
			$pdf->SetXY($current_x, $current_y);   
			if($row->numeasis>0)
			{
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->numalum-$row->numeasis),1);
			}else{
		    		$pdf->MultiCell($cell_width,5," ",1);
			}

	 	 	$current_x+=$cell_width;
			$current_y = $pdf->GetY()-5;
			$pdf->SetXY($current_x, $current_y);   
			$cell_width=120;
		    $pdf->MultiCell($cell_width,5,utf8_decode(preg_replace("[\n|\r|\n\r]","",$row->temacorto)),1);  //se eliminan salto de line
	 	 	$current_x+=$cell_width;
			$current_y = $pdf->GetY()-5;
			$current_y2 = $pdf->GetY();
			$pdf->SetXY($current_x, $current_y);   
			$cell_width=18;
		    $pdf->MultiCell($cell_width,5,"X SISTEMA",1);
	 	 	$current_x=$current_x2;
		}
    }

    



 





















	$pdf->Output();
?>
