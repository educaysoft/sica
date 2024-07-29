<?php

class Tutorexamencomplexivo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tutorexamencomplexivo_model');
      $this->load->model('docente_model');
      $this->load->model('tipotutorexamencomplexivo_model');
      $this->load->model('trabajointegracioncurricular_model');
}

public function index(){
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  $data['docentes']= $this->docente_model->lista_docentes()->result();
  $data['tutorexamencomplexivo']=$this->tutorexamencomplexivo_model->elultimo();

	$data['tipotutorexamencomplexivos']= $this->tipotutorexamencomplexivo_model->lista_tipotutorexamencomplexivo()->result();
 // print_r($data['tutorexamencomplexivo_list']);
  $data['title']="Lista de Tutorexamencomplexivos";
	$this->load->view('template/page_header');		
  $this->load->view('tutorexamencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
	if($this->uri->segment(3)){
		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA($this->uri->segment(3))->result();
	}else{
		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA(0)->result();
	}
		$data['tipotutorexamencomplexivos']= $this->tipotutorexamencomplexivo_model->lista_tipotutorexamencomplexivo()->result();
		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
		$data['title']="Nuevo Tutorexamencomplexivo de trabajo de integración curricular";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tutorexamencomplexivo_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	'iddocente' => $this->input->post('iddocente'),
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
		 	'idtipotutorexamencomplexivo' => $this->input->post('idtipotutorexamencomplexivo'),
	 	);
	 	$result= $this->tutorexamencomplexivo_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('El tutorexamencomplexivo ya esta asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



public function edit()
{
		$data['tutorexamencomplexivo']= $this->tutorexamencomplexivo_model->tutorexamencomplexivo($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentes()->result();
		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
    		$data['tipotutorexamencomplexivos']= $this->tipotutorexamencomplexivo_model->lista_tipotutorexamencomplexivo()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tutorexamencomplexivo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtutorexamencomplexivo');
	 	$array_item=array(
		 	'idtutorexamencomplexivo' => $this->input->post('idtutorexamencomplexivo'),
		 	'iddocente' => $this->input->post('iddocente'),
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
		 	'idtipotutorexamencomplexivo' => $this->input->post('idtipotutorexamencomplexivo'),
	 	);
	 	$this->tutorexamencomplexivo_model->update($id,$array_item);
	 	redirect('tutorexamencomplexivo/actual/'.$id);
 	}




 	public function delete()
 	{
 		$data=$this->tutorexamencomplexivo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tutorexamencomplexivo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function actual()
{
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  $data['tutorexamencomplexivo'] = $this->tutorexamencomplexivo_model->tutorexamencomplexivo($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
    $data['title']="Correo";
    $this->load->view('template/page_header');		
    $this->load->view('tutorexamencomplexivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }








public function elprimero()
{
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['tutorexamencomplexivo'] = $this->tutorexamencomplexivo_model->elprimero();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
    $data['title']="Correo";
    $this->load->view('template/page_header');		
    $this->load->view('tutorexamencomplexivo_record',$data);
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
	$data['tutorexamencomplexivo'] = $this->tutorexamencomplexivo_model->elultimo();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
    $data['title']="Correo";
  
    $this->load->view('template/page_header');		
    $this->load->view('tutorexamencomplexivo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tutorexamencomplexivo_list']=$this->tutorexamencomplexivo_model->lista_tutorexamencomplexivo()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['tutorexamencomplexivo'] = $this->tutorexamencomplexivo_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('tutorexamencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tutorexamencomplexivo_list']=$this->tutorexamencomplexivo_model->lista_tutorexamencomplexivo()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['tutorexamencomplexivo'] = $this->tutorexamencomplexivo_model->anterior($this->uri->segment(3))->row_array();
 	$data['docentes']= $this->docente_model->lista_docentes()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('tutorexamencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}






}
