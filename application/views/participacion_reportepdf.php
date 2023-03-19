<?php
	include 'plantilla.php';
//	require 'conexion.php';
	
//	$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
//	$resultado = $mysqli->query($query);



	if(isset($_GET["idparticipanteestado"]))
	{
		$idparticipanteestado=$_GET["idparticipanteestado"];
	}else{
		$idparticipanteestado=0;
	}
        


	if(isset($_GET["idpersona"]))
	{
		$idpersona=$_GET["idpersona"];
	}else{
		$idpersona=0;
	}
        

	$pdf = new PDF();

	$pdf->SetMargins(23, 10, 11.7);
	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo=$evento['titulo'];
	


	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(55,5,'Participante',1,0,'C',1);
	$pdf->Cell(5,5,'GE',1,0,'C',1);
	$pdf->Cell(5,5,'CO',1,0,'C',1);
	foreach ($sesioneventos as $row){
		$pdf->Cell(8,5,$row->temacorto,1,0,'C',1);
	}
	$pdf->Cell(10,5,'P1',1,0,'C',1);
	$pdf->Cell(10,5,'Asi1',1,0,'C',1);
	$pdf->Cell(10,5,'P2',1,0,'C',1);
	$pdf->Cell(10,5,'Asi2',1,0,'C',1);
	$pdf->Cell(10,5,'Prom',1,0,'C',1);
	$pdf->Cell(10,5,'Asis',1,1,'C',1);
 
	$aprobados=0;
	$reprobados=0;
	$desertores=0;
	 
 
	$sum=0;
	$can=0;

	$parcial=array();
	$nnotas=array();

	foreach($fechacorte as $p=>$fc)
	{
	$parcial[$p]=0;
	$nnotas[$p]=0;
	}
	$nparcial=0;
	$pdf->SetFont('Arial','',7);
	$id=0;
	$persona="";
	$i=0;

	$arrasistencia=array();
	foreach ($asistencias as $row){  //Recorre todas las asistencias
		$salir=0;
		foreach($fechacorte as $p=>$fc)
		{
	      		if($row->fecha<=$fc)
			{
				if(isset($arrasistencia[$row->idpersona][$p])){
				   $arrasistencia[$row->idpersona][$p]=$arrasistencia[$row->idpersona][$p]+1;
				  }else{
				   $arrasistencia[$row->idpersona][$p]=1;
				  }
					$salir=1;
			 }
			      if($salir==1){ break;}
		}

 	}

	foreach ($participacion as $row){  //Recorre todas la participaciones realizadas por los participantes
	       
	  if($idparticipanteestado==$row->idparticipanteestado || $idparticipanteestado==0){ // En caso de que solo quiere un estado de aprticipancion    
	  if($idpersona==$row->idpersona || $idpersona==0){ // En caso de que solo quiere el de un estudiante    
	  if($id!=$row->idpersona)
	  {
	   if($id>0){    //Antes de comenzar a imprimir primero debe llenar registro

		   



		    $i=$i+1;
		    $pdf->Cell(5,5,$i,1,0,'R',0); 
		    $pdf->Cell(55,5,utf8_decode($arrparticipacion[$id]),1,0,'L',0);
		    $pdf->Cell(5,5,utf8_decode($arrgenero1[$id]),1,0,'L',0);
		    $pdf->Cell(5,5,utf8_decode($arrcolegio1[$id]),1,0,'L',0);
		    foreach ($sesioneventos as $row1){     //Recorre todas las fecha programadas en el evento
			  //  print_r($row1);
			  //  die();
		      if(isset($arrparticipacion[$row1->fecha])){    //Si el participante tuvo participacion en esa fecha
			      if($nivelrpt==2 || $nivelrpt==1)
			      { 
				   $ponderacion=1;
			      }else{
				   $ponderacion=$row1->ponderacion;
			      }
			      if($arrayuda[$row1->fecha]>0){
				$pdf->SetTextColor(3,18,249);
				$pdf->Cell(8,5,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);
			      }else{
				$pdf->Cell(8,5,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);
			      }
			$pdf->SetTextColor(0,0,0);
			$salir=0;
			foreach($fechacorte as $p=>$fc)
			{
			      if($row1->fecha<=$fc)
				{
					$parcial[$p]=$parcial[$p]+ round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2);
					$nnotas[$p]=$nnotas[$p]+1;
					$nparcial=$p;
					$salir=1;
			      }
			      if($salir==1){ break;}

			}  
		      }else{     //Si no tuvo participacion en esa fecha

			$pdf->Cell(8,5,'0',1,0,'R',0);
			foreach($fechacorte as $p=>$fc)
			{
			      if($row1->fecha<=$fc)
				{
				$parcial[$p]=$parcial[$p]+ 0; 	$nnotas[$p]=$nnotas[$p]+1; $nparcial=$p;
					break;
			      }
			}  
		      }
		  }
	    $k=0;
	    $sum=0;
	    foreach($parcial as $sp)   //---Imprime los totales de cada parcial
	    {
	       if($nnotas[$k]>=1){
		$sum=$sum+round($sp,0);
    		$pdf->Cell(10,5,round($sp,0),1,0,'R',0);
		$k=$k+1;
    		$pdf->Cell(10,5,$arrasistencia[$id][$k],1,0,'R',0);
	       }else{
		 if($sp>0){
			$sum=$sum+round($sp,0);
			$k=$k+1;

			 }
	       }
	    } 
		//-- Imprime los promedios llenado de color seguon el rango

		$resu=round($sum/$k,0);
		if ($resu<7){
			if ($resu<5){
				$pdf->setFillColor(253,194,224);	$pdf->Cell(10,5,$resu,1,0,'R',1);
				$desertores=$desertores+1;
			}else{	
				$pdf->setFillColor(245,249,3);		$pdf->Cell(10,5,$resu,1,0,'R',1);
				$reprobados=$reprobados+1;
			}
		}else{
			$pdf->setFillColor(7,195,250); 	$pdf->Cell(10,5,$resu,1,0,'R',1);
			$aprobados=$aprobados+1;
		}
		//--Imprime la asistencia
		$pdf->Cell(10,5,8,1,1,'R',0);
		//--INicializa para el proximo participante
		foreach($fechacorte as $p=>$fc)
		{
			$parcial[$p]=0;
			$nnotas[$p]=0;
		}
		$nparcial=0;
		$sum=0;
   }
	  //print_r($row);

	$arrparticipacion=array(); 	$arrgenero1=array(); 	$arrgenero2=array(); 	$arrcolegio1=array(); 	$arrcolegio2=array(); 	$arrayuda=array();
	$id=$row->idpersona;
	$arrparticipacion[$row->idpersona]=$row->nombres;
	$arrgenero1[$row->idpersona]=$row->idsexo; 
	$arrgenero2[$row->idpersona]=$row->sexo; 
	$arrcolegio1[$row->idpersona]=$row->idinstitucion; 
	$arrcolegio2[$row->idpersona]=$row->colegio; 
	$arrparticipacion[$row->fecha]=$row->porcentaje;

// echo "\n";

//	   print_r($arrparticipacion);

    	if($nivelrpt==2){	
	    $arrayuda[$row->fecha]=0;
	}else{
   	    $arrayuda[$row->fecha]=$row->ayuda;
	}



	if(isset($datag[$row->genero])){
		$datag[$row->genero]=$datag[$row->genero]+1;
	}else{
		$datag[$row->genero]=1;
	}

	if(isset($datac[$row->colegio])){
		$datac[$row->colegio]=$datac[$row->colegio]+1;
	}else{
		$datac[$row->colegio]=1;
	}

  }else{   //--Cuando 
    	$arrparticipacion[$row->fecha]=$row->porcentaje;

        if($nivelrpt==2){	
	    $arrayuda[$row->fecha]=0;
	}else{
   	    $arrayuda[$row->fecha]= $row->ayuda;
	}

  }
  }
  }
}
  $i=$i+1;
    $pdf->Cell(5,5,$i,1,0,'R',0); 
    $pdf->Cell(55,5,utf8_decode($arrparticipacion[$id]),1,0,'L',0);
    $pdf->Cell(5,5,utf8_decode($arrgenero1[$id]),1,0,'L',0);
    $pdf->Cell(5,5,utf8_decode($arrcolegio1[$id]),1,0,'L',0);
    foreach ($sesioneventos as $row1){
      if(isset($arrparticipacion[$row1->fecha])){

	      if($nivelrpt==2 || $nivelrpt==1)
	      { 
		      $ponderacion=1;
		}else{

		$ponderacion=$row1->ponderacion;
	     }


	      if($arrayuda[$row1->fecha]>0){
		$pdf->SetTextColor(3,18,249);
         	$pdf->Cell(8,5,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);
	      }else{
         	$pdf->Cell(8,5,round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2),1,0,'R',0);

	      }
		$pdf->SetTextColor(0,0,0);

	$salir=0;
	foreach($fechacorte as $p=>$fc)
	{
	      if($row1->fecha<=$fc)
		{
  			$parcial[$p]=$parcial[$p]+ round(($arrparticipacion[$row1->fecha]+$arrayuda[$row1->fecha])*$ponderacion,2);
			$nnotas[$p]=$nnotas[$p]+1;
			$nparcial=$p;
			$salir=1;
	      }
	      if($salir==1){break;}
	}  

      }else{
         $pdf->Cell(8,5,'0',1,0,'R',0);

	foreach($fechacorte as $p=>$fc)
	{
	      if($row1->fecha<=$fc)
		{
  			$parcial[$p]=$parcial[$p]+ 0;
			$nnotas[$p]=$nnotas[$p]+1;
			$nparcial=$p;
			break;
	      }

	}  
      }
    }

    $k=0;
    $sum=0;
 //	print_r($parcial);
  //  	die();


    foreach($parcial as $sp)
    {
	       if($nnotas[$k]>=1){
		$sum=$sum+round($sp,0);
    		$pdf->Cell(10,5,round($sp,0),1,0,'R',0);
		$k=$k+1;
	       }else{
		 if($sp>0){
			$sum=$sum+round($sp,0);
			$k=$k+1;

			 }
	       }
    }


    $resu=round($sum/$k,0);

    if ($resu<7){
    	if ($resu<5){

	 $pdf->setFillColor(255,194,224);
      	 $pdf->Cell(10,5,$resu,1,0,'R',1);
	 $desertores=$desertores+1;
	}else{	
	 $pdf->setFillColor(245,249,3);
      	 $pdf->Cell(10,5,$resu,1,0,'R',1);
	 $reprobados=$reprobados+1;
	}
    }else{
	 $pdf->setFillColor(7,195,250);   //celeste
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

       $pdf->addPage();

	$data=array('Aprobados'=>$aprobados, "Reprobados"=>$reprobados, "Desertores"=>$desertores);

	$pdf->SetFont("Arial", "BIU",12);
	$pdf->Cell(0,5,'Estadisticas de promovidos y no promovidos',0,1);
	$pdf->Ln(8);

	$pdf->SetFont('Arial','', 10);
	$valX=$pdf->GetX();
	$valY=$pdf->GetY();
	foreach($data as $lg=>$vg){
	$pdf->Cell(30,5,$l);
	$pdf->Cell(15,5,$c,0,0,'R');
	$pdf->Ln();
	}
	$pdf->Ln(8);

	$pdf->SetXY(90,$valY);
	$col1=array(7,195,250);  //celeste
	$col2=array(245,249,3);   //amarillo
	$col3=array(253,194,224);  //rosado
	$pdf->PieChart(100,35,$data, '%l : %v (%p)', array($col1,$col2,$col3));
	$pdf->SetXY($valX, $valY +40);








	$pdf->SetFont("Arial", "BIU",12);
	$pdf->Cell(0,5,'Estadisticas de Generos',0,1);
	$pdf->Ln(8);

	$pdf->SetFont('Arial','', 10);
	$valX=$pdf->GetX();
	$valY=$pdf->GetY();

	foreach($datag as $lg=>$vg){
	$pdf->Cell(30,5,$l);
	$pdf->Cell(15,5,$c,0,0,'R');
	$pdf->Ln();
	}


	$pdf->Ln(8);

	$pdf->SetXY(90,$valY);
	$col1=array(7,195,250);  //celeste
	$col2=array(245,249,3);   //amarillo
	$pdf->PieChart(100,35,$datag, '%l : %v (%p)', array($col1,$col2));
	$pdf->SetXY($valX, $valY +40);



	$pdf->SetFont("Arial", "BIU",12);
	$pdf->Cell(0,5,'Estadisticas de Colegio',0,1);
	$pdf->Ln(8);



	$valX=$pdf->GetX();
	$valY=$pdf->GetY();

	$pdf->BarDiagram(190,75,$datac, '%l : %v (%p)', array(255,175,100));
	$pdf->SetXY($valX, $valY +80);









	$pdf->Output();
?>
