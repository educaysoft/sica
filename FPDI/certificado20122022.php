<?php
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Origin: https://educaysoft.org");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: OPTIONS,POST,GET");
header('Set-Cookie: '.session_name().'='.session_id().'; SameSite=None; Secure');
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
$size_nombre=$_POST["size_nombre"];


$ancho_x=$_POST["ancho_x"];
$alto_y=$_POST["alto_y"];


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



$texto1=$_POST["texto1"];
$posi_texto1_x=$_POST["posi_texto1_x"];
$posi_texto1_y=$_POST["posi_texto1_y"];
$ancho_texto1=$_POST["ancho_texto1"];
$alto_texto1=$_POST["alto_texto1"];
$font_size_texto1=$_POST["font_size_texto1"];






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
	
	if ($ancho_x>$alto_y)
	{
	$pdf->AddPage('L',[296.67,210.56]);
	}else{
	$pdf->AddPage('P',[$ancho_x,$alto_y]);
	}

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
	if($posi_codigo_x==0 )
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

	if($posi_nombre<20){  //cuando no es un certificado
		$pdf->SetTextColor(0, 0,0);
		$realposix=$posi_codigo_x;
	}
	$pdf->Text($realposix,$posi_codigo_y,$codigo);

	// now write some text above the imported page
//	$pdf->SetFont('Helvetica','B',20);
//	$pdf->SetTextColor(0, 0,255);


	//$pdf->SetFont('Arial','B',20);
	$pdf->SetFont('Arial','B',$size_nombre);
	$pdf->SetTextColor(0, 0,0);

	$pdf->SetXY($pos_nomb_x,$posi_nomb_y);
	$espacio_impresion=$posif;  //-$posix;
	$realposix=$posi_nomb_x+($espacio_impresion/2-($pdf->GetStringWidth($participante)/2));
	if($posi_nombre<20){
		$realposix=$posi_nomb_x;
	}

	$pdf->Text($realposix,$posi_nomb_y,utf8_decode(mb_strtoupper($participante,'utf-8')));

	//write the date of de certificaod
//	$pdf->SetFont('Helvetica','B',15);
	$pdf->SetFont('Arial','B',15);
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
		$pdf->Image("firmadecano.jpg",$firma1_x,$firma1_y,40);
	}





	if(intval($firma2_x)>0 && intval($firma2_y)>0)
	{
		$i="https://educaysoft.org/sica/".'firmas/francisstalin.jpg';
		$pdf->Image("firmainstructor.jpg",$firma2_x,$firma2_y,40);
	}




	if(intval($firma3_x)>0 && intval($firma3_y)>0)
	{
		$i="https://educaysoft.org/sica/".'firmas/francisstalin.jpg';
		$pdf->Image("firmadirector.jpg",$firma3_x,$firma3_y,40);
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
		if($posi_nombre<20){  //cuando no es un certificado
			$pdf->SetTextColor(0, 0,0);
			$realposix=$posi_fecha_x;
		}


    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');

    $dia = $dias[date('w', strtotime($fecha))];


    $num = date("j", strtotime($fecha));

    $anno = date("Y", strtotime($fecha));

    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

    $mes = $mes[(date('m', strtotime($fecha))*1)-1];

    $fechaimp= $dia.', '.$num.' de '.$mes.' del '.$anno;


		$pdf->Text($realposix,$posi_fecha_y,$fechaimp);
	}

	
	if(intval($posi_texto1_y)>0)
	{
		$pdf->SetFont('Arial','',$font_size_texto1);
		$pdf->SetXY($posi_texto1_x,$posi_texto1_y);
		$pdf->MultiCell($ancho_texto1,$alto_texto1,utf8_decode($texto1));



	}




}
//$pdf->Output('I', 'generated.pdf');
$archivo=str_replace("'","",$archivo);
$y="..".$ruta.$archivo;
echo $y;
$pdf->Output('F',$y);

