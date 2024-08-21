<?php

//	include 'plantilla.php';
//	include 'plantilla2.php';
	include 'plantilla2023-2.php';
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
	$pdf->titulo="TEMAS EN ESTADO DE ".$trabajointegracioncurriculars[0]->elestado;
	


	$pdf->AliasNbPages();
	$pdf->AddPage('L');
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);


	$pdf->Cell(5,5,'#',1,0,'C',1);
	$pdf->Cell(45,5,'Autor/Lector',1,0,'C',1);
	$pdf->Cell(10,5,'id',1,0,'C',1);
	$pdf->Cell(80,5,'tema/propuesta',1,0,'C',1);
	$pdf->Cell(100,5,'Resumen de tema',1,1,'C',1);
 

	$pdf->SetFont('Arial','',7);

$autor = '';
$i = 0;

foreach ($trabajointegracioncurriculars as $row) {
    // Calcula la longitud máxima entre el resumen y el nombre
    $maxLength = max(strlen($row->resumen), strlen($row->nombre));

    // Calcula la altura de la celda basándose en la longitud máxima
    $h = ($maxLength > 84) ? ceil($maxLength / 84) * 5 : 5;


    $py0 = $pdf->GetY();

    // Incrementa el índice si hay un nuevo autor
    if ($autor != $row->ellector) {
        $i++;
        $pdf->Cell(5, $h, $i, 1, 0, 'R', 0);
        $pdf->Cell(45, $h, utf8_decode($row->ellector), 1, 0, 'L', 0);
        $autor = $row->ellector;
    } else {
        // Solo incrementa el índice y deja la celda vacía si el autor es el mismo
        $i++;
        $pdf->Cell(5, $h, $i, 1, 0, 'R', 0);
        $pdf->Cell(45, $h, '', 1, 0, 'L', 0);
    }

    // Posición actual en X e Y
    $current_x = $pdf->GetX();
    $current_y = $pdf->GetY();
    $py1 = $pdf->GetY();

    $h1=$py1-$py0;
    // Imprime la celda con el ID
    $pdf->MultiCell(10, $h, utf8_decode($row->idtrabajointegracioncurricular), 1, 'L', 1);
   
       // $pdf->SetXY($pdf->GetX(), $py1);


    $pdf->SetXY($current_x + 10, $current_y);


    // Imprime la celda con el nombre, ajustando su longitud
    $pdf->MultiCell(80, 5, utf8_decode(str_pad($row->nombre, $maxLength - strlen($row->nombre), ' ', STR_PAD_RIGHT)), 1, 'L', 1);
    $pdf->SetXY($current_x + 90, $current_y); // Se ajusta en 90 porque sumamos 10+80

    // Imprime la celda con el resumen, ajustando su longitud
    $pdf->MultiCell(100, 5, utf8_decode(str_pad($row->resumen, $maxLength - strlen($row->resumen), ' ', STR_PAD_RIGHT)), 1, 'L', 1);
}


//	header('Content-type: application/pdf');


	$pdf->Output();
?>
