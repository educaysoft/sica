<?php


	include 'plantilla2.php';
        
	$pdf = new PDF();
	$pdf->SetMargins(23, 10, 11.7);
	$pdf->SetAutoPageBreak(true,40); //page created doesn't have template attached


	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='UNIDAD DE NIVELACION';
	$pdf->departamento='PERIODO: 2022-2S';
	$pdf->titulo="CONTROL ACADÉMICO - LECCIONARIO";
	
 //   	$pdf->asignatura="Evento(Clase):  ".$sesioneventos[0]->elevento; 
    	$pdf->docente="Distributivo:  ".$distributivo[0]->eldistributivo; 
//	if($mesnumero>0){
  //  	$pdf->mes="Mes:  ".$mesletra[$mesnumero]; 
//	}


 $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
   date_default_timezone_set('America/Guayaquil');
    $fecha = date("Y-m-d");
    $horai= date("H:i:s");

	$sesiondictada= array();
	foreach ($sesionevento as $row){
		$sesiondictada[$row->fecha]= $row->idsesionevento;
	}

	$sesionactual=0;
	$sesiontotal=0;

	$f = strtotime($evento['fechainicia']);

    $d = date( "j", $f);
    $m = date("n", $f);
    $a = date("Y", $f);

if(checkdate($m,$d,$a)){
 $fechasesion= $evento['fechainicia'];

	$f = strtotime($evento['fechafinaliza']);   //Chequendo que la fecha de finalizacion estes ingresada

    $d = date( "j", $f);
    $m = date("n", $f);
    $a = date("Y", $f);

	if(checkdate($m,$d,$a)){
		 $fechahasta= $evento['fechafinaliza'];
	}else{

		 $fechahasta= $calendarioacademico[0]->fechahasta; // sin no esta la fecha de fin en el evento se toma del calendario
	}



}else{   // sin no estan ingresadas las fecha en el evento se toma del calendario asignado

 $fechasesion=$calendarioacademico[0]->fechadesde;
 $fechahasta=$calendarioacademico[0]->fechahasta;
}
 $sesiones=array();
     $i=1;
    do {
	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fechasesion))];
		if($row->nombre==$dia ){    //verifica si la fecha esta en el horario.
			$lahorai=$row->horainicio;
			$duracionminutos=$row->duracionminutos;
			$lahoraf=strtotime(' +'.$duracionminutos.' minute',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
			array_push($sesiones,array("sesion"=>$i,"fecha"=>$fechasesion,"dia"=>$dia,"horainicio"=>$lahorai,"horafin"=>$lahoraf));
			if($sesionactual==0){
			if(!isset($sesiondictada[$fechasesion]))
			{
				$fecha=$fechasesion;
			}}
			
			if(strtotime($fechasesion)==strtotime($fecha)){
				$sesionactual=$i;
			}
			
			$sesiontotal=$sesiontotal+1;
			$i=$i+1;
		}
	}
		$fechasesion=date("Y-m-d",strtotime($fechasesion."+ 1 days")); 

    }while(strtotime($fechasesion)<=strtotime($fechahasta));







	$pdf->AliasNbPages();
	$pdf->AddPage('L');


  //  	$pdf->Text(20,40,"Evento(Clase):  ".$sesioneventos[0]->elevento); 
  //  	$pdf->Text(20,45,"Docente:  ".$instructor[0]->nombres); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(45,5,'Participante',1,0,'C',1);
foreach ($sesiones as $row){
	$pdf->TextWithRotation(10,5,$row['fecha'],90,-90);

}

  $pdf->Cell(5,5,$sesiontotal,1,1,'L',1);
 
	 


	$pdf->SetFont('Arial','',7);


$current_y2 = $pdf->GetY();
$current_x2 = $pdf->GetX();
$current_x = $pdf->GetX();
$id=0;
$persona="";
$i=0;
$j=0;
foreach ($asistencia as $row){
  if($id!=$row->idpersona)
  {
   if($id>0){
    $i=$i+1;

    $pdf->Cell(5,5,$i,1,0,'R',0); 
    $pdf->Cell(45,5,utf8_decode($arrasistencia[$id]),1,0,'L',0);

    foreach ($sesiones as $row1){
      if(isset($arrasistencia[$row1['fecha']])){
	      $x=255;
	      $k=255;

      if($arrasistencia[$row1['fecha']][0]==1)   //puntual
		{
    $pdf->Cell(10,5,"PU",1,0,'L',0);
		}

     if($arrasistencia[$row1['fecha']][0]==2)   //atraseo
		{
  $pdf->Cell(10,5,"AT",1,0,'C',0);
		}


     if($arrasistencia[$row1['fecha']][0]==3)  
     {
   $pdf->Cell(10,5,"FJ",1,0,'L',0);
     }


     if($arrasistencia[$row1['fecha']][0]==4)  
     {
    $pdf->Cell(10,5,"FI",1,0,'L',0);
     }





	      $j=$j+5;
	  $asi=$asi+1;
      }else{
	      $x=$j*10;
	      $k=$j+150;
     $pdf->Cell(10,5,"XX",1,0,'L',0);
	      $j=$j+5;
	  $aus=$aus+1;
      }
    }
      $resu=round(($asi/($sesiontotal))*100,2);
      $pdf->Cell(10,5,$resu,1,1,'L',0);
$asi=0;
$aus=0;
$j=0;
   }
    $arrasistencia=array();
    $id=$row->idpersona;
    $arrasistencia[$row->idpersona]=$row->lapersona;
    $arrasistencia[$row->fecha]=array($row->idtipoasistencia,$row->hora);
  }else{

    $arrasistencia[$row->fecha]=array($row->idtipoasistencia,$row->hora);

  }
}
  $i=$i+1;

    $pdf->Cell(5,5,$i,1,0,'R',0); 
    $pdf->Cell(45,5,utf8_decode($arrasistencia[$id]),1,0,'L',0);
    foreach ($sesiones as $row1){
      if(isset($arrasistencia[$row1['fecha']])){
//          echo "<td style='color:black'>". $arrasistencia[$row1->fecha][0]."</td>";


      if($arrasistencia[$row1['fecha']][0]==1)   //puntual
		{
$pdf->Cell(10,5,"PU",1,0,'L',0);
		}

     if($arrasistencia[$row1['fecha']][0]==2)   //atraseo
		{
$pdf->Cell(10,5,"AT",1,0,'L',0);
		}


     if($arrasistencia[$row1['fecha']][0]==3)  
     {
     $pdf->Cell(10,5,"FJ",1,0,'L',0);
     }


     if($arrasistencia[$row1['fecha']][0]==4)  
     {
      $pdf->Cell(10,5,"FI"."</td>",1,0,'L',0);
     }




	  $asi=$asi+1;
      }else{

       $pdf->Cell(10,5,"xx",1,0,'L',0);
	  $aus=$aus+1;
      }
    } 
    $resu=round(($asi/($sesiontotal))*100,2);
       $pdf->Cell(10,5,.$asi." = ".$resu."%",1,1,'L',0);









	$pdf->Output();
?>
