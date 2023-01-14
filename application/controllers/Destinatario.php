<?php

class Destinatario extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('destinatario_model');
      $this->load->model('persona_model');
      $this->load->model('documento_model');
}

public function index(){
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  $data['personas']= $this->persona_model->lista_personas()->result();
  $data['destinatario']=$this->destinatario_model->elultimo();

 // print_r($data['destinatario_list']);
  $data['title']="Lista de Destinatarios";
	$this->load->view('template/page_header');		
  $this->load->view('destinatario_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['title']="Nuevo Destinario";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('destinatario_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$this->destinatario_model->save($array_item);
	 	redirect('destinatario');
 	}



public function edit()
{
		$data['destinatario']= $this->destinatario_model->destinatario($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('destinatario_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddestinatario');
	 	$array_item=array(
		 	'iddestinatario' => $this->input->post('iddestinatario'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$this->destinatario_model->update($id,$array_item);
	 	redirect('destinatario/actual/'.$id);
 	}




 	public function delete()
 	{
 		$data=$this->destinatario_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('destinatario/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function actual()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  $data['destinatario'] = $this->destinatario_model->destinatario($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Correo";
    $this->load->view('template/page_header');		
    $this->load->view('destinatario_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }








public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['destinatario'] = $this->destinatario_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Correo";
    $this->load->view('template/page_header');		
    $this->load->view('destinatario_record',$data);
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
	$data['destinatario'] = $this->destinatario_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Correo";
  
    $this->load->view('template/page_header');		
    $this->load->view('destinatario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['destinatario_list']=$this->destinatario_model->lista_destinatario()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['destinatario'] = $this->destinatario_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('destinatario_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['destinatario_list']=$this->destinatario_model->lista_destinatario()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['destinatario'] = $this->destinatario_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('destinatario_record',$data);
	$this->load->view('template/page_footer');
}






}
