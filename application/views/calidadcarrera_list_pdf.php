<?php

//	include 'plantilla.php';
	include 'plantilla2023-1.php';
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
	$pdf->titulo="FUENTES DE INFORMACIÓN CALIDAD DE CARRERA ";  //$calidadcarreras[0]->eltipodocu;
	


	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(20,5,'Codigo',1,0,'C',1);
	$pdf->Cell(100,5,utf8_decode('Fuente de Información'),1,0,'C',1);
	$pdf->Cell(20,5,'evidencia',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);

	$autor='';
	$persona="";
	$h=5;
	$i=0;
	foreach ($calidadcarreras as $row){  //Recorre todas la participaciones realiadas por los participantes
		$l=strlen($row->nombre);
	//	echo $l;
	//	die();
		   if($l>78){
		   	$h=10;
     		   }else{
		   	$h=5;
		   }			   

		    $i=$i+1;
		    $pdf->Cell(5,$h,$i,1,0,'R',0); 
		    $pdf->Cell(20,$h,utf8_decode($row->codigo),1,0,'L',0);
		 $current_x = $pdf->GetX();
		 $current_y = $pdf->GetY();

		 //$pdf->Cell(80,5,utf8_decode($row->asunto),1,0,'L',0);
		 $pdf->MultiCell(100,5,utf8_decode($row->nombre),1,'L',1);
		 $pdf->SetXY($current_x+100, $current_y);
         $url_base = "https://repositorioutlvte.org/Repositorio/iconos/";
         if(empty($row->archivo))
         {
            $x = $pdf->GetX(); // Obtén la posición X actual
            $y = $pdf->GetY(); // Obtén la posición Y actual

            $pdf->Image($url_base.'sindocumento.png', $x+2, $y+2, 7,7); // Coloca la imagen dentro de la celda
        }else{
            $x = $pdf->GetX(); // Obtén la posición X actual
            $y = $pdf->GetY(); // Obtén la posición Y actual

            $pdf->Image($url_base.'documento.png', $x+2, $y+2, 8,8); // Coloca la imagen dentro de la celda
		    $pdf->Cell(20,$h,"[        ]",1,0,'L',0,$row->archivo);
        }
            $pdf->Ln();

   }




//	header('Content-type: application/pdf');


	$pdf->Output();
?>
