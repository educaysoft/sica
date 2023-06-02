<?php

class Pagador extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('pagador_model');
      $this->load->model('persona_model');
      $this->load->model('documento_model');
}

	public function index(){
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
 		// $data['pagador']=$this->pagador_model->pagador(1)->row_array();
		$data['pagador'] = $this->pagador_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Pagadores";
		$this->load->view('template/page_header');		
  		$this->load->view('pagador_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personasA()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['title']="Nuevo Pagador";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('pagador_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->pagador_model->save($array_item);
	 	redirect('pagador');
 	}



public function edit()
{

	 	$data['pagador'] = $this->pagador_model->pagador($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personasA()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('pagador_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idpagador');
	 	$array_item=array(

		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$result=$this->pagador_model->update($id,$array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Pagador no  existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


 	public function delete()
 	{
 		$data=$this->pagador_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('pagador/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pagador'] = $this->pagador_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Pagador del documento";
    $this->load->view('template/page_header');		
    $this->load->view('pagador_record',$data);
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
	$data['pagador'] = $this->pagador_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Pagador del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('pagador_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['pagador_list']=$this->pagador_model->lista_pagador()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pagador'] = $this->pagador_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Pagador del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('pagador_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['pagador_list']=$this->pagador_model->lista_pagador()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pagador'] = $this->pagador_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
 // $data['title']="Correo";
    $data['title']="Pagador del documento";
	$this->load->view('template/page_header');		
  $this->load->view('pagador_record',$data);
	$this->load->view('template/page_footer');
}






}
