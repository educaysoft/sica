<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export_model extends CI_Model {

    public function exportToExcel($data, $filename) {
        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Obtener la hoja activa
        $sheet = $spreadsheet->getActiveSheet();

        // Escribir los datos en la hoja de cálculo
        $sheet->fromArray($data, null, 'A1');

// Cambiar el ancho de las celdas
    $sheet->getColumnDimension('A')->setWidth(13); // Ancho de la columna A
     $sheet->getStyle('A')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('B')->setWidth(40); // Ancho de la columna B
     $sheet->getStyle('B')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('C')->setWidth(20); // Ancho de la columna B
     $sheet->getStyle('C')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('D')->setWidth(40); // Ancho de la columna C
     $sheet->getStyle('D')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('E')->setWidth(40); // Ancho de la columna C
     $sheet->getStyle('E')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('F')->setWidth(40); // Ancho de la columna C
     $sheet->getStyle('F')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('G')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('G')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('H')->setWidth(40); // Ancho de la columna C
     $sheet->getStyle('H')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('I')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('I')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('J')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('J')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('K')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('K')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('L')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('L')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('M')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('M')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('N')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('N')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('O')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('O')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('P')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('P')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('Q')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('Q')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('R')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('R')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('S')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('S')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A



// Fusionar celdas vacías debajo de una celda no vacía en la columna A
$highestRow = $sheet->getHighestRow();
$currentMergeStart = null;

for ($row = 1; $row <= $highestRow; $row++) {
    $cellValue = $sheet->getCell('A' . $row)->getValue();

    if (!empty($cellValue)) {
        // Si encontramos una celda no vacía y hay un rango de celdas vacías para fusionar
        if ($currentMergeStart !== null && $currentMergeStart < $row - 1) {
            $sheet->mergeCells('A' . $currentMergeStart . ':A' . ($row - 1));
            $sheet->mergeCells('B' . $currentMergeStart . ':B' . ($row - 1));
            $sheet->mergeCells('C' . $currentMergeStart . ':C' . ($row - 1));
            $sheet->mergeCells('D' . $currentMergeStart . ':D' . ($row - 1));
            $sheet->mergeCells('E' . $currentMergeStart . ':E' . ($row - 1));
            $sheet->mergeCells('F' . $currentMergeStart . ':F' . ($row - 1));
        
            $sheet->mergeCells('M' . $currentMergeStart . ':M' . ($row - 1));
            $sheet->mergeCells('N' . $currentMergeStart . ':N' . ($row - 1));
            $sheet->mergeCells('O' . $currentMergeStart . ':O' . ($row - 1));
            $sheet->mergeCells('P' . $currentMergeStart . ':P' . ($row - 1));
            $sheet->mergeCells('Q' . $currentMergeStart . ':Q' . ($row - 1));
            $sheet->mergeCells('R' . $currentMergeStart . ':R' . ($row - 1));
 


        }
        // Reiniciar el inicio del rango de celdas vacías
        $currentMergeStart = null;
    } else {
        // Si encontramos una celda vacía y no se ha iniciado un rango de celdas vacías
        if ($currentMergeStart === null) {
            $currentMergeStart = $row-1;
        }
    }
}

// Verificar si hay un rango de celdas vacías al final del documento
if ($currentMergeStart !== null && $currentMergeStart < $highestRow) {
    $sheet->mergeCells('A' . $currentMergeStart . ':A' . $highestRow);
         $sheet->mergeCells('B' . $currentMergeStart . ':B' . $highestRow );
            $sheet->mergeCells('C' . $currentMergeStart . ':C' . $highestRow );
            $sheet->mergeCells('D' . $currentMergeStart . ':D' . $highestRow );
            $sheet->mergeCells('E' . $currentMergeStart . ':E' . $highestRow );
            $sheet->mergeCells('F' . $currentMergeStart . ':F' . $highestRow );
        
            $sheet->mergeCells('M' . $currentMergeStart . ':M' . $highestRow );
            $sheet->mergeCells('N' . $currentMergeStart . ':N' . $highestRow );
            $sheet->mergeCells('O' . $currentMergeStart . ':O' . $highestRow );
            $sheet->mergeCells('P' . $currentMergeStart . ':P' . $highestRow );
            $sheet->mergeCells('Q' . $currentMergeStart . ':Q' . $highestRow );
            $sheet->mergeCells('R' . $currentMergeStart . ':R' . $highestRow );

}







    // Enviar el archivo al navegador para descarga
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Fecha en el pasado
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // Siempre modificado
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0


        // Crear un objeto Writer para guardar la hoja de cálculo
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        // Enviar el archivo al navegador para su descarga
        $writer->save('php://output');

        // Salir para asegurarse de que no se envíe nada más
        exit;


        // Crear un objeto Writer para guardar la hoja de cálculo
    //    $writer = new Xlsx($spreadsheet);

        // Guardar la hoja de cálculo en un archivo
     //   $writer->save($filename);

      //  return $filename;
    }
}

