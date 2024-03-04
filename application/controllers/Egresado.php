<?php

class Egresado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('egresado_model');
      $this->load->model('egresado_model');
      $this->load->model('trabajointegracioncurricular_model');
}

	public function index(){
  		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  		$data['egresados']= $this->egresado_model->lista_egresados()->result();
 		// $data['egresado']=$this->egresado_model->egresado(1)->row_array();
		$data['egresado'] = $this->egresado_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Egresadoes";
		$this->load->view('template/page_header');		
  		$this->load->view('egresado_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{

		if($this->uri->segment(3)){
			$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA($this->uri->segment(3))->result();
		}else{
			$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA(0)->result();
		}


		$data['egresados']= $this->egresado_model->listar_egresado1()->result();
		$data['title']="Nuevo Egresado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('egresado_form',$data);
	 	$this->load->view('template/page_footer');
	}


public function listar()
{
	
  $data['list'] = $this->egresado_model->lista_egresado1()->result();
  $data['title']="Egresadoes de trabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('egresado_list',$data);
	$this->load->view('template/page_footer');
}






	public function  save()
	{
	 	$array_item=array(
		 	'idegresado' => $this->input->post('idegresado'),
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
	 	);
	 	$this->egresado_model->save($array_item);
	 	redirect('egresado');
 	}



public function edit()
{

	 	$data['egresado'] = $this->egresado_model->egresado($this->uri->segment(3))->row_array();
		$data['egresados']= $this->egresado_model->lista_egresadosA()->result();
		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('egresado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idegresado');
	 	$array_item=array(

		 	'idegresado' => $this->input->post('idegresado'),
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
	 	);
	 	$result=$this->egresado_model->update($id,$array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Egresado no  existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


 	public function delete()
 	{
 		$data=$this->egresado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('egresado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['egresado'] = $this->egresado_model->elprimero();
  if(!empty($data))
  {
  	$data['egresados']= $this->egresado_model->lista_egresados()->result();
    $data['title']="Egresado del trabajointegracioncurricular";
    $this->load->view('template/page_header');		
    $this->load->view('egresado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['egresado'] = $this->egresado_model->elultimo();
  if(!empty($data))
  {
  	$data['egresados']= $this->egresado_model->lista_egresados()->result();
    $data['title']="Egresado del trabajointegracioncurricular";
  
    $this->load->view('template/page_header');		
    $this->load->view('egresado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['egresado_list']=$this->egresado_model->lista_egresado()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['egresado'] = $this->egresado_model->siguiente($this->uri->segment(3))->row_array();
  	$data['egresados']= $this->egresado_model->lista_egresados()->result();
    $data['title']="Egresado del trabajointegracioncurricular";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('egresado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['egresado_list']=$this->egresado_model->lista_egresado()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['egresado'] = $this->egresado_model->anterior($this->uri->segment(3))->row_array();
 	$data['egresados']= $this->egresado_model->lista_egresados()->result();
 // $data['title']="Correo";
    $data['title']="Egresado del trabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('egresado_record',$data);
	$this->load->view('template/page_footer');
}






}
