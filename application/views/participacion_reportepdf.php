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
	$pdf->SetFont('Arial','B',8);


 $pdf->Cell(8,5,'#',1,0,'C',1);
 $pdf->Cell(62,5,'Participante',1,0,'C',1);
foreach ($fechaeventos as $row){
 $pdf->Cell(8,5,$row->temacorto,1,0,'C',1);
}
 $pdf->Cell(10,5,'P1',1,0,'C',1);
 $pdf->Cell(10,5,'P2',1,0,'C',1);
 $pdf->Cell(10,5,'Prom',1,0,'C',1);
 $pdf->Cell(10,5,'Asis',1,1,'C',1);
 
 $aprobados=0;
 $reprobados=0;
 $desertores=0;
	 
 
 $sum=0;
$can=0;

$parcial=array();
	foreach($fechacorte as $p=>$fc)
	{
	$parcial[$p]=0;

	}
$nparcial=0;

$pdf->SetFont('Arial','',7);


$id=0;
$persona="";
$i=0;
foreach ($participacion as $row){
  if($id!=$row->idpersona)
  {
   if($id>0){
    $i=$i+1;
    $pdf->Cell(8,5,$i,1,0,'R',0); 
    $pdf->Cell(62,5,utf8_decode($arrparticipacion[$id]),1,0,'L',0);
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
         	$pdf->Cell(8,5,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);
	      }else{
         	$pdf->Cell(8,5,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);

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
         $pdf->Cell(8,5,'0',1,0,'R',0);
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
    		$pdf->Cell(10,5,round($sp,0),1,0,'R',0);
		$k=$k+1;
    }


    $resu=round($sum/$k,0);
    if ($resu<7){
    	if ($resu<5){

	 $pdf->setFillColor(255,255,100);
      	 $pdf->Cell(10,5,$resu,1,0,'R',1);
	 $desertores=$desertores+1;
	}else{	
	 $pdf->setFillColor(247,191,190);
      	 $pdf->Cell(10,5,$resu,1,0,'R',1);
	 $reprobados=$reprobados+1;
	}
    }else{
	 $pdf->setFillColor(144,238,144);
     	 $pdf->Cell(10,5,$resu,1,0,'R',1);
	 $aprobados=$aprobados+1;
    }
      $pdf->Cell(10,5,8,1,1,'R',0);
	foreach($fechacorte as $p=>$fc)
	{
	$parcial[$p]=0;

	}
	$nparcial=0;
	$sum=0;
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
    $pdf->Cell(8,5,$i,1,0,'R',0); 
    $pdf->Cell(62,5,utf8_decode($arrparticipacion[$id]),1,0,'L',0);
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
         	$pdf->Cell(8,5,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);
	      }else{
         	$pdf->Cell(8,5,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);

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
         $pdf->Cell(8,5,'0',1,0,'R',0);


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
	    	$pdf->Cell(10,5,+round($sp,0),1,0,'R',0);
		$k=$k+1;
    }


    $resu=round($sum/$k,0);

    if ($resu<7){
    	if ($resu<5){

	 $pdf->setFillColor(255,255,100);
      	 $pdf->Cell(10,5,$resu,1,0,'R',1);
	 $desertores=$desertores+1;
	}else{	
	 $pdf->setFillColor(247,191,190);
      	 $pdf->Cell(10,5,$resu,1,0,'R',1);
	 $reprobados=$reprobados+1;
	}
    }else{
	 $pdf->setFillColor(100,100,255);
     	 $pdf->Cell(10,5,$resu,1,0,'R',1);
	 $aprobados=$aprobados+1;
    }
 



      $pdf->Cell(10,5,8,1,1,'R',0);
	foreach($fechacorte as $p=>$fc)
	{
	$parcial[$p]=0;

	}
	$nparcial=0;


	$sum=0;
	$can=0;








	$data=array('Aprobados'=>$aprobados, "Reprobados"=>$reprobados, "Desertores"=>$desertores);

	$pdf->SetFont("Arial", "BIU",12);
	$pdf->Cell(0,5,'1 - Pie chart',0,1);
	$pdf->Ln(8);

	$pdf->SetFont('Arial','', 10);
	$valX=$pdf->GetX();
	$valY=$pdf->GetY();
	$pdf->Cell(30,5,'Aprobados: ');
	$pdf->Cell(15,5,$data['Aprobados'],0,0,'R');
	$pdf->Ln();
	$pdf->Cell(30,5,'Reprobados: ');
	$pdf->Cell(15,5,$data['Reprobados'],0,0,'R');
	$pdf->Ln();
	$pdf->Cell(30,5,'Desertores: ');
	$pdf->Cell(15,5,$data['Desertores'],0,0,'R');
	$pdf->Ln();
	$pdf->Ln(8);



	$pdf->SetXY(90,$valY);
	$col1=array(100,100,255);
	$col2=array(255,100,100);
	$col3=array(255,255,100);
	$pdf->PieChart(100,35,$data, '%l : %v (%p)', array($col1,$col2,$col3));
	$pdf->SetXY($valX, $valY +40);








	$pdf->Output();
?>
