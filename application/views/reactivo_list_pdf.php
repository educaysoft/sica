<?php

	//include 'plantillaReactivoV.php';
	include 'plantilla2023.php';


	$pdf = new PDF();
	$pdf->SetMargins(20, 10, 10);
	$pdf->SetAutoPageBreak(true,40); //page created doesn't have template attached

	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad="  ";  //$departamento[0]->nombre;
	$pdf->departamento=$reactivo['nombre']; 
	$pdf->titulo="RECTIVO";
        $pdf->laasignatura= $asignatura[0]->nombre;
        $pdf->eldocente="   "; //$silabo[0]->eldocente;
	$pdf->detalle=$reactivos[0]->detalle;


	$pdf->AliasNbPages();
	$pdf->AddPage();




//	$pdf->Cell(10,5,'idestu',1,0,'C',1);
//	$pdf->Cell(60,5,'institucion',1,0,'C',1);
//	$pdf->Cell(10,5,'nivel',1,0,'C',1);
//	$pdf->Cell(70,5,'titulo',1,1,'C',1);
 

	$checkbox1=base_url().'images/checkbox1.png';
	$pdf->SetFont('Arial','',7);
	$id=0;
	$persona="";
	$i=0;

//	print_r($preguntas);
//	die();


	foreach ($preguntas as $row){  //Recorre todas la participaciones realiadas por los participantes
	       
		    $i=$i+1;
		    $pdf->Cell(10,5,$i,1,0,'R',0); 
		//	$pdf->MultiCell(150,5,utf8_decode($row->pregunta),1);
		$pdf->WriteHTML($row->pregunta);
		  //  $pdf->Cell(150,5,utf8_decode($row->pregunta),1,1,'L',0);
		if($row->ancho>0)
		{
	    	$pdf->Ln();
		$pdf->Cell( 5, $row->alto, $pdf->Image($row->linkimagen, $pdf->GetX(), $pdf->GetY(), $row->ancho), 0, 0, 'R', false );
		}
		$pdf->Ln();

		foreach ($respuestas as $row1){  //Recorre todas la participaciones realiadas por los participantes
	            if($row1->idreactivo==$row->idreactivo && $row1->idpregunta==$row->idpregunta)
		    {
		    $pdf->Cell(5,5,"",0,0,'R',0); 
			$pdf->Cell( 5, 5, $pdf->Image($checkbox1, $pdf->GetX(), $pdf->GetY(), 4), 0, 0, 'R', false );
	
		    	$pdf->Cell(150,5,utf8_decode($row1->respuesta),1,1,'L',0);
		    }
		}
		    $pdf->Ln();


    }

    



 





















	$pdf->Output();
?>
