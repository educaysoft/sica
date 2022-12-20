<?php
class Documentosilabo extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('documentosilabo_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('curso_model');
      		$this->load->model('documento_model');
	}

	public function index(){
  		$data['cursos']= $this->curso_model->lista_cursos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['documentosilabo'] = $this->documentosilabo_model->elultimo();

 		// print_r($data['documentosilabo_list']);
  		$data['title']="Lista de Documentosilaboes";
		$this->load->view('template/page_header');		
  		$this->load->view('documentosilabo_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['cursos']= $this->curso_model->lista_cursos()->result();
  		$data['documentoes']= $this->documento_model->lista_documentos()->result();
		$data['documentosilabo'] = $this->documentosilabo_model->elultimo();
		$data['title']="Nuevo documento para el curso";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documentosilabo_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'idcurso' => $this->input->post('idcurso'),
	 	);
	 	$this->documentosilabo_model->save($array_item);
	 	redirect('documentosilabo');
 	}



	public function edit()
	{
	 	$data['documentosilabo'] = $this->documentosilabo_model->documentosilabo($this->uri->segment(3))->row_array();
		$data['cursos']= $this->curso_model->lista_cursos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Documentosilabo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documentosilabo_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumentosilabo');
	 	$array_item=array(
		 	'idcurso' => $this->input->post('idcurso'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->documentosilabo_model->update($id,$array_item);
	 	redirect('documentosilabo');
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('iddocumentosilabo');
	 	$array_item=array(
		 	'idcurso' => $this->input->post('idcurso'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	echo $this->documentosilabo_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->documentosilabo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documentosilabo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del curso";
		$this->load->view('template/page_header');		
		$this->load->view('documentosilabo_list',$data);
		$this->load->view('template/page_footer');
	}



	function documentosilabo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->documentosilabo_model->listar_documentosilabo1();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentosilabo,$r->idcurso,$r->unidad,$r->launidad,$r->elvideo,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcurso="'.$r->iddocumentosilabo.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}

	//===========================================================
	//Devuelve el primer registro de la tabla
	//===========================================================

	public function elprimero()
	{
		$data['documentosilabo'] = $this->documentosilabo_model->elprimero();
	  if(!empty($data))
	  {
		    $data['cursos']= $this->curso_model->lista_cursos()->result();
		    $data['documentoes']= $this->documento_model->lista_documentos()->result();
		    $data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Documentosilabo del documento";
		    $this->load->view('template/page_header');		
		    $this->load->view('documentosilabo_record',$data);
		    $this->load->view('template/page_footer');
	  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['documentosilabo'] = $this->documentosilabo_model->elultimo();
	  if(!empty($data))
	  {
			$data['cursos']= $this->curso_model->lista_cursos()->result();
		$data['documentoes']= $this->documento_model->lista_documentos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Documentosilabo del documento";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('documentosilabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['documentosilabo_list']=$this->documentosilabo_model->lista_documentosilabo()->result();
		$data['documentoes']= $this->documento_model->lista_documentos()->result();
		$data['documentosilabo'] = $this->documentosilabo_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['cursos']= $this->curso_model->lista_cursos()->result();
	    $data['title']="Documentosilabo del documento";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('documentosilabo_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['documentosilabo_list']=$this->documentosilabo_model->lista_documentosilabo()->result();
		$data['documentoes']= $this->documento_model->lista_documentos()->result();
		$data['documentosilabo'] = $this->documentosilabo_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
			$data['cursos']= $this->curso_model->lista_cursos()->result();
	 // $data['title']="Correo";
	    $data['title']="Documentosilabo del documento";
		$this->load->view('template/page_header');		
	  $this->load->view('documentosilabo_record',$data);
		$this->load->view('template/page_footer');
	}


}
