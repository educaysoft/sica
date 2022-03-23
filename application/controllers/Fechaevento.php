<?php
class Fechaevento extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('fechaevento_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['fechaevento'] = $this->fechaevento_model->elultimo();

 		// print_r($data['fechaevento_list']);
  		$data['title']="Lista de Fechaeventoes";
		$this->load->view('template/page_header');		
  		$this->load->view('fechaevento_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['title']="Nuevo Fechaevento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('fechaevento_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'tema' => $this->input->post('tema'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idevento' => $this->input->post('idevento'),
	 	);
	 	$this->fechaevento_model->save($array_item);
	 	redirect('fechaevento');
 	}



	public function edit()
	{
	 	$data['fechaevento'] = $this->fechaevento_model->fechaevento($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Fechaevento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('fechaevento_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idfechaevento');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->fechaevento_model->update($id,$array_item);
	 	redirect('fechaevento');
 	}



 	public function delete()
 	{
 		$data=$this->fechaevento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('fechaevento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}




public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['fechaevento'] = $this->fechaevento_model->elprimero();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Fechaevento del documento";
    $this->load->view('template/page_header');		
    $this->load->view('fechaevento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['fechaevento'] = $this->fechaevento_model->elultimo();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Fechaevento del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('fechaevento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['fechaevento_list']=$this->fechaevento_model->lista_fechaevento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['fechaevento'] = $this->fechaevento_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Fechaevento del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('fechaevento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['fechaevento_list']=$this->fechaevento_model->lista_fechaevento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['fechaevento'] = $this->fechaevento_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Fechaevento del documento";
	$this->load->view('template/page_header');		
  $this->load->view('fechaevento_record',$data);
	$this->load->view('template/page_footer');
}

















}
