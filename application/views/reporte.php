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
	$pdf->Cell(70,6,'ESTADO',1,0,'C',1);
	$pdf->Cell(20,6,'ID',1,0,'C',1);
	$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);


 $pdf->Cell(10,6,'#',1,0,'C',1);
 $pdf->Cell(50,6,'Participante',1,0,'C',1);
foreach ($fechaeventos as $row){
 $pdf->Cell(30,6,$row->tema,1,0,'C',1);
}
 $pdf->Cell(30,6,'Prom',1,0,'C',1);
$sum=0;
$can=0;




	$pdf->SetFont('Arial','',10);
	
//	while($row = $resultado->fetch_assoc())
//	{
//		$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
//		$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
//		$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
//	}
	$pdf->Output();
?>
