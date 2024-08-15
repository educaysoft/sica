<?php

class Trabajointegracioncurricular extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('trabajointegracioncurricular_model');
      $this->load->model('tipodocu_model');
      $this->load->model('ordenador_model');
      $this->load->model('directorio_model');
      $this->load->model('persona_model');
      $this->load->model('egresado_model');
      $this->load->model('lector_model');
      $this->load->model('estadotrabajointegracioncurricular_model');
	}

	public function index(){
 		if(isset($this->session->userdata['logged_in'])){
			$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->elultimo();
			$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
			$data['egresados'] =$this->trabajointegracioncurricular_model->egresados($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
			$data['lectores'] = $this->trabajointegracioncurricular_model->lectores($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
			$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
			$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	        $data['estadotrabajointegracioncurriculars']= $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars()->result();

			$data['title']="Usted esta visualizando el trabajointegracioncurricular No: ";
			$this->load->view('template/page_header');		
			$this->load->view('trabajointegracioncurricular_record',$data);
			$this->load->view('template/page_footer');
   		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
   		}
	}



//==============================================
// Llamar al formulario para un nuevo trabajointegracioncurricular.
// ==============================================

	public function add()
	{
		$data['title']="Usted esta Creando un nuevo Trabajointegracioncurricular";
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	    $data['estadotrabajointegracioncurriculars']= $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars()->result();
		$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
		$data['personas']= $this->persona_model->lista_personasA()->result();
	 	$this->load->view('template/page_header');		
	 	$this->load->view('trabajointegracioncurricular_form',$data);
	 	$this->load->view('template/page_footer');
	}


//==============================================
// Guardar el nuevo trabajointegracioncurricular.
// ==============================================
	public function  save()
	{


   			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];

	 	$array_item=array(
		 	
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
		 	'nombre' => $this->input->post('nombre'),
		 	'resumen' => $this->input->post('resumen'),
            'idestadotrabajointegracioncurricular'=> $this->input->post('idestadotrabajointegracioncurricular'),
	        'idusuario'=>$idusuario,
			'fechacreacion'=>$fecha,
			'horacreacion'=>$hora
	 	);
	 	echo $this->trabajointegracioncurricular_model->save($array_item);
	 	//redirect('trabajointegracioncurricular');
 	}



	public function get_parametros()
	{

 	$idtrabajointegracioncurricular = $this->input->get('idtrabajointegracioncurricular');
	header("Content-type: application/json; charset=utf-8");
 	echo json_encode($this->trabajointegracioncurricular_model->parametros_trabajointegracioncurricular($idtrabajointegracioncurricular));

	}






public function genpagina()
{
	$idcarrera=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$idcarrera=$this->uri->segment(3);
	 	$data['lectores']= $this->lector_model->lector2(0)->result();
		$arreglo=array();
		$i=0;
		foreach($data['lectores'] as $row){
		$iddocente=$row->iddocente;

	//	$arreglo[$row->iddocente]=$this->trabajointegracioncurricular_model->trabajointegracioncurricularsA($iddocente)->row_array();
		$xx=array($this->trabajointegracioncurricular_model->trabajointegracioncurricularsA($iddocente)->result_array());
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
		$data['trabajointegracioncurricular']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['trabajointegracioncurricular']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;


		$this->load->view('trabajointegracioncurricular_genpagina',$data);
	}
}




public function genpagina2()
{
	$idcarrera=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$idcarrera=$this->uri->segment(3);
	 	$data['egresados']= $this->egresado_model->listar_egresado1(0)->result();
		$arreglo=array();
		$i=0;
		foreach($data['egresados'] as $row){
		$idegresado=$row->idegresado;

	//	$arreglo[$row->iddocente]=$this->trabajointegracioncurricular_model->trabajointegracioncurricularsA($iddocente)->row_array();
		$xx=array($this->trabajointegracioncurricular_model->trabajointegracioncurricularsB($idegresado)->result_array());
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
		$data['trabajointegracioncurricular']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['trabajointegracioncurricular']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;


		$this->load->view('trabajointegracioncurricular_genpagina2',$data);
	}
}





	function documento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idtrabajointegracioncurricular=$this->input->get('idtrabajointegracioncurricular');
			//$data0 =$this->documento_model->lista_documentosD($idpersona,$idtrabajointegracioncurricular);
			$data0 =$this->trabajointegracioncurricular_model->lista_trabajointegracioncurricular3($idtrabajointegracioncurricular);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentotrabajointegracioncurricular,$r->iddocumento,$r->eltipodocumento,$r->asunto,$r->fechaelaboracion,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno1="'.site_url('documentotrabajointegracioncurricular/actual').'"    data-iddocumentotrabajointegracioncurricular="'.$r->iddocumentotrabajointegracioncurricular.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_doc"  data-retorno2="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">doc</a><a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">pdf</a> ');
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



	 // $data['trabajointegracioncurricular_list']=$this->trabajointegracioncurricular_model->lista_trabajointegracioncurricular()->result();
	  $data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->trabajointegracioncurricular( $this->uri->segment(3))->row_array();
	  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  $data['egresados'] =$this->trabajointegracioncurricular_model->egresados($this->uri->segment(3))->result();
	  $data['lectores'] = $this->trabajointegracioncurricular_model->lectores($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
	        $data['estadotrabajointegracioncurriculars']= $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars()->result();
		$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
		$data['directorios'] = $this->directorio_model->lista_directorios()->result();
		$data['title']="Usted esta visualizando el trabajointegracioncurricular No: ";
		$this->load->view('template/page_header');		
	  $this->load->view('trabajointegracioncurricular_record',$data);
		$this->load->view('template/page_footer');
	}

//////////////////////////////////
// Listar todos los trabajointegracioncurriculars 
/////////////////////////////////
	public function listar()
	{
	
  		$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  		$data['filtro']= $this->uri->segment(3);
  		$data['title']="Trabajointegracioncurricular";
		$this->load->view('template/page_header');		
  		$this->load->view('trabajointegracioncurricular_list',$data);
		$this->load->view('template/page_footer');
	}

	function trabajointegracioncurricular_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


		$id=$this->input->get('idtipodocu');

	 	$data0 = $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsB($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtrabajointegracioncurricular,$r->numeroestudiantes,$r->nombre,$r->resumen,$r->numerolectores,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('trabajointegracioncurricular/actual').'"   data-idtrabajointegracioncurricular="'.$r->idtrabajointegracioncurricular.'">ver</a> ');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
	



/*
		$id=$this->input->get('idtrabajointegracioncurricular');
	 	$data0 = $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtrabajointegracioncurricular,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-primary btn-sm item_pdf"  data-retorno="'.site_url('trabajointegracioncurricular/actual').'"   data-idtrabajointegracioncurricular="'.$r->idtrabajointegracioncurricular.'" data-archivopdf="'."/Repositorio/".$r->archivopdf.'">Ver</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtrabajointegracioncurricular="'.$r->idtrabajointegracioncurricular.'" data-ordenador="'.$r->elordenador.'"   data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">dowload</a>');
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
// Listar por tipo de trabajointegracioncurricular 
/////////////////////////////////
	public function listarxtipodocu()
	{
	
  		$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  		$data['egresados'] =$this->trabajointegracioncurricular_model->egresados(1)->result();
  		$data['lectores'] = $this->trabajointegracioncurricular_model->lectores(1)->result();
  		$data['title']="Trabajointegracioncurricular";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
  		$this->load->view('trabajointegracioncurricular_listxtipodocu',$data);
		$this->load->view('template/page_footer');
	}

	function trabajointegracioncurricular_dataxtipodocu()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$id=$this->input->get('idtipodocu');

	 	$data0 = $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsB($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtrabajointegracioncurricular,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('trabajointegracioncurricular/actual').'"    data-idtrabajointegracioncurricular="'.$r->idtrabajointegracioncurricular.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-idtrabajointegracioncurricular="'.$r->idtrabajointegracioncurricular.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">download</a>');
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
		
		$data['trabajointegracioncurriculars'] = $this->trabajointegracioncurricular_model->trabajointegracioncurricularsxtipo($this->uri->segment(3))->result();

		$data['title']="Evento";
		$this->load->view('trabajointegracioncurricular_pdf',$data);
	
	}








public function elprimero()
{

	$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->elprimero();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['egresados'] =$this->trabajointegracioncurricular_model->egresados($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
    $data['lectores'] = $this->trabajointegracioncurricular_model->lectores($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
	$data['estadotrabajointegracioncurriculars']= $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars()->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	$data['title']="Usted esta visualizando el trabajointegracioncurricular No: ";
  
    $this->load->view('template/page_header');		
    $this->load->view('trabajointegracioncurricular_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

	$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->elultimo();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['egresados'] =$this->trabajointegracioncurricular_model->egresados($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
    $data['lectores'] = $this->trabajointegracioncurricular_model->lectores($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
	$data['estadotrabajointegracioncurriculars']= $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars()->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	$data['title']="Usted esta visualizando el trabajointegracioncurricular No: ";
  
    $this->load->view('template/page_header');		
    $this->load->view('trabajointegracioncurricular_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }









public function siguiente(){
 // $data['trabajointegracioncurricular_list']=$this->trabajointegracioncurricular_model->lista_trabajointegracioncurricular()->result();
	$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->siguiente($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['egresados'] =$this->trabajointegracioncurricular_model->egresados($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
  $data['lectores'] = $this->trabajointegracioncurricular_model->lectores($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['estadotrabajointegracioncurriculars']= $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	$data['title']="Usted esta visualizando el trabajointegracioncurricular No: ";
	$this->load->view('template/page_header');		
  $this->load->view('trabajointegracioncurricular_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['trabajointegracioncurricular_list']=$this->trabajointegracioncurricular_model->lista_trabajointegracioncurricular()->result();
	$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->anterior($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['egresados'] =$this->trabajointegracioncurricular_model->egresados($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
  $data['lectores'] = $this->trabajointegracioncurricular_model->lectores($data['trabajointegracioncurricular']['idtrabajointegracioncurricular'])->result();
	$data['estadotrabajointegracioncurriculars']= $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars()->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	$data['title']="Usted esta visualizando el trabajointegracioncurricular No: ";
	$this->load->view('template/page_header');		
  $this->load->view('trabajointegracioncurricular_record',$data);
	$this->load->view('template/page_footer');
}



	public function edit()
	{
    		$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->trabajointegracioncurricular($this->uri->segment(3))->row_array();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    		$data['egresados'] =$this->trabajointegracioncurricular_model->egresados($this->uri->segment(3))->result();
    		$data['lectores'] = $this->trabajointegracioncurricular_model->lectores($this->uri->segment(3))->result();
    		$data['title'] = "Actualizar el  Trabajointegracioncurricular No: ";
	        $data['estadotrabajointegracioncurriculars']= $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars()->result();
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('trabajointegracioncurricular_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtrabajointegracioncurricular');
	 	$array_item=array(
		 	
		'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
        'idestadotrabajointegracioncurricular'=> $this->input->post('idestadotrabajointegracioncurricular')
	 	);


		if(null!==$this->input->post('nombre'))
		{
			$array_item['nombre'] = $this->input->post('nombre');
		}


		if(null!==$this->input->post('resumen'))
		{
			$array_item['resumen'] = $this->input->post('resumen');
		}


	 	$this->trabajointegracioncurricular_model->update($id,$array_item);

	 	redirect('trabajointegracioncurricular/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->trabajointegracioncurricular_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('trabajointegracioncurricular/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function canvas(){
	$this->load->view('template/page_header');
	$this->load->view('canvas');
	$this->load->view('template/page_footer');
}

function show_pdf() {
	 	$data['trabajointegracioncurricular'] = $this->trabajointegracioncurricular_model->trabajointegracioncurricularA($this->uri->segment(3))->row_array();
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




public function get_trabajointegracioncurricular() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtrabajointegracioncurricular')) {
        $this->db->select('*');
        $this->db->where(array('idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular')));
        $query = $this->db->get('trabajointegracioncurricular');
	$data=$query->result();
	echo json_encode($data);
	}
}


public function get_trabajointegracioncurricularA() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtrabajointegracioncurricular')) {
        $this->db->select('*');
        $this->db->where(array('idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular')));
        $query = $this->db->get('trabajointegracioncurricular1');
	$data=$query->result();
	echo json_encode($data);
	}
}



	public function paginaweb()
	{
	  $this->load->view('web/trabajointegracioncurricular');
	}

	public function paginaweb2()
	{
	  $this->load->view('web/trabajointegracioncurricular2');
	}





public function exportarxls()
{
//$this->load->model('export_model');


	$iddistributivo=$this->uri->segment(3);
	$trabajointegracioncurriculars = $this->trabajointegracioncurricular_model->trabajointegracioncurricularsxtipo($this->uri->segment(3))->result();
// Preparar los datos para exportar a Excel
    $data = array();
    $data[] = ['No','Proponente', 'Temas/Propuesta','Resumen/Descripción','Observaciones','Estado' ]; // Encabezados
    $inicio=1;
    $i=1;
    foreach ($trabajointegracioncurriculars as $trabintecurr) {
            $data[] = [$i,$trabintecurr->ellector, $trabintecurr->nombre,$trabintecurr->resumen," "," "];
            $i++;
    }


$filename = 'trabintecurr.xlsx';
$this->trabajointegracioncurricular_model->exportToExcel($data, $filename);
}












}
