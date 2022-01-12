<?php

class Buscar extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('documento_model');
}

public function index(){
	$data['documento'] = $this->documento_model->documento(1)->row_array();
 // print_r($data['usuario_list']);
  $data['title']="Vista de Documento";
	$this->load->view('template/page_header');		
  $this->load->view('buscar_list',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nuevo Perfil";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('perfil_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idperfil' => $this->input->post('idpefil'),
		 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->perfil_model->save($array_item);
	 	redirect('perfil');
 	}



public function edit()
{
	 	$data['perfil'] = $this->perfil_model->perfil($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('perfil_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idperfil');
	 	$array_item=array(
		 	
		 	'idperfil' => $this->input->post('idpefil'),
		 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->perfil_model->update($id,$array_item);
	 	redirect('perfil');
 	}





}
