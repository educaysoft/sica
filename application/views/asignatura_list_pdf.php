<?php

	include 'plantilla2.php';
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

	$pdf->SetAutoPageBreak(true,40); //page created doesn't have template attached
	$pdf->institucion='UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS';
	$pdf->unidad='FACULTAD DE INGENIERIAS (FACI)';
	$pdf->departamento='CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN';
	$pdf->titulo=$asignaturas[0]->eltipodocu;
	


	$pdf->AliasNbPages();
	$pdf->AddPage('L');
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(7,5,'id',1,0,'C',1);
	$pdf->Cell(15,5,utf8_decode('Código'),1,0,'C',1);
	$pdf->Cell(8,5,'Nivel',1,0,'C',1);
	$pdf->Cell(70,5,'Asignatura',1,0,'C',1);
	$pdf->Cell(15,5,'h/clases',1,0,'C',1);
	$pdf->Cell(15,5,utf8_decode('h/autóno'),1,0,'C',1);
	$pdf->Cell(15,5,'doce',1,0,'R',1);
	$pdf->Cell(15,5,utf8_decode('prác'),1,0,'C',1);
	$pdf->Cell(15,5,utf8_decode('autó'),1,0,'C',1);
	$pdf->Cell(15,5,utf8_decode('Total'),1,0,'C',1);
	$pdf->Cell(15,5,utf8_decode('Créditos'),1,0,'C',1);
	$pdf->Cell(15,5,'malla',1,1,'C',1);
 
	 


	$pdf->SetFont('Arial','',7);

	$autor='';
	$persona="";
	$h=5;
	$i=0;
	foreach ($asignaturas as $row){  //Recorre todas la participaciones realiadas por los participantes
		$l=strlen($row->nombre);
		   if($l>60){
		   	$h=10;
     		   }else{
		   	$h=5;
		   }			   

		    $i=$i+1;
		    $pdf->Cell(5,$h,$i,1,0,'R',0); 
		    $pdf->Cell(7,$h,$row->idasignatura,1,0,'R',0); 
		    $pdf->Cell(15,$h,utf8_decode($row->codigo),1,0,'L',0);
		    $pdf->Cell(8,$h,utf8_decode($row->nivel),1,0,'L',0);
		 $current_x = $pdf->GetX();
		 $current_y = $pdf->GetY();

		 //$pdf->Cell(80,5,utf8_decode($row->asunto),1,0,'L',0);
		 $pdf->MultiCell(70,5,utf8_decode($row->nombre),1,'L',1);
		 $pdf->SetXY($current_x+70, $current_y);
         if(($row->docencia+$row->practicas)>0){
             // se divide para 16 semandas
		    $pdf->Cell(15,$h,round(($row->docencia+$row->practicas)/16,2),1,0,'R',0);
         }else{
		    $pdf->Cell(15,$h," ",1,0,'R',0);
         }
         if(($row->autonomas)>0){
             // se divide para 16 semandas
		    $pdf->Cell(15,$h,round(($row->autonomas)/16,2),1,0,'R',0);
         }else{
		    $pdf->Cell(15,$h," ",1,0,'R',0);
         }
	

		 $pdf->Cell(15,$h,utf8_decode($row->docencia),1,0,'R',0);
		 $pdf->Cell(15,$h,utf8_decode($row->practicas),1,0,'R',0);
		 $pdf->Cell(15,$h,utf8_decode($row->autonomas),1,0,'R',0);
		 $pdf->Cell(15,$h,($row->docencia+$row->practicas+$row->autonomas),1,0,'R',0);
         if(is_float(round(($row->docencia+$row->practicas+$row->autonomas)/48,2))){
            $pdf->SetTextColor(255, 0, 0); // Establece el color del texto a rojo (RGB: 255, 0, 0)
		    $pdf->Cell(15,$h,($row->docencia+$row->practicas+$row->autonomas>0)? round(($row->docencia+$row->practicas+$row->autonomas)/48,2):"",1,0,'R',0);
            $pdf->SetTextColor(0, 0, 0); // Restablece el color del texto al valor predeterminado (negro)
        }else{
		    $pdf->Cell(15,$h,($row->docencia+$row->practicas+$row->autonomas>0)? round(($row->docencia+$row->practicas+$row->autonomas)/48,2):"",1,0,'R',0);
        }

		 $pdf->Cell(15,$h,utf8_decode($row->malla),1,1,'L',0);


   }




//	header('Content-type: application/pdf');


	$pdf->Output();
?>
