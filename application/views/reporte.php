<?php
	include 'plantilla.php';
//	require 'conexion.php';
	
//	$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
//	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);


 $pdf->Cell(10,6,'#',1,0,'C',1);
 $pdf->Cell(50,6,'Participante',1,0,'C',1);
foreach ($fechaeventos as $row){
 $pdf->Cell(30,6,$row->tema,1,0,'C',1);
}
 $pdf->Cell(30,6,'Prom',1,1,'C',1);
$sum=0;
$can=0;




	$pdf->SetFont('Arial','',10);


$id=0;
$persona="";
$i=0;
foreach ($participacion as $row){
  if($id!=$row->idpersona)
  {
   if($id>0){
    $i=$i+1;
    $pdf->Cell(10,6,$i,1,0,'R',1); 
    $pdf->Cell(50,6,$arrparticipacion[$id],1,0,'L',1);
    foreach ($fechaeventos as $row1){
      if(isset($arrparticipacion[$row1->fecha])){
         $pdf->Cell(30,6,$arrparticipacion[$row1->fecha],1,0,'R',1);
	  $sum=$sum+ $arrparticipacion[$row1->fecha];
	  $can=$can+1;
      }else{
         $pdf->Cell(30,6,'0',1,0.00,'R',1);
	  $sum=$sum+ 0;
	  $can=$can+1;

      }
    }

      $resu=round(($sum/($can)),2);
      $pdf->Cell(30,6,$resu,1,1,'R',1);
	$sum=0;
	$can=0;
   }
    $arrparticipacion=array();
    $id=$row->idpersona;
    $arrparticipacion[$row->idpersona]=$row->nombres;
    $arrparticipacion[$row->fecha]=$row->porcentaje;
  }else{
    $arrparticipacion[$row->fecha]=$row->porcentaje;
  }
}
  $i=$i+1;
    $pdf->Cell(10,6,$i,1,0,'R',1); 
    $pdf->Cell(50,6,utf8_decode($arrparticipacion[$id]),1,0,'L',1);
    foreach ($fechaeventos as $row1){
      if(isset($arrparticipacion[$row1->fecha])){
         $pdf->Cell(30,6,$arrparticipacion[$row1->fecha],1,0,'R',1);
         $sum=$sum+ $arrparticipacion[$row1->fecha];
	 $can=$can+1;
      }else{
         $pdf->Cell(30,6,'0.00',1,0,'R',1);
	  $sum=$sum+ 0;
	  $can=$can+1;
      }
    } 
      $resu=round(($sum/($can)),2);
      $pdf->Cell(30,6,$resu,1,1,'R',1);
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
