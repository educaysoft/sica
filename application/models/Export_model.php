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
    $sheet->getColumnDimension('A')->setWidth(10); // Ancho de la columna A
    $sheet->getColumnDimension('B')->setWidth(40); // Ancho de la columna B
    $sheet->getColumnDimension('D')->setWidth(40); // Ancho de la columna C
    $sheet->getColumnDimension('E')->setWidth(10); // Ancho de la columna C
    $sheet->getColumnDimension('F')->setWidth(40); // Ancho de la columna C
    $sheet->getColumnDimension('G')->setWidth(10); // Ancho de la columna C
    $sheet->getColumnDimension('H')->setWidth(10); // Ancho de la columna C


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
        $writer = new Xlsx($spreadsheet);

        // Guardar la hoja de cálculo en un archivo
        $writer->save($filename);

        return $filename;
    }
}

