<?php
	include 'plantilla.php';
//	require 'conexion.php';
	
//	$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
//	$resultado = $mysqli->query($query);




	$pdf = new PDF();
	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	


	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);


 
 
	$pdf->SetFont('Arial','',7);


	$id=0;
	$persona="";
	$i=0;
	foreach ($portafolioestudiante as $row){  //Recorre todas la participaciones realiadas por los participantes
	       
	  if($id!=$row->idpersona)
	  {

		    $i=$i+1;
		    $pdf->Cell(5,5,$i,1,0,'R',0); 

		    $pdf->Cell(55,5,$row->elestudiante),1,0,'L',0);
		    $id=$row->idpersona;
		    
		    $pdf->Cell(5,5,utf8_decode($row->eldocumento),1,0,'L',0);
		    $pdf->Cell(5,5,utf8_decode($row->elestado),1,0,'L',0);

	  }else{    

		    $pdf->Cell(5,5,utf8_decode($row->eldocumento),1,0,'L',0);
		    $pdf->Cell(5,5,utf8_decode($row->elestado),1,0,'L',0);


   	}

 

}
	$pdf->Ln(8);
















	$pdf->Output();
?>
