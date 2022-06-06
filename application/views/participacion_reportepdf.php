<?php
	include 'plantilla.php';
	require('diag.php');
//	require 'conexion.php';
	
//	$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
//	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf1 = new PDF_Diag();
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

$parcial=array();
	foreach($fechacorte as $p=>$fc)
	{
	$parcial[$p]=0;

	}
$nparcial=0;

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
	      if($nivelrpt==2 || $nivelrpt==1)
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
	foreach($fechacorte as $p=>$fc)
	{
	      if($row1->fecha<$fc)
		{
  			$parcial[$p]=$parcial[$p]+ round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2);
			$nparcial=$p;
			break;
	      }

	}  
	  $can=$can+1;
      }else{
         $pdf->Cell(10,6,'0',1,0,'R',0);
	foreach($fechacorte as $p=>$fc)
	{
	      if($row1->fecha<$fc)
		{
  			$parcial[$p]=$parcial[$p]+ 0;
			$nparcial=$p;
			break;
	      }

	}  
	
      }
    }
    $k=0;
    $sum=0;
    foreach($parcial as $sp)
    {

		$sum=$sum+round($sp,0);
		$k=$k+1;
    }


    $resu=round($sum/$k,0);
    $pdf->Cell(12,6,$sum,1,0,'R',0);
    if ($resu<7){
	 $pdf->setFillColor(247,191,190);
      	 $pdf->Cell(12,6,$resu,1,0,'R',1);
    }else{
	 $pdf->setFillColor(144,238,144);
     	 $pdf->Cell(12,6,$resu,1,0,'R',1);
    }
      $pdf->Cell(12,6,8,1,1,'R',0);
	foreach($fechacorte as $p=>$fc)
	{
	$parcial[$p]=0;

	}
$nparcial=0;
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
   	 $arrayuda[$row->fecha]=$row->ayuda;
	}
  }else{
    if($nivelrpt==2){	
	    $arrayuda[$row->fecha]=0;
	}else{
   	 $arrayuda[$row->fecha]=$row->ayuda;
	}

    $arrparticipacion[$row->fecha]=$row->porcentaje;
  }
}
  $i=$i+1;
    $pdf->Cell(8,6,$i,1,0,'R',0); 
    $pdf->Cell(62,6,utf8_decode($arrparticipacion[$id]),1,0,'L',0);
    foreach ($fechaeventos as $row1){
      if(isset($arrparticipacion[$row1->fecha])){

	      if($nivelrpt==2 || $nivelrpt==1)
	      { 
		      $ponderacion=1;
		}else{

		$ponderacion=$row1->ponderacion;
	     }


	      if($arrayuda[$row1->fecha]>0){
		$pdf->SetTextColor(14,249,53);
         	$pdf->Cell(10,6,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,0),1,0,'R',0);
	      }else{
         	$pdf->Cell(10,6,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,0),1,0,'R',0);

	      }
		$pdf->SetTextColor(0,0,0);


	foreach($fechacorte as $p=>$fc)
	{
	      if($row1->fecha<$fc)
		{
  			$parcial[$p]=$parcial[$p]+ round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2);
			$nparcial=$p;
			break;
	      }

	}  

      }else{
         $pdf->Cell(10,6,'0',1,0,'R',0);


	foreach($fechacorte as $p=>$fc)
	{
	      if($row1->fecha<$fc)
		{
  			$parcial[$p]=$parcial[$p]+ 0;
			$nparcial=$p;
			break;
	      }

	}  
      }
    }

    $k=0;
    $sum=0;
    foreach($parcial as $sp)
    {

		$sum=$sum+round($sp,0);
		$k=$k+1;
    }


    $resu=round($sum/$k,0);
	    $pdf->Cell(12,6,$sum,1,0,'R',0);
    if ($resu<7){
	$pdf->setFillColor(247,191,190);
      	$pdf->Cell(12,6,$resu,1,0,'R',1);
    }else{
	$pdf->setFillColor(144,238,144);
      	$pdf->Cell(12,6,$resu,1,0,'R',1);

    }
 
      $pdf->Cell(12,6,8,1,1,'R',0);
	foreach($fechacorte as $p=>$fc)
	{
	$parcial[$p]=0;

	}
$nparcial=0;


	$sum=0;
	$can=0;








	$date=array('Men'=>1510, "Women"=>1610, "Children"=>1400);

	$pdf->SetFont("Arial", "BIU",12);
	$pdf->Cell(0,5,'1 - Pie chart',0,1);
	$pdf->Ln(8);

	$valX=$pdf->GetX();
	$valY=$pdf->GetY();

	$pdf->SetXY(90,$valY);
	$col1=array(100,100,255);
	$col2=array(100,100,255);
	$col3=array(100,100,255);
	$pdf->PieChar(100.35.$data, '%1 (%p)', array($col1,$col2,$col3));
	$pdf->SetXY($valX, $valY +40);








//	while($row = $resultado->fetch_assoc())
//	{
//		$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
//		$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
//		$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
//	}
	$pdf->Output();
?>
