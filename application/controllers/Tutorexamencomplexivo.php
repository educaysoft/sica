<?php

class Tutorexamencomplexivo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tutorexamencomplexivo_model');
      $this->load->model('docente_model');
      $this->load->model('examencomplexivo_model');
}

public function index(){
  $data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivos()->result();
  $data['docentes']= $this->docente_model->lista_docentes()->result();
  $data['tutorexamencomplexivo']=$this->tutorexamencomplexivo_model->elultimo();

 // print_r($data['tutorexamencomplexivo_list']);
  $data['title']="Lista de Tutorexamencomplexivos";
	$this->load->view('template/page_header');		
  $this->load->view('tutorexamencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
	if($this->uri->segment(3)){
		$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA($this->uri->segment(3))->result();
	}else{
		$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
	}
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
		 	'idexamencomplexivo' => $this->input->post('idexamencomplexivo'),
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
		$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivos()->result();
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
		 	'idexamencomplexivo' => $this->input->post('idexamencomplexivo'),
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
  $data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivos()->result();
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
  $data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivos()->result();
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
  $data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivos()->result();
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
  $data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivos()->result();
	$data['tutorexamencomplexivo'] = $this->tutorexamencomplexivo_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('tutorexamencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tutorexamencomplexivo_list']=$this->tutorexamencomplexivo_model->lista_tutorexamencomplexivo()->result();
  $data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivos()->result();
	$data['tutorexamencomplexivo'] = $this->tutorexamencomplexivo_model->anterior($this->uri->segment(3))->row_array();
 	$data['docentes']= $this->docente_model->lista_docentes()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('tutorexamencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}






}
