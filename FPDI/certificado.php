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
$codigo=substr($archivo,0,strlen($archivo)-4));
$ruta=$_POST["ruta"];
$posix=$_POST["posix"];
$posiy=$_POST["posiy"];
$fecha=date('F d Y',strtotime($_POST["fecha"]));

$posif=296.67;
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
$pdf->SetTextColor(0, 0,0);
$pdf->SetXY($posix,$posiy-50);
$espacio_impresion=$posif;  //-$posix;
$realposix=$posix+($espacio_impresion/2-($pdf->GetStringWidth($codigo)/2));
$pdf->Text($realposix,$posiy-50,$codigo);

// now write some text above the imported page
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(0, 0,255);
$pdf->SetXY($posix,$posiy);
$espacio_impresion=$posif;  //-$posix;
$realposix=$posix+($espacio_impresion/2-($pdf->GetStringWidth($participante)/2));
$pdf->Text($realposix,$posiy,$participante);

//write the date of de certificaod
$pdf->SetFont('Helvetica','B',15);
$pdf->SetTextColor(0, 0,0);
$pdf->SetXY($posix,$posiy+50);
$espacio_impresion=$posif;  //-$posix;
$realposix=$posix+($espacio_impresion/2-($pdf->GetStringWidth($fecha)/2));
$pdf->Text($realposix,$posiy+50,$fecha);


}
//$pdf->Output('I', 'generated.pdf');
$archivo=str_replace("'","",$archivo);
$y="..".$ruta.$archivo;
echo $y;
$pdf->Output('F',$y);

