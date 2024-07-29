<?php

class Egresado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('egresado_model');
      $this->load->model('estudiante_model');
      $this->load->model('trabajointegracioncurricular_model');
      $this->load->model('examencomplexivo_model');
}

	public function index(){
  		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
 		// $data['estudiante']=$this->estudiante_model->estudiante(1)->row_array();
		$data['egresado'] = $this->egresado_model->elultimo();
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


		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
		$data['title']="Nuevo Egresado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('egresado_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function add2()
	{

		if($this->uri->segment(3)){
			$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA($this->uri->segment(3))->result();
		}else{
			$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
		}


		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
		$data['title']="Nuevo Egresado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('egresado_form2',$data);
	 	$this->load->view('template/page_footer');
	}






public function listar()
{
	
  $data['egresados'] = $this->egresado_model->listar_egresado1()->result();
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
		 	'idexamencomplexivo' => 0,
	 	);
	 	$result=$this->egresado_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('iegresado ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}

 	}


	public function  save2()
	{
	 	$array_item=array(
		 	'idestudiante' => $this->input->post('idestudiante'),
		 	'idtrabajointegracioncurricular' => '0',
		 	'idexamencomplexivo' => $this->input->post('idexamencomplexivo'),
	 	);
	 	$result=$this->egresado_model->save2($array_item);
        echo $result;
        die();
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('iegresado ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}

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
 		$data=$this->egresado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('egresado/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['egresado'] = $this->egresado_model->elprimero();
  if(!empty($data))
  {
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
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
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
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
 // $data['estudiante_list']=$this->estudiante_model->lista_estudiante()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['egresado'] = $this->egresado_model->siguiente($this->uri->segment(3))->row_array();
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
    $data['title']="Egresado del trabajointegracioncurricular";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('egresado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estudiante_list']=$this->estudiante_model->lista_estudiante()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['egresado'] = $this->egresado_model->anterior($this->uri->segment(3))->row_array();
 	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
 // $data['title']="Correo";
    $data['title']="Egresado del trabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('egresado_record',$data);
	$this->load->view('template/page_footer');
}






}
