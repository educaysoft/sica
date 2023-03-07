<?php


	include 'plantilla.php';



        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);
	$pdf->SetAutoPageBreak(true,22); //page created doesn't have template attached


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='UNIDAD DE NIVELACION';
	$pdf->departamento='PERIODO: 2022-2S';
	$pdf->titulo="CONTROL ACADÉMICO - LECCIONARIO";
	


	$pdf->AliasNbPages();
	$pdf->AddPage('L');


    	$pdf->Text(20,35,"Evento(Clase):  ".$sesioneventos[0]->elevento); 
    	$pdf->Text(20,40,"Docente:  ".$instructor[0]->nombres); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(10,5,'#sesion',1,0,'C',1);
	$pdf->Cell(15,5,'Dia',1,0,'C',1);
	$pdf->Cell(15,5,'Fecha',1,0,'C',1);
	$pdf->Cell(15,5,'inicio',1,0,'C',1);
	$pdf->Cell(15,5,'Termino',1,0,'C',1);
	$pdf->Cell(15,5,'Conect',1,0,'C',1);
	$pdf->Cell(15,5,'NoConect',1,0,'C',1);
	$pdf->Cell(90,5,'Tema',1,0,'C',1);
	$pdf->Cell(15,5,'Control',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);


$current_y2 = $pdf->GetY();
$current_x2 = $pdf->GetX();
$current_x = $pdf->GetX();
	$id=0;
	$persona="";
	$i=0;
	foreach ($sesioneventos as $row){  //Recorre todas la participaciones realiadas por los participantes
	       
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
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->fecha),1);
	 	 	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->horainicio),1);
	 	 	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->horafin),1);
	 	 	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->numeasis),1);
	 	 	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->numeasis),1);
	 	 	$current_x+=$cell_width;
			$pdf->SetXY($current_x, $current_y);   
			$cell_width=90;
		    $pdf->MultiCell($cell_width,5,utf8_decode($row->tema),1);
	 	 	$current_x+=$cell_width;
			$current_y2 = $pdf->GetY();
			$pdf->SetXY($current_x, $current_y);   
			$cell_width=15;
		    $pdf->MultiCell($cell_width,5,"SISTEMA",1);
	 	 	$current_x=$current_x2;

    }

    



 





















	$pdf->Output();
?>
