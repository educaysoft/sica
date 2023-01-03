<?php


	include 'plantilla.php';
//	require 'conexion.php';
	
//	$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
//	$resultado = $mysqli->query($query);



        
	$pdf = new PDF();
	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo="hjas";
	


	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'id',1,0,'C',1);
	$pdf->Cell(60,5,'fecha',1,0,'C',1);
	$pdf->Cell(90,5,'tema',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);


	$id=0;
	$persona="";
	$i=0;
	foreach ($sesioneventos as $row){  //Recorre todas la participaciones realiadas por los participantes
	       
		    $i=$i+1;
		    $pdf->Cell(5,5,$row->idsesionevento,1,0,'R',0); 
		    $pdf->Cell(60,5,utf8_decode($row->fecha),1,0,'L',0);
		    $pdf->Cell(90,5,utf8_decode($row->tema),1,1,'L',0);

    }

    



 





















	$pdf->Output();
?>
