<?php

class Lector extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('lector_model');
      $this->load->model('persona_model');
      $this->load->model('trabajointegracioncurricular_model');
}

public function index(){
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  $data['personas']= $this->persona_model->lista_personas()->result();
  $data['lector']=$this->lector_model->elultimo();

 // print_r($data['lector_list']);
  $data['title']="Lista de Lectors";
	$this->load->view('template/page_header');		
  $this->load->view('lector_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
	if($this->uri->segment(3)){
		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA($this->uri->segment(3))->result();
	}else{
		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurricularsA(0)->result();
	}
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Nuevo Destinario";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('lector_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$result= $this->lector_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('El lector ya esta asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



public function edit()
{
		$data['lector']= $this->lector_model->lector($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('lector_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idlector');
	 	$array_item=array(
		 	'idlector' => $this->input->post('idlector'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idtrabajointegracioncurricular' => $this->input->post('idtrabajointegracioncurricular'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$this->lector_model->update($id,$array_item);
	 	redirect('lector/actual/'.$id);
 	}




 	public function delete()
 	{
 		$data=$this->lector_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('lector/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function actual()
{
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
  $data['lector'] = $this->lector_model->lector($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Correo";
    $this->load->view('template/page_header');		
    $this->load->view('lector_record',$data);
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
	$data['lector'] = $this->lector_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Correo";
    $this->load->view('template/page_header');		
    $this->load->view('lector_record',$data);
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
	$data['lector'] = $this->lector_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Correo";
  
    $this->load->view('template/page_header');		
    $this->load->view('lector_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['lector_list']=$this->lector_model->lista_lector()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['lector'] = $this->lector_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('lector_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['lector_list']=$this->lector_model->lista_lector()->result();
  $data['trabajointegracioncurriculars']= $this->trabajointegracioncurricular_model->lista_trabajointegracioncurriculars()->result();
	$data['lector'] = $this->lector_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('lector_record',$data);
	$this->load->view('template/page_footer');
}






}
