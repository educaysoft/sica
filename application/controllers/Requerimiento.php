<?php

class Requerimiento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('requerimiento_model');
      $this->load->model('estadorequerimiento_model');
      $this->load->model('persona_model');
      $this->load->model('gestion_model');
      $this->load->model('institucion_model');
      $this->load->model('pagina_model');
      $this->load->model('curso_model');
      $this->load->model('asistencia_model');
      $this->load->model('participacion_model');

}

public function index(){
 if(isset($this->session->userdata['logged_in'])){
	$data['requerimiento'] = $this->requerimiento_model->elultimo();
	$data['estadorequerimiento']= $this->estadorequerimiento_model->lista_estadorequerimiento()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	if(isset($data['requerimiento']['idpersona']))
	{
	$data['personas'] =$this->persona_model->persona($data['requerimiento']['idpersona'])->result();
	$data['gestion'] =$this->gestion_model->gestion($data['requerimiento']['idrequerimiento'])->result();
	}else{
	$data['personas'] =$this->persona_model->persona(0)->result();
	$data['gestion'] =$this->gestion_model->gestion(0)->result();
	}
	
	$data['title']="Uste esta visualizando Requerimientos por registro";
	$this->load->view('template/page_header');		
	$this->load->view('requerimiento_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}

//==============================================
// Llamar al formulario para un nuevo requerimiento.
// ==============================================

	public function add()
	{
		$data['title']="Usted esta Creando un nuevo Requerimiento";
		$data['estadorequerimiento']= $this->estadorequerimiento_model->lista_estadorequerimiento()->result();
		$data['cursos']= $this->curso_model->lista_cursos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();
		$this->load->view('template/page_header');		
		$this->load->view('requerimiento_form',$data);
		$this->load->view('template/page_footer');
	}

//==============================================
// Guardar el nuevo requerimiento.
// ==============================================
	public function  save()
	{
	 	$array_item=array(
		 	'idrequerimiento' => $this->input->post('idrequerimiento'),
		 	'idestadorequerimiento' => $this->input->post('idestadorequerimiento'),
		 	'idinstitucion' => $this->input->post('idinstitucion'),
		 	'titulo' => $this->input->post('titulo'),
			'fechainicia' => $this->input->post('fechainicia'),
			'fechafinaliza' => $this->input->post('fechafinaliza'),
			'detalle' => $this->input->post('detalle'),
			'idusuario' => $this->session->userdata['logged_in']['idusuario'],
			'fecha' =>  date('Y-m-d H:i:s'),
			'duracion' => $this->input->post('duracion'),
			'costo' => $this->input->post('costo'),
			'idcurso' => $this->input->post('idcurso'),
	 	);	 
	 	$this->requerimiento_model->save($array_item);
	 	redirect('requerimiento');
 	}


	public function edit()
	{
			$data['requerimiento'] = $this->requerimiento_model->requerimiento($this->uri->segment(3))->row_array();
			$data['paginas']= $this->pagina_model->lista_paginas()->result();
		  $data['cursos']= $this->curso_model->lista_cursos()->result();
			$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	    $data['title'] = "Actualizar Requerimiento";
			$this->load->view('template/page_header');		
			$this->load->view('requerimiento_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idrequerimiento');
	 	$array_item=array(

		 	'idestadorequerimiento' => $this->input->post('idestadorequerimiento'),
		 	'idinstitucion' => $this->input->post('idinstitucion'),
		 	'titulo' => $this->input->post('titulo'),
			'fechacreacion' => $this->input->post('fechacreacion'),
			'fechainicia' => $this->input->post('fechainicia'),
			'fechafinaliza' => $this->input->post('fechafinaliza'),
			'detalle' => $this->input->post('detalle'),
			'idpagina' => $this->input->post('idpagina'),
			'duracion' => $this->input->post('duracion'),
			'costo' => $this->input->post('costo'),
			'idcurso' => $this->input->post('idcurso'),
	 	);
	 	$this->requerimiento_model->update($id,$array_item);
	 	redirect('requerimiento/actual/'.$id);
 	}




 	public function delete()
 	{
 		$data=$this->requerimiento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('requerimiento/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}







	public function actual(){

		$data['requerimiento'] = $this->requerimiento_model->requerimiento($this->uri->segment(3))->row_array();
		$data['certificados'] =$this->requerimiento_model->certificados($data['requerimiento']['idrequerimiento'])->result();
		$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
	  $data['cursos']= $this->curso_model->lista_cursos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['personas'] =$this->persona_model->lista_personas($data['requerimiento']['idrequerimiento'])->result();
		$data['fecharequerimientos'] =$this->fecharequerimiento_model->fecharequerimientos($data['requerimiento']['idrequerimiento'])->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();


		$data['title']="Requerimiento";
		$this->load->view('template/page_header');		
		$this->load->view('requerimiento_record',$data);
		$this->load->view('template/page_footer');
	}


	public function listar()
	{
		$data['requerimiento'] = $this->requerimiento_model->requerimiento(1)->row_array();
		$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['personas'] =$this->persona_model->lista_personas($data['requerimiento']['idrequerimiento'])->result();
		


		$data['title']="Requerimiento";
		$this->load->view('template/page_header');		
		$this->load->view('requerimiento_list',$data);
		$this->load->view('template/page_footer');
	}

	function requerimiento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$id=$this->input->get('idestadorequerimiento');

			$data0 = $this->requerimiento_model->lista_requerimientosA($id);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idrequerimiento,$r->titulo,$r->fechainicia,$r->estado,$r->lainstitucion,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('requerimiento/actual').'"    data-idrequerimiento="'.$r->idrequerimiento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();

	}



	public function listar_personas()
	{
		$data['requerimiento'] = $this->requerimiento_model->requerimiento(1)->row_array();
		$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['personas'] =$this->persona_model->lista_personas($data['requerimiento']['idrequerimiento'])->result();
		

		$data['filtro']= $this->uri->segment(3);

		$data['title']="Requerimiento";
		$this->load->view('template/page_header');		
		$this->load->view('requerimiento_list_personas',$data);
		$this->load->view('template/page_footer');
	}



	function requerimiento_data_personas()
	{

		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


		$id=$this->input->get('idrequerimiento');
		$data0 = $this->requerimiento_model->lista_requerimientoP($id);
		$data=array();
		foreach($data0->result() as $r)
		{
		if($r->iddocumento2==null){	
			$idtipodocu=14; //Cuando se genera el certificado
			$data[]=array($r->idrequerimiento,$r->titulo,$r->elpersona,$r->estado,$r->lainstitucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_gene" data-idtipodocu="'.$idtipodocu.'" data-titulo="'.$r->titulo.'" data-fechafinaliza="'.$r->fechafinaliza.'"  data-idordenador="'.$r->idordenador.'"    data-idrequerimiento="'.$r->idrequerimiento.'"     data-iddirectorio="'.$r->iddirectorio.'"  data-idpersona="'.$r->idpersona.'"  data-elordenador="'.$r->elordenador.'" data-idpersona="'.$r->idpersona.'"       data-elpersona="'.$r->elpersona.'" data-ruta="'.$r->ruta.'" data-iddocumento="'.$r->iddocumento.'"  data-iddocumento2="'.$r->iddocumento2.'"   data-posi_nomb_x="'.$r->posi_nomb_x.'"   data-posi_nomb_y="'.$r->posi_nomb_y.'"  data-ancho_x="'.$r->ancho_x.'"   data-alto_y="'.$r->alto_y.'" data-firma1_x="'.$r->firma1_x.'"   data-firma1_y="'.$r->firma1_y.'"  data-firma2_x="'.$r->firma2_x.'"   data-firma2_y="'.$r->firma2_y.'"    data-firma3_x="'.$r->firma3_x.'"   data-firma3_y="'.$r->firma3_y.'"     data-posi_fecha_x="'.$r->posi_fecha_x.'"   data-posi_fecha_y="'.$r->posi_fecha_y.'"   data-posi_codigo_x="'.$r->posi_codigo_x.'"   data-posi_codigo_y="'.$r->posi_codigo_y.'"  data-archivopdf="'.$r->archivopdf.'">gene</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-iddocumento2="'.$r->iddocumento2.'"   data-ordenador="'.$r->elordenador.'"  data-ruta="'.$r->ruta.'" data-archivo="'.$r->archivopdf.'"  data-iddocumento="'.$r->iddocumento.'">download</a>');
		}else{
			$data[]=array($r->idrequerimiento,$r->titulo,$r->elpersona,$r->estado,$r->lainstitucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-iddocumento2="'.$r->iddocumento2.'"   data-ordenador="'.$r->elordenador.'"  data-ruta="'.$r->ruta.'" data-archivo="'.$r->archivopdf.'"  data-iddocumento="'.$r->iddocumento.'">download</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_enviar" data-idtipodocu="'.$r->idtipodocu.'" data-titulo="'.$r->titulo.'" data-fechafinaliza="'.$r->fechafinaliza.'"  data-idordenador="'.$r->idordenador.'"    data-idrequerimiento="'.$r->idrequerimiento.'"     data-iddirectorio="'.$r->iddirectorio.'"  data-idpersona="'.$r->idpersona.'"  data-elordenador="'.$r->elordenador.'" data-idpersona="'.$r->idpersona.'"       data-elpersona="'.$r->elpersona.'" data-ruta="'.$r->ruta.'" data-iddocumento="'.$r->iddocumento.'"  data-iddocumento2="'.$r->iddocumento2.'"   data-ordenador="'.$r->elordenador.'"  data-ruta="'.$r->ruta.'"   data-archivopdf="'.$r->archivopdf.'"   data-correosubject="'.$r->correosubject.'"    data-correohead="'.$r->correohead.'"    data-correofoot="'.$r->correofoot.'">enviar</a>');		}


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
		$data['requerimiento'] = $this->requerimiento_model->requerimiento($this->uri->segment(3))->row_array();
		$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		
		$data['personas'] = $this->persona_model->personas($data['requerimiento']['idrequerimiento'])->result();


		$data['title']="Requerimiento";
		$this->load->view('template/page_header');		
		$this->load->view('requerimiento_list_pdf',$data);
		$this->load->view('template/page_footer');
	}






	public function elprimero()
	{

		$data['requerimiento'] = $this->requerimiento_model->elprimero();
		  if(!empty($data))
		  {
			$data['certificados'] =$this->requerimiento_model->certificados($data['requerimiento']['idrequerimiento'])->result();
			$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['personas'] =$this->persona_model->personas($data['requerimiento']['idrequerimiento'])->result();
			$data['cursos']= $this->curso_model->lista_cursos()->result();
			$data['paginas']= $this->pagina_model->lista_paginas()->result();
			$data['fecharequerimientos'] =$this->fecharequerimiento_model->fecharequerimientos($data['requerimiento']['idrequerimiento'])->result();
			$data['title']="Requerimiento";
			$this->load->view('template/page_header');		
			$this->load->view('requerimiento_record',$data);
			$this->load->view('template/page_footer');
		  }else{
			$this->load->view('template/page_header');		
			$this->load->view('registro_vacio');
			$this->load->view('template/page_footer');
		  }
	  
	}


	public function elultimo()
	{
		$data['requerimiento'] = $this->requerimiento_model->elultimo();
		  if(!empty($data))
		  {
			$data['certificados'] =$this->requerimiento_model->certificados($data['requerimiento']['idrequerimiento'])->result();
			$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['cursos']= $this->curso_model->lista_cursos()->result();
			$data['personas'] =$this->persona_model->personas($data['requerimiento']['idrequerimiento'])->result();
			$data['paginas']= $this->pagina_model->lista_paginas()->result();
			$data['fecharequerimientos'] =$this->fecharequerimiento_model->fecharequerimientos($data['requerimiento']['idrequerimiento'])->result();
			$data['title']="Requerimiento";
			$this->load->view('template/page_header');		
			$this->load->view('requerimiento_record',$data);
			$this->load->view('template/page_footer');
		  }else{
			$this->load->view('template/page_header');		
			$this->load->view('registro_vacio');
			$this->load->view('template/page_footer');
		  }
	  }



	public function siguiente(){
	 // $data['requerimiento_list']=$this->requerimiento_model->lista_requerimiento()->result();
		$data['requerimiento'] = $this->requerimiento_model->siguiente($this->uri->segment(3))->row_array();
		$data['certificados'] =$this->requerimiento_model->certificados($data['requerimiento']['idrequerimiento'])->result();
		$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['cursos']= $this->curso_model->lista_cursos()->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();
		$data['fecharequerimientos'] =$this->fecharequerimiento_model->fecharequerimientos($data['requerimiento']['idrequerimiento'])->result();
	  	$data['personas'] =$this->persona_model->personas($data['requerimiento']['idrequerimiento'])->result();
	  	$data['title']="Requerimiento";
		$this->load->view('template/page_header');		
	  	$this->load->view('requerimiento_record',$data);
		$this->load->view('template/page_footer');
	}


	public function anterior(){
	 // $data['requerimiento_list']=$this->requerimiento_model->lista_requerimiento()->result();
		$data['requerimiento'] = $this->requerimiento_model->anterior($this->uri->segment(3))->row_array();
		$data['certificados'] =$this->requerimiento_model->certificados($data['requerimiento']['idrequerimiento'])->result();
		$data['estadorequerimientos']= $this->estadorequerimiento_model->lista_estadorequerimientos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['paginas']= $this->pagina_model->lista_paginas()->result();
	$data['cursos']= $this->curso_model->lista_cursos()->result();
		$data['personas'] =$this->persona_model->personas($data['requerimiento']['idrequerimiento'])->result();
		$data['fecharequerimientos'] =$this->fecharequerimiento_model->fecharequerimientos($data['requerimiento']['idrequerimiento'])->result();
		$data['title']="Requerimiento";
		$this->load->view('template/page_header');		
		$this->load->view('requerimiento_record',$data);
		$this->load->view('template/page_footer');
	}




	public function detalle()
	{
		$data['requerimiento'] = $this->requerimiento_model->requerimiento($this->uri->segment(3))->row_array();
		$data['fecharequerimientos'] = $this->fecharequerimiento_model->fecharequerimientos($this->uri->segment(3))->result();
		$data['asistencia'] = $this->asistencia_model->asistenciax( $data['requerimiento']['idrequerimiento'] , $this->session->userdata['logged_in']['idpersona'])->result();
		$data['participacion'] = $this->participacion_model->participacionx($data['requerimiento']['idrequerimiento'] , $this->session->userdata['logged_in']['idpersona'])->result();
		$data['curso']=$this->curso_model->curso($data['requerimiento']['idcurso'])->row_array();
	
//		$this->load->view('template/page_header');		
//		unset($this->session->userdata['logged_in']);
		$this->load->view('requerimientos/requerimiento',$data);
	}



public function canvas(){
	$this->load->view('template/page_header');
	$this->load->view('canvas');
	$this->load->view('template/page_footer');
}

function show_pdf() {
	 	$data['requerimiento'] = $this->requerimiento_model->requerimiento($this->uri->segment(3))->row_array();
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




	public function get_requerimiento() {
	    $this->load->database();
	    $this->load->helper('form');
	    if($this->input->post('idinstitucion')) {
		$this->db->select('*');
		$this->db->where(array('idinstitucion' => $this->input->post('idinstitucion'),'idestadorequerimiento'=>2));  //SOLO ESTADO INSCRIPCION
		$query = $this->db->get('requerimiento');
		$data=$query->result();
		echo json_encode($data);
		}

	}


	public function get_requerimiento1() {
	    $this->load->database();
	    $this->load->helper('form');
	    if($this->input->post('idinstitucion')) {
		$this->db->select('*');
		$this->db->where(array('idinstitucion' => $this->input->post('idinstitucion')));  //SOLO ESTADO INSCRIPCION
		$query = $this->db->get('requerimiento');
		$data=$query->result();
		echo json_encode($data);
		}

	}





	public function get_requerimiento2() {
	    $this->load->database();
	    $this->load->helper('form');
	    if($this->input->post('idrequerimiento')) {
		$this->db->select('*');
		$this->db->where(array('idrequerimiento' => $this->input->post('idrequerimiento')));
		$query = $this->db->get('requerimiento');
		$data=$query->result();
		echo json_encode($data);
		}
	}






}
