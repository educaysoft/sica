<?php

class Departamento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('departamento_model');
	  $this->load->model('unidad_model');
}

public function index(){
  $data['departamento']=$this->departamento_model->departamento(1)->row_array(); 
  $data['unidades']= $this->unidad_model->lista_unidad()->result();
 // print_r($data['usuario_list']);
  $data['title']="Lista de Departamentos";
	$this->load->view('template/page_header');		
    $this->load->view('departamento_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['unidades']= $this->unidad_model->lista_unidad()->result();
		$data['title']="Nuevo Departamento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('departamento_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idunidad' => $this->input->post('idunidad'),
		 	'nombre' => $this->input->post('nombre'),
			
	 	);
	 	$this->departamento_model->save($array_item);
	 	redirect('departamento');
 	}



public function edit()
{
	 	$data['departamento'] = $this->departamento_model->departamento($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('departamento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddepartamento');
	 	$array_item=array(
		 	
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->departamento_model->update($id,$array_item);
	 	redirect('departamento');
 	}





}
