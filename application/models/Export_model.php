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

        // Crear un objeto Writer para guardar la hoja de cálculo
        $writer = new Xlsx($spreadsheet);

        // Guardar la hoja de cálculo en un archivo
        $writer->save($filename);

        return $filename;
    }
}

