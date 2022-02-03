<?php

class Documento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('documento_model');
      $this->load->model('tipodocu_model');
      $this->load->model('ordenador_model');
      $this->load->model('directorio_model');
      $this->load->model('persona_model');
	}

	public function index(){
 		if(isset($this->session->userdata['logged_in'])){
			$data['documento'] = $this->documento_model->elprimero();
			$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
			$data['emisores'] =$this->documento_model->emisores(1)->result();
			$data['destinatarios'] = $this->documento_model->destinatarios(1)->result();
			$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
			$data['directorios'] = $this->directorio_model->lista_directorios()->result();

			$data['title']="Uste esta visualizando Documentos por registro";
			$this->load->view('template/page_header');		
			$this->load->view('documento_record',$data);
			$this->load->view('template/page_footer');
   		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
   		}
	}



//==============================================
// Llamar al formulario para un nuevo documento.
// ==============================================

	public function add()
	{
		$data['title']="Usted esta Creando un nuevo Documento";
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
		$data['personas']= $this->persona_model->lista_personasA()->result();
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documento_form',$data);
	 	$this->load->view('template/page_footer');
	}


//==============================================
// Guardar el nuevo documento.
// ==============================================
	public function  save()
	{
	 	$array_item=array(
		 	
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'idtipodocu' => $this->input->post('idtipodocu'),
		 	'archivopdf' => $this->input->post('archivopdf'),
		 	'asunto' => $this->input->post('asunto'),
			'fechaelaboracion' => $this->input->post('fechaelaboracion'),
			'fechaentrerecep' => $this->input->post('fechaentrerecep'),
			'observacion' => $this->input->post('observacion'),
			'idordenador' => $this->input->post('idordenador'),
			'iddirectorio' => $this->input->post('iddirectorio'),
	 	);
		$array_creador=array(
			'iddocumento'=>0,
			'idpersona'=>$this->input->post('idpersona')
		);
	 	$this->documento_model->save($array_item,$array_creador);
	 	redirect('documento');
 	}






public function actual(){



 // $data['documento_list']=$this->documento_model->lista_documento()->result();
  $data['documento'] = $this->documento_model->documento( $this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['emisores'] =$this->documento_model->emisores($this->uri->segment(3))->result();
  $data['destinatarios'] = $this->documento_model->destinatarios(1)->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('documento_record',$data);
	$this->load->view('template/page_footer');
}

//////////////////////////////////
// Listar todos los documentos 
/////////////////////////////////
	public function listar()
	{
	
  		$data['documento'] = $this->documento_model->lista_documentos()->result();
  		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  		$data['emisores'] =$this->documento_model->emisores(1)->result();
  		$data['destinatarios'] = $this->documento_model->destinatarios(1)->result();
  		$data['title']="Documento";
		$this->load->view('template/page_header');		
  		$this->load->view('documento_list',$data);
		$this->load->view('template/page_footer');
	}

	function documento_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->documento_model->lista_documentosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumento,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_pdf"  data-iddocumento="'.$r->iddocumento.'" data-archivopdf="'."/Repositorio/".$r->archivopdf.'">pdf</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iddocumento="'.$r->iddocumento.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">dowload</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}




//////////////////////////////////
// Listar por tipo de documento 
/////////////////////////////////
	public function listarxtipodocu()
	{
	
  		$data['documento'] = $this->documento_model->lista_documentos()->result();
  		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  		$data['emisores'] =$this->documento_model->emisores(1)->result();
  		$data['destinatarios'] = $this->documento_model->destinatarios(1)->result();
  		$data['title']="Documento";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
  		$this->load->view('documento_listxtipodocu',$data);
		$this->load->view('template/page_footer');
	}

	function documento_dataxtipodocu()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$id=$this->input->get('idtipodocu');

	 	$data0 = $this->documento_model->lista_documentosB($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumento,$r->eltipodocu,$r->fechaelaboracion,$r->autor,$r->asunto,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_pdf"  data-iddocumento="'.$r->iddocumento.'" data-archivopdf="'."/Repositorio/".$r->archivopdf.'">pdf</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iddocumento="'.$r->iddocumento.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">download</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}







public function elprimero()
{

	$data['documento'] = $this->documento_model->elprimero();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['emisores'] =$this->documento_model->emisores($data['documento']['iddocumento'])->result();
    $data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
    $data['title']="Documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('documento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

	$data['documento'] = $this->documento_model->elultimo();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['emisores'] =$this->documento_model->emisores($data['documento']['iddocumento'])->result();
    $data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
    $data['title']="Documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('documento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }









public function siguiente(){
 // $data['documento_list']=$this->documento_model->lista_documento()->result();
	$data['documento'] = $this->documento_model->siguiente($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['emisores'] =$this->documento_model->emisores($data['documento']['iddocumento'])->result();
  $data['destinatarios'] = $this->documento_model->destinatarios($data['documento']['iddocumento'])->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('documento_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['documento_list']=$this->documento_model->lista_documento()->result();
	$data['documento'] = $this->documento_model->anterior($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['emisores'] =$this->documento_model->emisores(1)->result();
  $data['destinatarios'] = $this->documento_model->destinatarios(1)->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('documento_record',$data);
	$this->load->view('template/page_footer');
}









public function edit()
{
    $data['documento'] = $this->documento_model->documento($this->uri->segment(3))->row_array();
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['emisores'] =$this->documento_model->emisores($this->uri->segment(3))->result();
    $data['destinatarios'] = $this->documento_model->destinatarios($this->uri->segment(3))->result();
	$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directoriosxordenador($data['documento']['idordenador'])->result();
    $data['title'] = "Actualizar Documento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumento');
	 	$array_item=array(
		 	
		'iddocumento' => $this->input->post('iddocumento'),
	 	'idtipodocu' => $this->input->post('idtipodocu'),
		'archivopdf' => $this->input->post('archivopdf'),
		'asunto' => $this->input->post('asunto'),
	  	'fechaelaboracion' => $this->input->post('fechaelaboracion'),
		'fechaentrerecep' => $this->input->post('fechaentrerecep'),
		'observacion' => $this->input->post('observacion'),
		'idordenador' => $this->input->post('idordenador'),
		'iddirectorio' => $this->input->post('iddirectorio'),
	 	);
	 	$this->documento_model->update($id,$array_item);
	 	redirect('documento');
 	}



public function canvas(){
	$this->load->view('template/page_header');
	$this->load->view('canvas');
	$this->load->view('template/page_footer');
}

function show_pdf() {
	 	$data['documento'] = $this->documento_model->documentoA($this->uri->segment(3))->row_array();
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
    $states = array('--Select--');  
    if($this->input->post('idordenador')) {
        $this->db->select('*');
        $this->db->where(array('idordenador' => $this->input->post('idordenador')));
        $query = $this->db->get('directorio');
	$data=$query->result();
	echo json_encode($data);
	}

//        foreach($query->result() as $item)
  //          $states[$item->iddirectorio] = $item->nombre;
   // }

   // $output = form_dropdown('iddirectorio', $states, set_select('--Select--','default_value'));
   // echo $output;
}







}
