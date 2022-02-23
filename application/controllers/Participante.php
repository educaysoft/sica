<?php
class Participante extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('participante_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['participante'] = $this->participante_model->elultimo();

 		// print_r($data['participante_list']);
  		$data['title']="Lista de Participantees";
		$this->load->view('template/page_header');		
  		$this->load->view('participante_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
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
	 	$data['participante'] = $this->participante_model->participante($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('participante_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idparticipante');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->participante_model->update($id,$array_item);
	 	redirect('participante');
 	}


public function elultimo()
{

	$data['participante'] = $this->participante_model->elultimo();
  if(!empty($data))
  {
	$data['evento']=  $this->evento_model->lista_eventos()->result();
	$data['persona'] = $this->persona_model->lista_personas()->result();
    $data['title']="Documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('participante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }






}
