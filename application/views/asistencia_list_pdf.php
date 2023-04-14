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
    $pdf->Cell(10,5,"<td style='color:black;"." background-color:rgb(".$x.",".$k.", 255); '>". '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/></svg>'.$arrasistencia[$row1['fecha']][1]."</td>",1,0,'L',0);
		}

     if($arrasistencia[$row1['fecha']][0]==2)   //atraseo
		{
  $pdf->Cell(10,5,"<td style='color:black;"." background-color:rgb(".$x.",".$k.", 255); '>". '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>'.$arrasistencia[$row1['fecha']][1]."</td>",1,0,'C',0);
		}


     if($arrasistencia[$row1['fecha']][0]==3)  
     {
   $pdf->Cell(10,5,"<td style='color:black'>". "FJ"."</td>",1,0,'L',0);
     }


     if($arrasistencia[$row1['fecha']][0]==4)  
     {
    $pdf->Cell(10,5,"<td style='color:black'>". "FI"."</td>",1,0,'L',0);
     }





	      $j=$j+5;
	  $asi=$asi+1;
      }else{
	      $x=$j*10;
	      $k=$j+150;
     $pdf->Cell(10,5,"<td style='color:red;"." background-color:rgb(".$x.",".$k.",66); '>XX</td>",1,0,'L',0);
	      $j=$j+5;
	  $aus=$aus+1;
      }
    }
      $resu=round(($asi/($sesiontotal))*100,2);
      $pdf->Cell(10,5,"<td>".$asi." = ".$resu."%</td>",1,1,'L',0);
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
$pdf->Cell(10,5,"<td style='color:black;"." background-color:rgb(".$x.",".$k.", 255); '>". '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/></svg>'.$arrasistencia[$row1['fecha']][1]."</td>",1,0,'L',0);
		}

     if($arrasistencia[$row1['fecha']][0]==2)   //atraseo
		{
$pdf->Cell(10,5,"<td style='color:black;"." background-color:rgb(".$x.",".$k.", 255); '>". '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>'.$arrasistencia[$row1['fecha']][1]."</td>",1,0,'L',0);
		}


     if($arrasistencia[$row1['fecha']][0]==3)  
     {
     $pdf->Cell(10,5,"<td style='color:black'>". "FJ"."</td>",1,0,'L',0);
     }


     if($arrasistencia[$row1['fecha']][0]==4)  
     {
      $pdf->Cell(10,5,"<td style='color:black'>". "FA-IN"."</td>",1,0,'L',0);
     }




	  $asi=$asi+1;
      }else{

       $pdf->Cell(10,5,"<td style='color:red'>xx</td>",1,0,'L',0);
	  $aus=$aus+1;
      }
    } 
    $resu=round(($asi/($sesiontotal))*100,2);
       $pdf->Cell(10,5,"<td>".$asi." = ".$resu."%</td>",1,1,'L',0);









	$pdf->Output();
?>
