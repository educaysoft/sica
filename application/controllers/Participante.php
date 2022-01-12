<?php

class Participante extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('participante_model');
      $this->load->model('persona_model');
      $this->load->model('evento_model');
}

public function index(){
  $data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['personas']= $this->persona_model->lista_persona()->result();
  $data['participante']=$this->participante_model->participante(1)->row_array();

 // print_r($data['usuario_list']);
  $data['title']="Lista de Participantees";
	$this->load->view('template/page_header');		
  $this->load->view('participante_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['personas']= $this->persona_model->lista_persona()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['title']="Nuevo Participante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('participante_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
	 	);
	 	$this->participante_model->save($array_item);
	 	redirect('participante');
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





}
