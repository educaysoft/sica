<?php
print_r($evento);
//$v='"'.$_SERVER["DOCUMENT_ROOT"].'/sica/FPDI/vendor/autoload.php'.'"';
require 'fpdf/fpdf.php';
//require_once($v);
class PDF extends FPDF
{
	function Header()
	{
		$i=base_url().'images/logo.jpg';
		$this->Image($i,5,5,20);
		$this->SetFont('Arial','B',10);
		$this->Cell(30);
		$this->Cell(120,5,utf8_decode('UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS'),0,1,'C');
		$this->Cell(30);
		$this->Cell(120,5,utf8_decode('FACULTAD DE INGENIERIAS (FACI)'),0,1,'C');
		$this->Cell(30);
		$this->Cell(120,5,utf8_decode('CARRERA EN TECNOLOGÍA DE LA INFORMACIÓN'),0,1,'C');
		$this->Cell(30);
		$this->Cell(120,5,utf8_decode('INFORME DE CÁTEDRA INTEGRADORA'),0,1,'C');
		$this->Ln(8);
		$this->Cell(40,5,utf8_decode('CÁTEDRA:'),0,0,'L');
		$this->Cell(40,5,utf8_decode($evento->titulo),0,1,'L');
		$this->Cell(40,5,utf8_decode('PARALELO:'),0,0,'L');
		$this->Cell(40,5,utf8_decode('B'),0,1,'L');
		$this->Cell(40,5,utf8_decode('DOCENTE:'),0,0,'L');
		$this->Cell(40,5,utf8_decode('Ing. Stalin Francis Q. M.Sc.'),0,1,'L');
		$this->Ln(5);
	}
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}
	}
?>
