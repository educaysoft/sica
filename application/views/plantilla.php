<?php
//$v='"'.$_SERVER["DOCUMENT_ROOT"].'/sica/FPDI/vendor/autoload.php'.'"';
require 'fpdf/fpdf.php';
//require_once($v);
class PDF extends FPDF
{
	function Header()
	{
		$i=base_url().'images/logo.jpg';
		$this->Image($i,5,5,30);
		$this->SetFont('Arial','B',15);
		$this->Cell(30);
		$this->Cell(120,10,'UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS',0,0,'C');
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
