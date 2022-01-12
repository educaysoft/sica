<?php

class Mensaje extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('mensaje_model');
      $this->load->model('tipodocu_model');
}

public function index(){
 if(isset($this->session->userdata['logged_in'])){
	$data['mensaje'] = $this->mensaje_model->mensaje(1)->row_array();
	$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	$data['emisores'] =$this->mensaje_model->emisores(1)->result();
	$data['destinatarios'] = $this->mensaje_model->destinatarios(1)->result();
	$data['title']="Uste esta visualizando Mensajes por registro";
	$this->load->view('template/page_header');		
	$this->load->view('mensaje_record',$data);
	$this->load->view('template/page_footer');

   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}



//==============================================
// Llamar al formulario para un nuevo mensaje.
// ==============================================

public function add()
{
		$data['title']="Usted esta Creando un nuevo Mensaje";
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	 	$this->load->view('template/page_header');		
	 	$this->load->view('mensaje_form',$data);
	 	$this->load->view('template/page_footer');


}


//==============================================
// Guardar el nuevo mensaje.
// ==============================================
	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idmensaje' => $this->input->post('idmensaje'),
		 	'idtipodocu' => $this->input->post('idtipodocu'),
		 	'archivopdf' => $this->input->post('archivopdf'),
		 	'asunto' => $this->input->post('asunto'),
			'fechaelaboracion' => $this->input->post('fechaelaboracion'),
			'fechaentrerecep' => $this->input->post('fechaentrerecep'),
			'observacion' => $this->input->post('observacion'),
	 	);
	 	$this->mensaje_model->save($array_item);
	 	redirect('mensaje');
 	}






public function actual(){



 // $data['mensaje_list']=$this->mensaje_model->lista_mensaje()->result();
  $data['mensaje'] = $this->mensaje_model->mensaje( $this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['emisores'] =$this->mensaje_model->emisores($this->uri->segment(3))->result();
  $data['destinatarios'] = $this->mensaje_model->destinatarios(1)->result();
  $data['title']="Mensaje";
	$this->load->view('template/page_header');		
  $this->load->view('mensaje_record',$data);
	$this->load->view('template/page_footer');
}



public function listar()
{
	
  $data['mensaje'] = $this->mensaje_model->lista_mensajes()->result();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['emisores'] =$this->mensaje_model->emisores(1)->result();
  $data['destinatarios'] = $this->mensaje_model->destinatarios(1)->result();
  $data['title']="Mensaje";
	$this->load->view('template/page_header');		
  $this->load->view('mensaje_list',$data);
	$this->load->view('template/page_footer');
}

function mensaje_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->mensaje_model->lista_mensajes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmensaje,$r->fechaelaboracion,$r->fechaentrerecep,$r->asunto,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_pdf"  data-idmensaje="'.$r->idmensaje.'" data-archivopdf="'.base_url()."pdfs/".$r->archivopdf.'">pdf</a>');
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

	$data['mensaje'] = $this->mensaje_model->elprimero();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['emisores'] =$this->mensaje_model->emisores($data['mensaje']['idmensaje'])->result();
    $data['destinatarios'] = $this->mensaje_model->destinatarios($data['mensaje']['idmensaje'])->result();
    $data['title']="Mensaje";
  
    $this->load->view('template/page_header');		
    $this->load->view('mensaje_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

	$data['mensaje'] = $this->mensaje_model->elultimo();
  if(!empty($data))
  {
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['emisores'] =$this->mensaje_model->emisores($data['mensaje']['idmensaje'])->result();
    $data['destinatarios'] = $this->mensaje_model->destinatarios($data['mensaje']['idmensaje'])->result();
    $data['title']="Mensaje";
  
    $this->load->view('template/page_header');		
    $this->load->view('mensaje_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }









public function siguiente(){
 // $data['mensaje_list']=$this->mensaje_model->lista_mensaje()->result();
	$data['mensaje'] = $this->mensaje_model->siguiente($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['emisores'] =$this->mensaje_model->emisores($data['mensaje']['idmensaje'])->result();
  $data['destinatarios'] = $this->mensaje_model->destinatarios($data['mensaje']['idmensaje'])->result();
  $data['title']="Mensaje";
	$this->load->view('template/page_header');		
  $this->load->view('mensaje_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['mensaje_list']=$this->mensaje_model->lista_mensaje()->result();
	$data['mensaje'] = $this->mensaje_model->anterior($this->uri->segment(3))->row_array();
  $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
  $data['emisores'] =$this->mensaje_model->emisores(1)->result();
  $data['destinatarios'] = $this->mensaje_model->destinatarios(1)->result();
  $data['title']="Mensaje";
	$this->load->view('template/page_header');		
  $this->load->view('mensaje_record',$data);
	$this->load->view('template/page_footer');
}









public function edit()
{
	 	$data['mensaje'] = $this->mensaje_model->mensaje($this->uri->segment(3))->row_array();
    $data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
    $data['emisores'] =$this->mensaje_model->emisores($this->uri->segment(3))->result();
    $data['destinatarios'] = $this->mensaje_model->destinatarios($this->uri->segment(3))->result();
    $data['title'] = "Actualizar Mensaje";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('mensaje_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmensaje');
	 	$array_item=array(
		 	
			'idmensaje' => $this->input->post('idmensaje'),
		 	'idtipodocu' => $this->input->post('idtipodocu'),
			'archivopdf' => $this->input->post('archivopdf'),
			'asunto' => $this->input->post('asunto'),
		  'fechaelaboracion' => $this->input->post('fechaelaboracion'),
		  'fechaentrerecep' => $this->input->post('fechaentrerecep'),
		  'observacion' => $this->input->post('observacion'),
	 	);
	 	$this->mensaje_model->update($id,$array_item);
	 	redirect('mensaje');
 	}



public function canvas(){
	$this->load->view('template/page_header');
	$this->load->view('canvas');
	$this->load->view('template/page_footer');
}

function show_pdf() {
	 	$data['mensaje'] = $this->mensaje_model->mensaje($this->uri->segment(3))->row_array();
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
$target_dir =  $_SERVER["DOCUMENT_ROOT"]."/facae/pdfs/".$filename;
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
if ($_FILES["filepdf"]["size"] > 1000000) {
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



$upload_location =  $_SERVER["DOCUMENT_ROOT"]."/facae/pdfs/";

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







}
