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
$ruta=$_POST["ruta"];
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


	// now write some text above the imported page
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(0, 0,255);
$pdf->SetXY(24, 86);
$pdf->Text($mid_x-($pdf->GetStringWidth($participante)/2),90,$participante);
//$pdf->Write(0, $participante);
$pdf->SetXY(35, 105);
$pdf->Write(0, $detalle);
}
//$pdf->Output('I', 'generated.pdf');
$archivo=str_replace("'","",$archivo);
$y="..".$ruta.$archivo;
echo $y;
$pdf->Output('F',$y);

