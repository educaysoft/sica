<?php

class Evaluacionpersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('evaluacionpersona_model');
      $this->load->model('persona_model');
}

	public function index(){
  		$data['personas']= $this->persona_model->lista_personas()->result();
 		// $data['evaluacionpersona']=$this->evaluacionpersona_model->evaluacionpersona(1)->row_array();
		$data['evaluacionpersona'] = $this->evaluacionpersona_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Evaluacionpersonaes";
		$this->load->view('template/page_header');		
  		$this->load->view('evaluacionpersona_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personasA()->result();
		$data['title']="Nuevo Evaluacionpersona";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('evaluacionpersona_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
	 	);
	 	$this->evaluacionpersona_model->save($array_item);
	 	redirect('evaluacionpersona');
 	}



public function edit()
{

	 	$data['evaluacionpersona'] = $this->evaluacionpersona_model->evaluacionpersona($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personasA()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('evaluacionpersona_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idevaluacionpersona');
	 	$array_item=array(

		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
	 	);
	 	$this->usuario_model->update($id,$array_item);
	 	redirect('evaluacionpersona');
 	}


 	public function delete()
 	{
 		$data=$this->evaluacionpersona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('evaluacionpersona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
	$data['evaluacionpersona'] = $this->evaluacionpersona_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Evaluacionpersona  ";
    $this->load->view('template/page_header');		
    $this->load->view('evaluacionpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['evaluacionpersona'] = $this->evaluacionpersona_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Evaluacionpersona ";
  
    $this->load->view('template/page_header');		
    $this->load->view('evaluacionpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['evaluacionpersona_list']=$this->evaluacionpersona_model->lista_evaluacionpersona()->result();
	$data['evaluacionpersona'] = $this->evaluacionpersona_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Evaluacionpersona ";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('evaluacionpersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['evaluacionpersona_list']=$this->evaluacionpersona_model->lista_evaluacionpersona()->result();
	$data['evaluacionpersona'] = $this->evaluacionpersona_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
 // $data['title']="Correo";
    $data['title']="Evaluacionpersona";
	$this->load->view('template/page_header');		
  $this->load->view('evaluacionpersona_record',$data);
	$this->load->view('template/page_footer');
}






}
