<?php
	include 'plantilla.php';
//	require 'conexion.php';
	
//	$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
//	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo=$evento['titulo'];
	


	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);


 $pdf->Cell(8,6,'#',1,0,'C',1);
 $pdf->Cell(62,6,'Participante',1,0,'C',1);
foreach ($fechaeventos as $row){
 $pdf->Cell(10,6,$row->temacorto,1,0,'C',1);
}
 $pdf->Cell(12,6,'Total',1,0,'C',1);
 $pdf->Cell(12,6,'Prom',1,0,'C',1);
 $pdf->Cell(12,6,'Asis',1,1,'C',1);
$sum=0;
$can=0;




	$pdf->SetFont('Arial','',8);


$id=0;
$persona="";
$i=0;
foreach ($participacion as $row){
  if($id!=$row->idpersona)
  {
   if($id>0){
    $i=$i+1;
    $pdf->Cell(8,6,$i,1,0,'R',0); 
    $pdf->Cell(62,6,utf8_decode($arrparticipacion[$id]),1,0,'L',0);
    foreach ($fechaeventos as $row1){
      if(isset($arrparticipacion[$row1->fecha])){
	      if($nivelrpt==2)
	      { 
		      $ponderacion=1;
		}else{

		$ponderacion=$row1->ponderacion;
	     }
	      if($arrayuda[$row1->fecha]>0){
		$pdf->SetTextColor(14,249,53);
         	$pdf->Cell(10,6,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);
	      }else{
         	$pdf->Cell(10,6,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);

	      }
		$pdf->SetTextColor(0,0,0);




	  $sum=$sum+ round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2);
	  $can=$can+1;
      }else{
         $pdf->Cell(10,6,'0',1,0,'R',0);
	  $sum=$sum+ 0;
	  $can=$can+1;

      }
    }

      //$resu=round(($sum/($can)),0);
      $resu=round(($sum/2), 0);
    $pdf->Cell(12,6,$sum,1,0,'R',0);
    if ($resu<7){
	 $pdf->setFillColor(247,191,190);
      	 $pdf->Cell(12,6,$resu,1,0,'R',1);
    }else{
	 $pdf->setFillColor(144,238,144);
     	 $pdf->Cell(12,6,$resu,1,0,'R',1);

    }
      $pdf->Cell(12,6,8,1,1,'R',0);
	$sum=0;
	$can=0;
   }
    $arrparticipacion=array();
    $arrayuda=array();
    $id=$row->idpersona;
    $arrparticipacion[$row->idpersona]=$row->nombres;
    $arrparticipacion[$row->fecha]=$row->porcentaje;
    if($nivelrpt==2){	
	    $arrayuda[$row->fecha]=0;
	}else{
    if($nivelrpt==1){	
	    $arrayuda[$row->fecha]=0;
	}else{
	
   	 $arrayuda[$row->fecha]=$row->ayuda;
	}
	}


  }else{
    $arrparticipacion[$row->fecha]=$row->porcentaje;
    $arrayuda[$row->fecha]=$row->ayuda;
  }
}
  $i=$i+1;
    $pdf->Cell(8,6,$i,1,0,'R',0); 
    $pdf->Cell(62,6,utf8_decode($arrparticipacion[$id]),1,0,'L',0);
    foreach ($fechaeventos as $row1){
      if(isset($arrparticipacion[$row1->fecha])){

	      if($nivelrpt==2)
	      { 
		      $ponderacion=1;
		}else{

		$ponderacion=$row1->ponderacion;
	     }


	      if($arrayuda[$row1->fecha]>0){
		$pdf->SetTextColor(14,249,53);
         	$pdf->Cell(10,6,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);
	      }else{
         	$pdf->Cell(10,6,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);

	      }
		$pdf->SetTextColor(0,0,0);

	  	$sum=$sum+ round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2);
	 	$can=$can+1;
      }else{
         $pdf->Cell(10,6,'0',1,0,'R',0);
	  $sum=$sum+ 0;
	  $can=$can+1;
      }
    }
   $resu=0; 
     // $resu=round(($sum/($can)), 0);
      $resu=round(($sum/2), 0);
	    $pdf->Cell(12,6,$sum,1,0,'R',0);
    if ($resu<7){
	$pdf->setFillColor(247,191,190);
      	$pdf->Cell(12,6,$resu,1,0,'R',1);
    }else{
	$pdf->setFillColor(144,238,144);
      	$pdf->Cell(12,6,$resu,1,0,'R',1);

    }
 
      $pdf->Cell(12,6,8,1,1,'R',0);
	$sum=0;
	$can=0;



















//	while($row = $resultado->fetch_assoc())
//	{
//		$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
//		$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
//		$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
//	}
	$pdf->Output();
?>
