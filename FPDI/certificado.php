<?php
use setasign\Fpdi\Fpdi;
// or for usage with TCPDF:
// use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function
require_once('vendor/autoload.php');
$participante=$_POST["participante"]; 
$detalle=$_POST["asunto"]; 
$modelo=$_POST["modelo"];  //Modelo de certificado 
$archivo=$_POST["archivo"];  //Nombre del archivo generado 
$codigo=substr($archivo,0,strlen($archivo)-4);
$ruta=$_POST["ruta"];
$posi_nomb_x=$_POST["posi_nomb_x"];
$posi_nomb_y=$_POST["posi_nomb_y"];

$ancho_x=$_POST["ancho_x"];


$posi_codigo_x=$_POST["posi_codigo_x"];
$posi_codigo_y=$_POST["posi_codigo_y"];

$posi_fecha_x=$_POST["posi_fecha_x"];
$posi_fecha_y=$_POST["posi_fecha_y"];




$firma1_x=$_POST["firma1_x"];
$firma1_y=$_POST["firma1_y"];

$firma2_x=$_POST["firma2_x"];
$firma2_y=$_POST["firma2_y"];


$firma3_x=$_POST["firma3_x"];
$firma3_y=$_POST["firma3_y"];






$fecha=date('F d Y',strtotime($_POST["fecha"]));

//$posif=296.67;
$posif= $_POST["ancho_x"];
// initiate FPDI
$pdf = new Fpdi();


// add a page
//$pdf->AddPage();
// set the source file
//$pdf->setSourceFile("certificado2.pdf");

$participante=str_replace("'","",$participante);
$ruta=str_replace("'","",$ruta);
$modelo=str_replace("'","",$modelo);

$x="..".$ruta.$modelo;
echo $x;
$pageCount=$pdf->setSourceFile($x);
// import page 1
echo $pageCount;
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
	$tplId = $pdf->importPage($pageNo);
	//$pdf->useTemplate($tplId, 20, 10, 200);

	$pdf->AddPage('L',[296.67,210.56]);
	//El tamaño se acopa al tamaño del template
	//$pdf->AddPage('L', array($size['w'], $size['h']));
	// use the imported page and place it at point 10,10 with a width of 100 mm

	//$pdf->useTemplate($tplId,null,null,$size['w'],$size['h'],FALSE);
	//$size['w']=296.67 y $size['h']=210.56
	//$pdf->useTemplate($tplId,null,null,210.56,296.67,FALSE);
	$pdf->useTemplate($tplId);

	$mid_x=148;

	//write the code of de certificaod
	$pdf->SetFont('Helvetica','B',15);

	if($posi_codigo_x==0)
	{
		$pdf->SetTextColor(0, 0,0);
	}else{
		$pdf->SetTextColor(255,255,255);
	}



	$pdf->SetXY($posi_codigo_x,$posi_codigo_y);
	if($posi_codigo_x==0)
	{
		$espacio_impresion=$posif;  
	}else{
		$espacio_impresion=$pdf->GetStringWidth($codigo);
	}
	$realposix=$posi_codigo_x+($espacio_impresion/2-($pdf->GetStringWidth($codigo)/2));
	$pdf->Text($realposix,$posi_codigo_y,$codigo);

	// now write some text above the imported page
	$pdf->SetFont('Helvetica','B',20);
	$pdf->SetTextColor(0, 0,255);
	$pdf->SetXY($pos_nomb_x,$posi_nomb_y);
	$espacio_impresion=$posif;  //-$posix;
	$realposix=$posi_nomb_x+($espacio_impresion/2-($pdf->GetStringWidth($participante)/2));
	$pdf->Text($realposix,$posi_nomb_y,utf8_decode($participante));

	//write the date of de certificaod
	$pdf->SetFont('Helvetica','B',15);
	if($posi_codigo_x==0)
	{
		$pdf->SetTextColor(0, 0,0);
	}else{
		$pdf->SetTextColor(255,255,255);
	}
		$pdf->SetTextColor(0, 0,0);


	if(intval($firma1_x)>0 && intval($firma1_y)>0)
	{
		$i="https://educaysoft.org/sica/".'firmas/francisstalin.jpg';
		$pdf->Image("francisstalin.jpg",$firmar1_x,$firmar1_y,20);
	}





	if(intval($firma2_x)>0 && intval($firma2_y)>0)
	{
		$i="https://educaysoft.org/sica/".'firmas/francisstalin.jpg';
		$pdf->Image("francisstalin.jpg",$firma2_x,$firma2_y,20);
	}




	if(intval($firma3_x)>0 && intval($firma3_y)>0)
	{
		$i="https://educaysoft.org/sica/".'firmas/francisstalin.jpg';
		$pdf->Image("francisstalin.jpg",$firmar3_x,$firmar3_y,20);
	}





	if(intval($posi_fecha_y)>0)
	{
		$pdf->SetXY($posi_fecha_x,$posi_fecha_y);
		if(intval($posi_fecha_x)==0)
		{
		$espacio_impresion=$posif;  
		}else{
		$espacio_impresion=$pdf->GetStringWidth($fecha);
		}

		$realposix=$posi_fecha_x+($espacio_impresion/2-($pdf->GetStringWidth($fecha)/2));
		$pdf->Text($realposix,$posi_fecha_y,$espacio_impresion);
	}

}
//$pdf->Output('I', 'generated.pdf');
$archivo=str_replace("'","",$archivo);
$y="..".$ruta.$archivo;
echo $y;
$pdf->Output('F',$y);

