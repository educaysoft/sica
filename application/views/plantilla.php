<?php
print_r($evento);
//$v='"'.$_SERVER["DOCUMENT_ROOT"].'/sica/FPDI/vendor/autoload.php'.'"';
require 'fpdf/fpdf.php';
//require_once($v);
class PDF extends FPDF
{
	public $institucion = "";
	public $unidad  = "";
	public $departamento ="";
	public $titulo="";


	function Header()
	{

		$i=base_url().'images/logo.jpg';
		$this->Image($i,5,5,20);
		$this->SetFont('Arial','B',10);
		$this->Cell(30);
		$this->Cell(120,5,utf8_decode($this->institucion),0,1,'C');
		$this->Cell(30);
		$this->Cell(120,5,utf8_decode($this->unidad),0,1,'C');
		$this->Cell(30);
		$this->Cell(120,5,utf8_decode($this->departamento),0,1,'C');
		$this->Cell(30);
		$this->Cell(120,5,utf8_decode($this->titulo),0,1,'C');
		$this->Ln(8);
//		$this->Cell(40,5,utf8_decode('CÁTEDRA:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode($evento->titulo),0,1,'L');
//		$this->Cell(40,5,utf8_decode('PARALELO:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode('B'),0,1,'L');
//		$this->Cell(40,5,utf8_decode('DOCENTE:'),0,0,'L');
//		$this->Cell(40,5,utf8_decode('Ing. Stalin Francis Q. M.Sc.'),0,1,'L');
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
