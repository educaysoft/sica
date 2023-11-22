<?php

class Departamentofuente extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('departamentofuente_model');
      $this->load->model('departamento_model');
}

	public function index(){
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 		// $data['departamentofuente']=$this->departamentofuente_model->departamentofuente(1)->row_array();
		$data['departamentofuente'] = $this->departamentofuente_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Departamentofuentees";
		$this->load->view('template/page_header');		
  		$this->load->view('departamentofuente_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		
			$data['departamentos']= $this->departamento_model->lista_departamentos1(0)->result();

		$data['title']="Nuevo Departamentofuente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('departamentofuente_form',$data);
	 	$this->load->view('template/page_footer');
	}


public function listar()
{
	
  $data['list'] = $this->departamentofuente_model->lista_departamentofuente1()->result();
  $data['title']="Departamentofuentees de departamento";
	$this->load->view('template/page_header');		
  $this->load->view('departamentofuente_list',$data);
	$this->load->view('template/page_footer');
}






	public function  save()
	{
	 	$array_item=array(
		 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$this->departamentofuente_model->save($array_item);
	 	redirect('departamentofuente');
 	}



public function edit()
{

	 	$data['departamentofuente'] = $this->departamentofuente_model->departamentofuente($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 	 	$data['title'] = "Actualizar Departamentofuente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('departamentofuente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddepartamentofuente');
	 	$array_item=array(

		 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$result=$this->departamentofuente_model->update($id,$array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Departamentofuente no  existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


 	public function delete()
 	{
 		$data=$this->departamentofuente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('departamentofuente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['departamentofuente'] = $this->departamentofuente_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Departamentofuente del departamento";
    $this->load->view('template/page_header');		
    $this->load->view('departamentofuente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['departamentofuente'] = $this->departamentofuente_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Departamentofuente del departamento";
  
    $this->load->view('template/page_header');		
    $this->load->view('departamentofuente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['departamentofuente_list']=$this->departamentofuente_model->lista_departamentofuente()->result();
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['departamentofuente'] = $this->departamentofuente_model->siguiente($this->uri->segment(3))->row_array();
    $data['title']="Departamentofuente del departamento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('departamentofuente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['departamentofuente_list']=$this->departamentofuente_model->lista_departamentofuente()->result();
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['departamentofuente'] = $this->departamentofuente_model->anterior($this->uri->segment(3))->row_array();
 // $data['title']="Correo";
    	$data['title']="Departamentofuente del departamento";
	$this->load->view('template/page_header');		
  	$this->load->view('departamentofuente_record',$data);
	$this->load->view('template/page_footer');
}






}
