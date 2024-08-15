<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;



class Trabajointegracioncurricular_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurriculars(){
		 $trabajointegracioncurricular= $this->db->get('trabajointegracioncurricular');
		 return $trabajointegracioncurricular;
	}



	function lista_trabajointegracioncurricularsxdestino($iddestinotrabajointegracioncurricular){
		
		if($iddestinotrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('iddestinotrabajointegracioncurricular='.$iddestinotrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}





	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsxtipo($idtipotrabajointegracioncurricular,$idpersona){

		
		if($idpersona>0){
			$this->db->where('idpersona='.$idpersona);
		}
			

		if($idtipotrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("autor")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idtipodocu='.$idtipotrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("autor")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}



	//Retorna todos los registros como un objeto
	function trabajointegracioncurricularsxtipo($idestadotrabajointegracioncurricular){
		
		if($idestadotrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("ellector")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idestadotrabajointegracioncurricular='.$idestadotrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("ellector")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}







	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsA($idtrabajointegracioncurricular){
		
		if($idtrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idtrabajointegracioncurricular='.$idtrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}



	//Retorna todos los registros como un objeto
	function trabajointegracioncurricularsA($iddocente){
		
		if($iddocente==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular2');
		}else{

		$this->db->where('iddocente='.$iddocente);
		$trabajointegracioncurricular=$this->db->order_by("iddocente")->get('trabajointegracioncurricular2');
		}
		 return $trabajointegracioncurricular;
	}




	function trabajointegracioncurricularsB($idegresado){
		
		if($idegresado==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular2');
		}else{

		$this->db->where('idegresado='.$idegresado);
		$trabajointegracioncurricular=$this->db->order_by("idegresado")->get('trabajointegracioncurricular2');
		}
		 return $trabajointegracioncurricular;
	}








	function lista_facturas($idtipotrabajointegracioncurricular){
		
		if($idtipotrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idtipodocu='.$idtipotrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}








	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsC($idpersona){
		
		if($idpersona==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idpersona='.$idpersona);
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}



	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsreci($idpersona){
		
		if($idpersona==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricularreci');
		}else{

		$this->db->where('idpersona='.$idpersona);
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricularreci');
		}
		 return $trabajointegracioncurricular;
	}






	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsD($idpersona,$idportafolio){
		if($idportafolio==0){
		$this->db->where('idpersona',$idpersona);
		}else{
		$this->db->where('idportafolio',$idportafolio);
		}
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricularportafolio1');
		 return $trabajointegracioncurricular;
	}






	function delete($id)
	{
			$this->db->trans_start();
			$this->db->where("idtrabajointegracioncurricular",$id);
		    	$query=$this->db->get('participante');
			if($query->num_rows()>0)
			{
				$arr=array('idtrabajointegracioncurricular'=>null);
				$this->db->where("idtrabajointegracioncurricular",$id);
				$this->db->update("participante",$arr);	
			}	

			$this->db->where("idtrabajointegracioncurricular",$id);
		    	$query=$this->db->get('egresado');
			if($query->num_rows()>0)
			{
				$this->db->where("idtrabajointegracioncurricular",$id);
				$this->db->delete("egresado");	
			}	

			$this->db->where('idtrabajointegracioncurricular',$id);
			$this->db->update('trabajointegracioncurricular',array('eliminado'=>1));
			if($this->db->affected_rows()==1)
			{
				$this->db->trans_complete();
				$result=true;
			}else{
				$result=false;
			}

	}

	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsB($idtipodocu){
		if($idtipodocu>0)
		{
		$this->db->where('idtipodocu='.$idtipodocu);
		}
		$trabajointegracioncurricular= $this->db->get('trabajointegracioncurricular1');
		 return $trabajointegracioncurricular;
	}


  	//Retorna solamente un registro de el id pasado como parame
 	function trabajointegracioncurricular($id){
 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $id.'" order by idtrabajointegracioncurricular');
 		return $trabajointegracioncurricular;
 	}

 	function trabajointegracioncurricularA($id){
 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular1 where idtrabajointegracioncurricular="'. $id.'" order by idtrabajointegracioncurricular');
 		return $trabajointegracioncurricular;
 	}


	function lista_trabajointegracioncurricular3($idtrabajointegracioncurricular){
		if($idtrabajointegracioncurricular>0){
		  $this->db->where('idtrabajointegracioncurricular',$idtrabajointegracioncurricular);
		}


		 $trabajointegracioncurricular= $this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular3');
		 return $trabajointegracioncurricular;
	}







 	function parametros_trabajointegracioncurricular($idtrabajointegracioncurricular){
 		$evento = $this->db->query('select * from eventoP where idtrabajointegracioncurricular2="'. $idtrabajointegracioncurricular.'" order by elparticipante');

		if($evento->num_rows()>0)
		{

 		return $evento->first_row('array');
		}else{

 		return array();
		}
 	}








  // Para guardar un registro nuevo
	function save($array)
 	{
		$this->db->insert("trabajointegracioncurricular", $array);
		if( $this->db->affected_rows()>0) {
			$idtrabajointegracioncurricular=$this->db->insert_id();
			//Graba nombre de trabajointegracioncurricular
				return true;
		}else{
			return false;
		}
 	}

	// Para actualiza un registro
 	function update($id,$array_item)
 	{
 		$this->db->where('idtrabajointegracioncurricular',$id);
 		$this->db->update('trabajointegracioncurricular',$array_item);
	}
 
  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$trabajointegracioncurricular = $this->db->select("idtrabajointegracioncurricular")->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular')->result_array();
		$arr=array("idtrabajointegracioncurricular"=>$id);
		$clave=array_search($arr,$trabajointegracioncurricular);
	  	 if(array_key_exists($clave+1,$trabajointegracioncurricular))
		 {

 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $trabajointegracioncurricular[$clave+1]["idtrabajointegracioncurricular"].'"');
		 }else{

 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $id.'"');
		 }
		 	
 		return $trabajointegracioncurricular;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$trabajointegracioncurricular = $this->db->select("idtrabajointegracioncurricular")->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular')->result_array();
		$arr=array("idtrabajointegracioncurricular"=>$id);
		$clave=array_search($arr,$trabajointegracioncurricular);
	   if(array_key_exists($clave-1,$trabajointegracioncurricular))
		 {

 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $trabajointegracioncurricular[$clave-1]["idtrabajointegracioncurricular"].'"');
		 }else{

 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $id.'"');
		 }
		 	
 		return $trabajointegracioncurricular;
 	}




	// Para moverse presentar  los egresados 
	function egresados( $iddocu)
	{
		$this->db->where('idtrabajointegracioncurricular="'.$iddocu.'"');
		$egresados=$this->db->get('egresado1');
		return $egresados;
	}


  // Para presentar los lectores
	function lectores( $iddocu)
	{
		$lectores=$this->db->query('select idpersona,ellector from lector1 where idtrabajointegracioncurricular="'. $iddocu.'"');
		return $lectores;
	}



    public function exportToExcel($data, $filename) {
        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Obtener la hoja activa
        $sheet = $spreadsheet->getActiveSheet();

        // Escribir los datos en la hoja de cálculo
        $sheet->fromArray($data, null, 'A1');

// Aplicar estilo a la primera fila
$styleArray = [
    'font' => [
        'bold' => true,
        'color' => ['argb' => Color::COLOR_WHITE],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'argb' => '00000000', // Color de fondo negro
        ],
    ],
];


// Aplicar el estilo a la primera fila
$sheet->getStyle('A1:F1')->applyFromArray($styleArray);


// Cambiar el ancho de las celdas
    $sheet->getColumnDimension('A')->setWidth(5); // Ancho de la columna A
     $sheet->getStyle('A')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('B')->setWidth(40); // Ancho de la columna B
     $sheet->getStyle('B')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('C')->setWidth(40); // Ancho de la columna B
     $sheet->getStyle('C')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('D')->setWidth(60); // Ancho de la columna C
     $sheet->getStyle('D')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('E')->setWidth(40); // Ancho de la columna C
     $sheet->getStyle('E')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
    $sheet->getColumnDimension('F')->setWidth(10); // Ancho de la columna C
     $sheet->getStyle('F')->getAlignment()->setWrapText(true); // Ajuste de texto en la columna A
 


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
    }







 
}
