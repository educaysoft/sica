<?php
use setasign\Fpdi\Fpdi;
$v='"'.$_SERVER["DOCUMENTO_ROOT"].'/FPDI/vendor/autoload.php'.'"';
echo $v;
require_once($v);
class PDF extends FPDF
{
	function Header()
	{
		$i=base_url().'images/logo.png';
		$this->Image($i,5,5,30);
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
