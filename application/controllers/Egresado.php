<?php

class Egresado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estudiante_model');
      $this->load->model('estudiante_model');
      $this->load->model('trabajointegracioncurricular_model');
}

	public function index(){
  		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  		$data['estudiantes']= $this->estudiante_model->lista_estudiantes()->result();
 		// $data['estudiante']=$this->estudiante_model->estudiante(1)->row_array();
		$data['estudiante'] = $this->estudiante_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Egresadoes";
		$this->load->view('template/page_header');		
  		$this->load->view('estudiante_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{

		if($this->uri->segment(3)){
			$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA($this->uri->segment(3))->result();
		}else{
			$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA(0)->result();
		}


		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
		$data['title']="Nuevo Egresado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('egresado_form',$data);
	 	$this->load->view('template/page_footer');
	}


public function listar()
{
	
  $data['list'] = $this->estudiante_model->lista_estudiante1()->result();
  $data['title']="Egresadoes de trabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('egresado_list',$data);
	$this->load->view('template/page_footer');
}






	public function  save()
	{
	 	$array_item=array(
		 	'idestudiante' => $this->input->post('idestudiante'),
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
	 	);
	 	$this->estudiante_model->save($array_item);
	 	redirect('estudiante');
 	}



public function edit()
{

	 	$data['estudiante'] = $this->estudiante_model->estudiante($this->uri->segment(3))->row_array();
		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('egresado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestudiante');
	 	$array_item=array(

		 	'idestudiante' => $this->input->post('idestudiante'),
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
	 	);
	 	$result=$this->estudiante_model->update($id,$array_item);
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
 		$data=$this->estudiante_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estudiante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['estudiante'] = $this->estudiante_model->elprimero();
  if(!empty($data))
  {
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantes()->result();
    $data['title']="Egresado del trabajointegracioncurricular";
    $this->load->view('template/page_header');		
    $this->load->view('estudiante_record',$data);
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
	$data['estudiante'] = $this->estudiante_model->elultimo();
  if(!empty($data))
  {
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantes()->result();
    $data['title']="Egresado del trabajointegracioncurricular";
  
    $this->load->view('template/page_header');		
    $this->load->view('estudiante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estudiante_list']=$this->estudiante_model->lista_estudiante()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['estudiante'] = $this->estudiante_model->siguiente($this->uri->segment(3))->row_array();
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantes()->result();
    $data['title']="Egresado del trabajointegracioncurricular";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('estudiante_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estudiante_list']=$this->estudiante_model->lista_estudiante()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['estudiante'] = $this->estudiante_model->anterior($this->uri->segment(3))->row_array();
 	$data['estudiantes']= $this->estudiante_model->lista_estudiantes()->result();
 // $data['title']="Correo";
    $data['title']="Egresado del trabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('estudiante_record',$data);
	$this->load->view('template/page_footer');
}






}
