<?php

class Examencomplexivo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('examencomplexivo_model');
      $this->load->model('tipodocu_model');
      $this->load->model('ordenador_model');
      $this->load->model('directorio_model');
      $this->load->model('persona_model');
      $this->load->model('egresado_model');
      $this->load->model('tutorexamencomplexivo_model');
	}

	public function index(){
 		if(isset($this->session->userdata['logged_in'])){
		   $data['examencomplexivo'] = $this->examencomplexivo_model->elultimo();
			$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
           if(isset($data['examencomplexivo']['idexamencomplexivo']))
           {
			$data['egresados'] =$this->examencomplexivo_model->egresados($data['examencomplexivo']['idexamencomplexivo'])->result();
			$data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes($data['examencomplexivo']['idexamencomplexivo'])->result();
           }else{

			$data['egresados'] =$this->examencomplexivo_model->egresados(0)->result();
			$data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes(0)->result();


           }
			$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
			$data['directorios'] = $this->directorio_model->lista_directorios()->result();

			$data['title']="Usted esta visualizando el examencomplexivo No: ";
			$this->load->view('template/page_header');		
			$this->load->view('examencomplexivo_record',$data);
			$this->load->view('template/page_footer');
   		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
   		}
	}



//==============================================
// Llamar al formulario para un nuevo examencomplexivo.
// ==============================================

	public function add()
	{
		$data['title']="Usted esta Creando un nuevo Examencomplexivo";
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
		$data['personas']= $this->persona_model->lista_personasA()->result();
	 	$this->load->view('template/page_header');		
	 	$this->load->view('examencomplexivo_form',$data);
	 	$this->load->view('template/page_footer');
	}


//==============================================
// Guardar el nuevo examencomplexivo.
// ==============================================
	public function  save()
	{


   			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];

	 	$array_item=array(
		 	
		 	'idexamencomplexivo' => $this->input->post('idexamencomplexivo'),
		 	'nombre' => $this->input->post('nombre'),
		 	'resumen' => $this->input->post('resumen'),
	        'idusuario'=>$idusuario,
			'fechacreacion'=>$fecha,
			'horacreacion'=>$hora
	 	);
	 	echo $this->examencomplexivo_model->save($array_item);
	 	//redirect('examencomplexivo');
 	}



	public function get_parametros()
	{

 	$idexamencomplexivo = $this->input->get('idexamencomplexivo');
	header("Content-type: application/json; charset=utf-8");
 	echo json_encode($this->examencomplexivo_model->parametros_examencomplexivo($idexamencomplexivo));

	}






public function genpagina()
{
	$idcarrera=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$idcarrera=$this->uri->segment(3);
	 	$data['tutorexamencomplexivoes']= $this->tutorexamencomplexivo_model->tutorexamencomplexivo2(0)->result();
		$arreglo=array();
		$i=0;
		foreach($data['tutorexamencomplexivoes'] as $row){
		$iddocente=$row->iddocente;

	//	$arreglo[$row->iddocente]=$this->examencomplexivo_model->examencomplexivosA($iddocente)->row_array();
		$xx=array($this->examencomplexivo_model->examencomplexivosA($iddocente)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->iddocente=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['examencomplexivo']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['examencomplexivo']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;


		$this->load->view('examencomplexivo_genpagina',$data);
	}
}




public function genpagina2()
{
	$idcarrera=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$idcarrera=$this->uri->segment(3);
	 	$data['egresados']= $this->egresado_model->listar_egresado2(0)->result();
		$arreglo=array();
		$i=0;
		foreach($data['egresados'] as $row){
		$idegresado=$row->idegresado;
	//	$arreglo[$row->iddocente]=$this->examencomplexivo_model->examencomplexivosA($iddocente)->row_array();
		$xx=array($this->examencomplexivo_model->examencomplexivosB($idegresado)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->idegresado=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['examencomplexivo']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['examencomplexivo']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;


		$this->load->view('examencomplexivo_genpagina2',$data);
	}
}





	function documento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idexamencomplexivo=$this->input->get('idexamencomplexivo');
			//$data0 =$this->documento_model->lista_documentosD($idpersona,$idexamencomplexivo);
			$data0 =$this->examencomplexivo_model->lista_examencomplexivo3($idexamencomplexivo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentoexamencomplexivo,$r->iddocumento,$r->eltipodocumento,$r->asunto,$r->fechaelaboracion,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno1="'.site_url('documentoexamencomplexivo/actual').'"    data-iddocumentoexamencomplexivo="'.$r->iddocumentoexamencomplexivo.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_doc"  data-retorno2="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">doc</a><a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">pdf</a> ');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}

















	public function actual(){



	 // $data['examencomplexivo_list']=$this->examencomplexivo_model->lista_examencomplexivo()->result();
	  $data['examencomplexivo'] = $this->examencomplexivo_model->examencomplexivo( $this->uri->segment(3))->row_array();
	  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  $data['egresados'] =$this->examencomplexivo_model->egresados($this->uri->segment(3))->result();
	  $data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes($data['examencomplexivo']['idexamencomplexivo'])->result();
		$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
		$data['directorios'] = $this->directorio_model->lista_directorios()->result();
		$data['title']="Usted esta visualizando el examencomplexivo No: ";
		$this->load->view('template/page_header');		
	  $this->load->view('examencomplexivo_record',$data);
		$this->load->view('template/page_footer');
	}

//////////////////////////////////
// Listar todos los examencomplexivos 
/////////////////////////////////
	public function listar()
	{
	
  		$data['examencomplexivo'] = $this->examencomplexivo_model->lista_examencomplexivos()->result();
  		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  		$data['filtro']= $this->uri->segment(3);
  		$data['title']="Examencomplexivo";
		$this->load->view('template/page_header');		
  		$this->load->view('examencomplexivo_list',$data);
		$this->load->view('template/page_footer');
	}

	function examencomplexivo_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


		$id=$this->input->get('idtipodocu');

	 	$data0 = $this->examencomplexivo_model->lista_examencomplexivosB($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idexamencomplexivo,$r->numeroestudiantes,$r->nombre,$r->resumen,$r->numerotutorexamencomplexivoes,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('examencomplexivo/actual').'"   data-idexamencomplexivo="'.$r->idexamencomplexivo.'">ver</a> ');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
	



/*
		$id=$this->input->get('idexamencomplexivo');
	 	$data0 = $this->examencomplexivo_model->lista_examencomplexivosA($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idexamencomplexivo,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-primary btn-sm item_pdf"  data-retorno="'.site_url('examencomplexivo/actual').'"   data-idexamencomplexivo="'.$r->idexamencomplexivo.'" data-archivopdf="'."/Repositorio/".$r->archivopdf.'">Ver</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idexamencomplexivo="'.$r->idexamencomplexivo.'" data-ordenador="'.$r->elordenador.'"   data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">dowload</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);

 */

		echo json_encode($output);
		exit();
	}









//////////////////////////////////
// Listar por tipo de examencomplexivo 
/////////////////////////////////
	public function listarxtipodocu()
	{
	
  		$data['examencomplexivo'] = $this->examencomplexivo_model->lista_examencomplexivos()->result();
  		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  		$data['egresados'] =$this->examencomplexivo_model->egresados(1)->result();
  		$data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes(1)->result();
  		$data['title']="Examencomplexivo";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
  		$this->load->view('examencomplexivo_listxtipodocu',$data);
		$this->load->view('template/page_footer');
	}

	function examencomplexivo_dataxtipodocu()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$id=$this->input->get('idtipodocu');

	 	$data0 = $this->examencomplexivo_model->lista_examencomplexivosB($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idexamencomplexivo,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('examencomplexivo/actual').'"    data-idexamencomplexivo="'.$r->idexamencomplexivo.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-idexamencomplexivo="'.$r->idexamencomplexivo.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">download</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}




	public function reportepdf()
	{
		
		$data['examencomplexivos'] = $this->examencomplexivo_model->examencomplexivosxtipo($this->uri->segment(3))->result();

		$data['title']="Evento";
		$this->load->view('examencomplexivo_pdf',$data);
	
	}








public function elprimero()
{

	$data['examencomplexivo'] = $this->examencomplexivo_model->elprimero();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['egresados'] =$this->examencomplexivo_model->egresados($data['examencomplexivo']['idexamencomplexivo'])->result();
    $data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes($data['examencomplexivo']['idexamencomplexivo'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	$data['title']="Usted esta visualizando el examencomplexivo No: ";
  
    $this->load->view('template/page_header');		
    $this->load->view('examencomplexivo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

	$data['examencomplexivo'] = $this->examencomplexivo_model->elultimo();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['egresados'] =$this->examencomplexivo_model->egresados($data['examencomplexivo']['idexamencomplexivo'])->result();
    $data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes($data['examencomplexivo']['idexamencomplexivo'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	$data['title']="Usted esta visualizando el examencomplexivo No: ";
  
    $this->load->view('template/page_header');		
    $this->load->view('examencomplexivo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }









public function siguiente(){
 // $data['examencomplexivo_list']=$this->examencomplexivo_model->lista_examencomplexivo()->result();
	$data['examencomplexivo'] = $this->examencomplexivo_model->siguiente($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['egresados'] =$this->examencomplexivo_model->egresados($data['examencomplexivo']['idexamencomplexivo'])->result();
  $data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes($data['examencomplexivo']['idexamencomplexivo'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	$data['title']="Usted esta visualizando el examencomplexivo No: ";
	$this->load->view('template/page_header');		
  $this->load->view('examencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['examencomplexivo_list']=$this->examencomplexivo_model->lista_examencomplexivo()->result();
	$data['examencomplexivo'] = $this->examencomplexivo_model->anterior($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['egresados'] =$this->examencomplexivo_model->egresados($data['examencomplexivo']['idexamencomplexivo'])->result();
  $data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes($data['examencomplexivo']['idexamencomplexivo'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	$data['title']="Usted esta visualizando el examencomplexivo No: ";
	$this->load->view('template/page_header');		
  $this->load->view('examencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}



	public function edit()
	{
    		$data['examencomplexivo'] = $this->examencomplexivo_model->examencomplexivo($this->uri->segment(3))->row_array();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    		$data['egresados'] =$this->examencomplexivo_model->egresados($this->uri->segment(3))->result();
    		$data['tutorexamencomplexivoes'] = $this->examencomplexivo_model->tutorexamencomplexivoes($this->uri->segment(3))->result();
    		$data['title'] = "Actualizar el  Examencomplexivo No: ";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('examencomplexivo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idexamencomplexivo');
	 	$array_item=array(
		 	
		'idexamencomplexivo' => $this->input->post('idexamencomplexivo'),
	 	);


		if(null!==$this->input->post('nombre'))
		{
			$array_item['nombre'] = $this->input->post('nombre');
		}


		if(null!==$this->input->post('resumen'))
		{
			$array_item['resumen'] = $this->input->post('resumen');
		}


	 	$this->examencomplexivo_model->update($id,$array_item);

	 	redirect('examencomplexivo/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->examencomplexivo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('examencomplexivo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function canvas(){
	$this->load->view('template/page_header');
	$this->load->view('canvas');
	$this->load->view('template/page_footer');
}

function show_pdf() {
	 	$data['examencomplexivo'] = $this->examencomplexivo_model->examencomplexivoA($this->uri->segment(3))->row_array();
 $this->load->view('template/page_header');
 $data['blog_text'] = "POSTULACION"; 
 $this->load->view('cargapdf',$data);
 $this->load->view('template/page_footer'); 
 }



function loadpdf2()
{
 /* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];

/* Choose where to save the uploaded file */
$location = "uploads/".$filename;

/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
}

}




 function loadpdf() {

//$filename = $_FILES['fileToUpload']['name'];
$filename = $_POST('archivopdf');

echo $filename;
die();
//La direccion debe ser la completa
$target_dir =  $_SERVER["DOCUMENT_ROOT"]."/Repositorio/".$filename;
//$target_dir =  base_url()."pdfs/".$filename;
//$target_dir =  $_SERVER["DOCUMENT_ROOT"]."/facae/".trim($this->session->userdata['logged_in']['pdf']);  //"uploads/";
$target_file =$target_dir; // $target_dir . basename($_FILES["fileToUpload"]["name"]);
  echo $target_file.' - ';


//die();
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  echo "-".$imageFileType;
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["filepdf"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "pdf" && $imageFileType != "pdf"
&& $imageFileType != "pdf" ) {
  echo $imageFileType;
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	echo "----".$_FILES["fileToUpload"]["tmp_name"];
  if (move_uploaded_file($_FILES["filepdf"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["filepdf"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}



function loadpdf3()
{

	// Count total files
	$countfiles = count($_FILES['files']['name']);

	$upload_location =  $_SERVER["DOCUMENT_ROOT"]."/Repositorio/";
//	$upload_location =  base_url()."pdfs/";

	// Upload directory
	//$upload_location = "uploads/";

$count = 0;
for($i=0;$i < $countfiles;$i++){

   // File name
   $filename = $_FILES['files']['name'][$i];
   $filename = $_POST["archivopdf"];
   // File path
   $path = $upload_location.$filename;

   // file extension
   $file_extension = pathinfo($path, PATHINFO_EXTENSION);
   $file_extension = strtolower($file_extension);

   // Valid file extensions
   $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");

   // Check extension
   if(in_array($file_extension,$valid_ext)){

      // Upload file
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$path)){
        $count += 1;
      } 
   }

}

echo $count;
exit;


}



public function get_directorio() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idordenador')) {
        $this->db->select('*');
        $this->db->where(array('idordenador' => $this->input->post('idordenador')));
        $query = $this->db->get('directorio');
	$data=$query->result();
	echo json_encode($data);
	}

}




public function get_examencomplexivo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idexamencomplexivo')) {
        $this->db->select('*');
        $this->db->where(array('idexamencomplexivo' => $this->input->post('idexamencomplexivo')));
        $query = $this->db->get('examencomplexivo');
	$data=$query->result();
	echo json_encode($data);
	}
}


public function get_examencomplexivoA() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idexamencomplexivo')) {
        $this->db->select('*');
        $this->db->where(array('idexamencomplexivo' => $this->input->post('idexamencomplexivo')));
        $query = $this->db->get('examencomplexivo1');
	$data=$query->result();
	echo json_encode($data);
	}
}



	public function paginaweb()
	{
	  $this->load->view('web/examencomplexivo');
	}

	public function paginaweb2()
	{
	  $this->load->view('web/examencomplexivo2');
	}








}
