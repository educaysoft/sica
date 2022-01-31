<?php

class Emisor extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('emisor_model');
      $this->load->model('persona_model');
      $this->load->model('documento_model');
}

	public function index(){
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['personas']= $this->persona_model->lista_persona()->result();
 		// $data['emisor']=$this->emisor_model->emisor(1)->row_array();
		$data['emisor'] = $this->emisor_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Emisores";
		$this->load->view('template/page_header');		
  		$this->load->view('emisor_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personasA()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['title']="Nuevo Emisor";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('emisor_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->emisor_model->save($array_item);
	 	redirect('emisor');
 	}



public function edit()
{
	 	$data['usuario'] = $this->usuario_model->usuario($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_persona()->result();
		$data['perfiles']= $this->perfil_model->lista_perfil()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('usuario_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idusuario');
	 	$array_item=array(
		 	'password' => $this->input->post('password'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idperfil' => $this->input->post('idpefil'),
		 	'email' => $this->input->post('email'),
	 	);
	 	$this->usuario_model->update($id,$array_item);
	 	redirect('usuario');
 	}


 	public function delete()
 	{
 		$data=$this->emisor_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('emisor/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['emisor'] = $this->emisor_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
    $data['title']="Emisor del documento";
    $this->load->view('template/page_header');		
    $this->load->view('emisor_record',$data);
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
	$data['emisor'] = $this->emisor_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
    $data['title']="Emisor del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('emisor_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['emisor_list']=$this->emisor_model->lista_emisor()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['emisor'] = $this->emisor_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
    $data['title']="Emisor del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('emisor_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['emisor_list']=$this->emisor_model->lista_emisor()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['emisor'] = $this->emisor_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_persona()->result();
 // $data['title']="Correo";
    $data['title']="Emisor del documento";
	$this->load->view('template/page_header');		
  $this->load->view('emisor_record',$data);
	$this->load->view('template/page_footer');
}






}
