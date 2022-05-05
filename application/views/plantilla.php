<?php
use setasign\Fpdi\Fpdi;

require_once('../../FPDI/vendor/autoload.php');
class PDF extends FPDF
{
	function Header()
	{
		$this->Image('../../images/logo.png',5,5,30);
		$this->SetFont('Arial','B',15);
		$this->Cell(30);
		$this->Cell(120,10,'Reporte de Participación',0,0,'C');
		$this->Ln(20);
	}
	function Foother()
	{
		$this->SetY(-15);
		$this->SetFont('Ariel','I',8);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}
	}
?>
