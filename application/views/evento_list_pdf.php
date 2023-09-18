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
	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo=$evento['titulo'];
	


	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(50,5,'Participante',1,0,'C',1);
	$pdf->Cell(70,5,'Archivo PDF',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);

	$id=0;
	$persona="";
	$i=0;
	foreach ($participantes as $row){  //Recorre todas la participaciones realiadas por los participantes
	       
		    $i=$i+1;
		    $pdf->Cell(5,5,$i,1,0,'R',0); 
		    //$pdf->Cell(60,5,utf8_decode($row->nombres),1,0,'L',0);
		    $pdf->Cell(50,5," ",1,0,'L',0);
		   // if(isset($row->archivopdf)){
		   //	 $pdf->Cell(90,5,"https://repositorioutlvte.org/Repositorio/".utf8_decode($row->archivopdf),1,1,'L',0);
		   // }else{
		    	$pdf->Cell(70,5,"---",1,1,'L',0);
		   // }


    }




	header('Content-type: application/pdf');


	$pdf->Output();
?>
