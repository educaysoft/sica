<?php
//$v='"'.$_SERVER["DOCUMENT_ROOT"].'/sica/FPDI/vendor/autoload.php'.'"';
require 'fpdf/fpdf.php';
//require_once($v);
class PDF extends FPDF
{
	function Header()
	{
		$i=base_url().'images/logo.jpg';
		$this->Image($i,5,5,20);
		$this->SetFont('Arial','B',11);
		$this->Cell(30);
		$this->Cell(120,8,utf8_decode('UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS'),0,1,'C');
		$this->Cell(120,8,utf8_decode('FACULTAD DE INGENIERIAS (FACI)'),0,2,'C');
		$this->Ln(18);
	}
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}
	}
?>
